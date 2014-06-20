<?php
namespace admin\users;

class users extends \Admin {

    var $limit = 10;

    function default_method()
    {
        switch($_POST['act'])
        {
            case "save":
                $this->save();
                break;
            case "delete":
                $this->delete();
                break;
            case "edit":
                $this->edit();
                break;
            case "add_user":
                $this->add_user();
                break;
            default: $this->default_show();
        }
    }

    function default_show()
    {
        if (!isset($_POST['on_page'])) $on_page = $this->limit;
        else $on_page = $_POST['on_page'];

        if (isset($_POST['search']) && $_POST['search'] != '')
        {
            $s = $this->db->quote("%{$_POST['search']}%");
            $sql = "where u.first_name LIKE ".$s." OR u.last_name LIKE ".$s." OR u.nickname LIKE ".$s." OR u.email LIKE ".$s;
        }

        $total = $this->db->num_rows("users as u {$sql}","id_user");

        require_once(ROOT.'libraries/paginator/paginator.php');
        $paginator = new \Paginator($total, $_POST['page'], $on_page);
        if ($paginator->pages < $_POST['page']) $paginator = new \Paginator($total, $paginator->pages, $on_page);

        $query = $this->db->query("select u.*,g.name as group_name,g.color as group_color from users as u LEFT JOIN groups as g ON u.id_group=g.id {$sql} ORDER BY u.id_group,u.id_user ASC LIMIT {$on_page} OFFSET {$paginator->get_range('from')}");
        while ($row = $query->fetch())
        {
            $row['fio'] = build_user_name($row['first_name'],$row['last_name']);
            $users[$row['id_user']] = $row;
        }

        $form = array(
            'on_page' => array('label' => 'Показывать по','type' => 'select', 'options' => array('10' => '10','20' => '20','50' => '50','100' => '100'), 'selected' => $on_page),
        );

        $data = array('users'=>$users, 'total'=>$total,'paginator' => $paginator,'form' => $form);

        if (isset($_POST['search']))
        {
            if ($text = $this->layout_get('admin/elements/all_result.html',$data)) $result['success'] = $text;
            else $result['error'] = "Ничего не найдено";

            echo json_encode($result);
        }
        else $this->layout_show('admin/all_users.html',$data);
    }

    function delete()
    {
        if ($_POST['id'] != "")
        {
            $log = $this->get_controller("logs");
            $user = $this->get_user($_POST['id']);
            $query = $this->db->prepare("delete from users where id_user=? LIMIT 1");
            if ($query->execute(array($_POST['id'])))
            {
                $res['success'] = true;
                if ($log) $log->save_into_log("admin","Пользователи",true,"Удален пользователь \"{$user['fio']}\"",$_SESSION['admin']['id_user']);
            }
            else $res['error'] = "Ошибка удаления";
        }
        else $res['error'] = "Передан неверный id";

        echo json_encode($res);
    }

    function edit()
    {
        if ($_POST['id'] != "")
        {
            if ($_SESSION['admin']['id_group'] == 1) $query = $this->db->query("select * from groups order by name");
            else $query = $this->db->query("select * from groups where id > 1 order by name");

            $groups = $query->fetchAll();

            $query = $this->db->prepare("select * from users where id_user=? LIMIT 1");
            $query->execute(array($_POST['id']));
            if ($page = $query->fetch())
                $res['success'] = $this->layout_get('admin/form.html',array('data' => $page,'groups' => $groups,'act' => 'edit'));
            else $res['error'] = "Данных не найдено";
        }
        else $res['error'] = "Передан неверный id";

        echo json_encode($res);
    }

    function add_user()
    {
        if ($_SESSION['admin']['id_group'] == 1) $query = $this->db->query("select * from groups order by name");
        else $query = $this->db->query("select * from groups where id > 1 order by name");

        $groups = $query->fetchAll();
        $res['success'] = $this->layout_get('admin/form.html',array('groups' => $groups,'act' => 'new'));

        echo json_encode($res);
    }

    function save()
    {
        if ($_POST['email'] == '') $res['error'][] = "Email не может быть пустым";
        if ($_POST['first_name'] == '') $res['error'][] = "Введите имя";
        if ($_POST['last_name'] == '') $res['error'][] = "Введите фамилию";
        if ($_POST['gender'] != "m" && $_POST['gender'] != "f") $res['error']['gender'] = "Пол не выбран";

        if ($_POST['email'] == "") $res['error']['email'] = "Введите адрес почты";
        else if (!preg_match(iconv("utf-8","windows-1251",'/^[а-яa-z0-9]{1}[а-яa-z0-9_\-\.]{1,30}@([а-яa-z0-9\-]{1,30}\.{0,1}[а-яa-z0-9\-]{1,5}){1,3}\.[а-яa-z]{2,5}$/i'),mb_strtolower(iconv("utf-8","windows-1251",$_POST['email'])))) $res['error'][] = "Адрес почты неверен";

        if ($_POST['nickname'] == "") $res['error'][] = "Введите ник";
        else if (!preg_match(iconv("utf-8","windows-1251",'/^[a-zA-Z0-9]{3,16}$/i'),iconv("utf-8","windows-1251",$_POST['nickname']))) $res['error'][] = "Неверно введен ник";

        $id_group = intval($_POST['id_group']);
        if ($id_group < 1) $res['error'][] = "Выберите группу";

        if ($_SESSION['admin']['id_group'] != 1 && $id_group == 1) $res['error'][] = "У вас недостаточно прав";

        if ((isset($_POST['new_password']) && $_POST['mode'] == 'edit') || $_POST['mode'] == 'new')
        {
            if ($_POST['mode'] == "edit")
            {
                if ($_POST['new_password'] != '') $p = get_pass($_POST['new_password']);
                else $res['error'][] = "Пароль не может быть пустым";
            }
            else if ($_POST['mode'] == "new")
            {
                if ($_POST['password'] != '') $p = get_pass($_POST['password']);
                else $res['error'][] = "Пароль не может быть пустым";
            }

            if (!$p) $res['error'][] = "Ошибка генерации хэша. Введите пароль";
        }

        if (!$res['error'])
        {
            $_POST['email'] = mb_strtolower($_POST['email']);
            $log = $this->get_controller("logs");
            if ($log)
            {
                $user = $this->get_user($_POST['id']);
                if ($user['fio'] != build_user_name($_POST['first_name'],$_POST['last_name']) && $_POST['id'] != "") $message = ". ФИО изменено на \"".build_user_name($_POST['first_name'],$_POST['last_name'])."\"";
                if ($user['nickname'] != $_POST['nickname'] && $_POST['id'] != "") $message .= ". Ник изменен на \"{$_POST['nickname']}\"";
                if ($user['id_group'] != $_POST['id_group'] && $_POST['id'] != "")
                {
                    $group = $this->get_controller("groups",false,true)->get_group($_POST['id_group']);
                    $message .= ". Переведен из группы \"{$user['group_name']}\" в группу \"{$group['name']}\"";
                }
            }

            if ($_POST['id'] != "")
            {
                if ($p)
                {
                    $query = $this->db->prepare("UPDATE users set nickname=?,gender=?,email=?,pass=?,salt=?,uniq_key=?,id_group=?,first_name=?,last_name=? where id_user=?");
                    if (!$query->execute(array($_POST['nickname'],$_POST['gender'],$_POST['email'],$p['password'],$p['salt'],$p['uniq_key'],$id_group,$_POST['first_name'],$_POST['last_name'],$_POST['id']))) $res['error']  = true;
                    elseif ($log) $log->save_into_log("admin","Пользователи",true,"Отредактирован пользователь \"{$user['fio']}\" ({$user['nickname']}). Пароль изменен".$message,$_SESSION['admin']['id_user']);
                }
                else
                {
                    $query = $this->db->prepare("UPDATE users set nickname=?,gender=?,email=?,id_group=?,first_name=?,last_name=? where id_user=?");
                    if (!$query->execute(array($_POST['nickname'],$_POST['gender'],$_POST['email'],$id_group,$_POST['first_name'],$_POST['last_name'],$_POST['id']))) $res['error']  = true;
                    elseif ($log) $log->save_into_log("admin","Пользователи",true,"Отредактирован пользователь \"{$user['fio']}\" ({$user['nickname']})".$message,$_SESSION['admin']['id_user']);
                }
            }
            else
            {
                $query = $this->db->prepare("INSERT INTO users(nickname,gender,email,id_group,first_name,last_name,pass,salt,uniq_key,mailconfirm,created) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
                if (!$query->execute(array($_POST['nickname'],$_POST['gender'],$_POST['email'],$id_group,$_POST['first_name'],$_POST['last_name'],$p['password'],$p['salt'],$p['uniq_key'],true,time()))) $res['error']  = true;
                elseif ($log) $log->save_into_log("admin","Пользователи",true,"Добавлен пользователь \"{$_POST['fio']}\" ({$_POST['nickname']})".$message,$_SESSION['admin']['id_user']);
            }

            if (!$res['error']) $res['success'] = true;
            else $res['error'] = "Не удалось сохранить пользователя. Попробуйте другой email";
        }

        echo json_encode($res);
    }

    function get_user($id)
    {
        $query = $this->db->prepare("select u.*,g.name as group_name from users as u LEFT JOIN groups as g ON u.id_group=g.id where u.id_user=?");
        $query->execute(array($id));
        $user = $query->fetch();
        $user['fio'] = build_user_name($user['first_name'],$user['last_name']);

        return $user;
    }
}

