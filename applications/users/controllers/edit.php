<?php
namespace users;
class edit extends \Controller {

    function default_method() {
        switch($_POST['act'])
        {
            case "get_avatar_upload":
                $this->get_avatar_upload();
                break;
            case "upload_avatar":
                $this->upload_avatar();
                break;        
            case "save_avatar":
                $this->save_avatar();
                break;
            case "save_profile":
                $this->save_profile();
                break;
            case "change_password":
                $this->change_password();
                break;
            case "change_email":
                $this->change_email();
                break;
            case "cancel_change_email":
                $this->cancel_change_email();
                break;
            default: $this->profile();
        }
    }
    
    function profile()
    {
        $id = $_SESSION['user']['id_user'];
        $user = $this->get_controller("users")->get_user($id);

        crumbs(build_user_name($user['first_name'],$user['last_name']),"/users/~{$user['id_user']}");
        crumbs("Редактирование профиля");

        if (!$user) $this->redirect('/users/');
        if (!$_SESSION['user'] || $_SESSION['user']['id_user'] != $user['id_user']) $this->redirect("/users/~{$user['id_user']}/");

        $query = $this->db->prepare("select pr.*, up.* FROM profile as pr LEFT JOIN (SELECT userprofiles.* from userprofiles WHERE userprofiles.iduser = ?) as up ON up.idprof=pr.id");
        $query->execute(array($id));
        while($prof = $query->fetch()) {
            $user['profile'][$prof['name']] = $prof;
            if ($prof['type'] == "select") $user['profile'][$prof['name']]['allow_values'] = explode(",",$prof['allow_values']);
        }
        $changemail = $this->db->query("select email from recovery where uid = ".$this->db->quote($id)." LIMIT 2")->fetchAll();

        $user['changemail'] = $changemail;
        if ($_GET['mode']=="new") $user['new'] = true;

        $user['birthday'] = convert_date($user['birthday']);
        $this->layout_show('edit.html', array('user'=>$user,'tz' => $this->get_controller("users")->tz));
    }

    function save_profile()
    {
        $u_ctr = $this->get_controller("users");
        $user = $u_ctr->get_user($_POST['id']);

        if (!$user) $res['error'][] = "Пользователь не найден";
        if (!$_SESSION['user'] || $_SESSION['user']['id_user'] != $user['id_user']) $res['error'][] = "У Вас недостаточно прав";

        $data = $this->prepare($_POST);
        if ($data['errors'])
        {
            foreach ($data['errors'] as $r) $res['error'][] = $r;
        }
        $user = $data['user'];

        if (!$res['error'])
        {
            $this->db->beginTransaction();
            $query = $this->db->prepare("update users set first_name=?,last_name=?, birthday=?,tzOffset=? WHERE id_user=? LIMIT 1");
            if (!$query->execute(array($user['first_name'],$user['last_name'], $user['birthday'],$user['tz'],$_POST['id']))) $res['error'][] = "Ошибка базы данных";
            else
            {
                $query = $this->db->prepare("insert into userprofiles (idprof, iduser, value) VALUES ((SELECT id FROM profile WHERE name=?), ?, ?) ON DUPLICATE KEY UPDATE value=?");
                foreach ($user as $k=>$v)
                {
                    if ($k != 'first_name' && $k != 'last_name' && $k != 'avatar' && $k != 'tz' && $k != 'birthday')
                    {
                        if (!$query->execute(array($k, $_POST['id'], $v, $v))) $res['error'][] = "Ошибка базы данных";
                    }
                }

                if (!$res['error'])
                {
                    $this->db->commit();
                    $query = $this->db->prepare("select u.*,g.access_site,g.name as group_name from users as u LEFT JOIN groups as g ON g.id=u.id_group where id_user=?");
                    $query->execute(array($_POST['id']));
                    $u = $query->fetch();

                    $_SESSION['user'] = $u;
                    $_SESSION['user']['timezone'] = $u_ctr->get_user_timezone($user['tz']);
                    $res['success'] = $_POST['id'];
                }
                else $this->db->rollBack();
            }
        }

        echo json_encode($res);
    }

    function change_password()
    {
        if ($_POST['new_pass'] == "") $res['error'] = "Укажите новый пароль";
        if ($_POST['old_pass'] == "") $res['error'] = "Укажите старый пароль";
        if ($_POST['new_pass'] != $_POST['repeat_pass']) $res['error'] = "Пароли не совпадают";

        if (!$res['error'])
        {
            $query = $this->db->prepare("select pass,salt,email FROM users WHERE id_user=?");
            $query->execute(array($_SESSION['user']['id_user']));
            if ($user = $query->fetch())
            {
                $login_ctrl = $this->get_controller("users","login");
                if ($login_ctrl->get_hash($_POST['old_pass'],$user['salt']) == $user['pass'])
                {
                    $get_pass = get_pass($_POST['new_pass']);
                    $query = $this->db->prepare("update users set pass=?,salt=?,uniq_key=? WHERE id_user=?");
                    if ($query->execute(array($get_pass['password'], $get_pass['salt'], $get_pass['uniq_key'], $_SESSION['user']['id_user'])))
                    {
                        setcookie('login', $user['email'], time()+60*60*24*90,"/",get_cookie_domain(),null,true);
                        setcookie('password', $get_pass['password'], time()+60*60*24*90,"/",get_cookie_domain(),null,true);
                        $res['success'] = true;
                    }
                    else $res['error'] = "Ошибка базы данных";
                }
                else $res['error'] = "Старый пароль неверен";
            }
            else $res['error'] = "Пользователь не найден";
        }
        echo json_encode($res);
    }

    function prepare($user)
    {
        if ($user['first_name'] == "") $errors['first_name'] = "Введите имя";
        if ($user['last_name'] == "") $errors['last_name'] = "Введите фамилию";

        // Проверка даты рождения
        if ($user['birthday'] == "") $errors['birthday'] = "Укажите дату рождения";
        else if (!check_date($user['birthday'])) $errors['birthday'] = "Неверная дата рождения";
        else $user['birthday'] = convert_date($user['birthday'],true);
        unset($user['act']);
        unset($user['id']);

        return array('user' => $user,'errors' => $errors);
    }
    
    function get_avatar_upload()
    {
        $res['success'] = $this->layout_get("elements/upload_form.html");
        echo json_encode($res);
    }
    
    function upload_avatar()
    {
        require_once(ROOT.'libraries/imaginator/imaginator.php');
        $i = new \imaginator($_FILES['avatar']['tmp_name']);
        if ($path = $i->get('ava_profile','users'))
        {
            $i_size = getimagesize(ROOT.$path);

            if ($i_size[0] >= $i_size[1]) $length_side = $i_size[1];
            else $length_side = $i_size[0];

            $res['success'] = array('crop' => json_encode(array(0,0,$length_side,$length_side)),'image' => $path);
        }
        else $res['error'] = $i->error;
        echo json_encode($res);
    }
    
    function save_avatar()
    {
        if ($_POST['x1'] == "" || $_POST['x2'] == "" || $_POST['y1'] == "" || $_POST['y2'] == "") $res['error']['show'] = "Выберите область на изображении";
        else {
            require_once(ROOT.'libraries/imaginator/imaginator.php');        
            $i = new \imaginator($_SERVER['DOCUMENT_ROOT']."/".$_POST['image']);        
            $path[0] = $i->get('ava_small','users',array($_POST['x1'],$_POST['y1'],$_POST['x2'],$_POST['y2']));
            $path[1] = $i->get('ava_middle','users',array($_POST['x1'],$_POST['y1'],$_POST['x2'],$_POST['y2']));
            $path[2] = $i->get('ava_comment','users',array($_POST['x1'],$_POST['y1'],$_POST['x2'],$_POST['y2']));

            if ($path[0] != "" && $path[1] != "" && $path[2] != "") 
            {
                $query = $this->db->prepare("update users set avatar=? where id_user=? LIMIT 1");
                if (!$query->execute(array(basename($path[0]),$_SESSION['user']['id_user'])))
                {
                    $res['error'] = "Ошибка базы данных";
                    $i->unlink_images(basename($_POST['image']), 'users');
                }
                else 
                {
                    $res['success'][0] = $_POST['image'];   
                    $_SESSION['user']['avatar'] = basename($path[0]);
                    $res['success'][1] = "Аватар успешно изменен";
                }
            }
            else 
            {
                $res['error'] = "Возникла ошибка при обработке фотографии";
                $i->unlink_images(basename($_POST['image']), 'users');
            }
        }        
        
        echo json_encode($res);
    }

    function change_email()
    {
        if ($_POST['old_email'] == $_POST['new_email']) $res['error'] = "Новый email совпадает со старым";
        if ($_POST['new_email'] == "") $res['error'] = "Укажите новый email";
        else if (!check_mail($_POST['new_email'])) $res['error'] = "Адрес неверен";
        else
        {
            $query = $this->db->prepare("select * from users where email=?");
            $query->execute(array($_POST['new_email']));
            if ($old_email = $query->fetch()) $res['error'] = $_POST['new_email']." уже зарегистрирован в системе";
        }

        if (!$res['error'])
        {
            $code1 = get_pass(time());
            $code2 = get_pass(time());
            $from = get_setting('email');
            $site_name = get_setting('site_name');
            $subject = "Смена адреса электронной почты";

            $this->db->beginTransaction();
            $query = $this->db->prepare("insert into recovery(uid,email,hash,date,type, newmail) values(?,?,?,?,?,?) ON DUPLICATE KEY UPDATE hash=?, newmail=?");

            $html = $this->layout_get("elements/change_email.html",array('domain' => get_full_domain_name(SUBDOMAIN),'code' => $code1['uniq_key']));
            if (!send_mail($from, $_POST['old_email'], $subject, $html, $site_name)) $res['error'] = "Ошибка отправки письма на старый адрес";
            $html = $this->layout_get("elements/change_email.html",array('domain' => get_full_domain_name(SUBDOMAIN),'code' => $code2['uniq_key']));
            if (!send_mail($from, $_POST['new_email'], $subject, $html, $site_name)) $res['error'] = "Ошибка отправки письма на новый адрес";

            if (!$res['error'])
            {
                if (!$query->execute(array(
                    $_SESSION['user']['id_user'],$_POST['old_email'],$code1['uniq_key'],
                    time(),'change_mail',$_POST['new_email'], $code1['uniq_key'], $_POST['new_email']))) $res['error'] = "Ошибка базы данных";

                if (!$query->execute(array(
                    $_SESSION['user']['id_user'],$_POST['new_email'],$code2['uniq_key'],
                    time(),'change_mail',$_POST['new_email'], $code2['uniq_key'], $_POST['new_email']))) $res['error'] = "Ошибка базы данных";
            }

            if (!$res['error'])
            {
                $this->db->commit();
                $res['success']['new_email'] = $_POST['new_email'];
                $res['success']['old_email'] = $_POST['old_email'];
            }
            else $this->db->rollBack();
        }
        echo json_encode($res);
    }

    function cancel_change_email()
    {
        $query = $this->db->query("delete from recovery where uid=? and type='change_mail'");
        if ($query->execute(array($_SESSION['user']['id_user']))) $res['success'] = true;
        else $res['error'] = "Ошибка базы данных";

        echo json_encode($res);
    }
}

