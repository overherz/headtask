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
            default: $this->profile();
        }
    }
    
    function profile()
    {
        $u_cr = $this->get_controller("users","tree");
        $id = $_SESSION['user']['id_user'];
        $user = $this->get_controller("users")->get_user($id);

        crumbs($user['fio'],"/users/~{$user['id_user']}");
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

        $user['birthday'] = $u_cr->convert_date($user['birthday']);
        $this->layout_show('edit.html', array('user'=>$user));
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
            $query = $this->db->prepare("update users set fio=?, birthday=?,tzOffset=?,nickname=? WHERE id_user=? LIMIT 1");
            if (!$query->execute(array($user['fio'], $user['birthday'],$user['tz'],$user['nickname'],$_POST['id']))) $res['error'][] = "Ошибка базы данных";
            else
            {
                $query = $this->db->prepare("insert into userprofiles (idprof, iduser, value) VALUES ((SELECT id FROM profile WHERE name=?), ?, ?) ON DUPLICATE KEY UPDATE value=?");
                foreach ($user as $k=>$v)
                {
                    if ($k != 'fio' && $k != 'avatar' && $k != 'tz' && $k != 'birthday' && $k != 'nickname')
                    {
                        if (!$query->execute(array($k, $_POST['id'], $v, $v))) $res['error'][] = "Ошибка базы данных";
                    }
                }

                if (!$res['error'])
                {
                    $this->db->commit();
                    $_SESSION['user']['fio'] = $user['fio'];
                    $_SESSION['user']['nickname'] = $user['nickname'];
                    $_SESSION['user']['tzOffset'] = $user['tz'];
                    $_SESSION['user']['timezone'] = $u_ctr->get_user_timezone($user['tz']);
                    $res['success'] = $_POST['id'];
                }
                else $this->db->rollBack();
            }
        }

        echo json_encode($res);
    }

    function prepare($user)
    {
        if ($user['fio'] == "") $errors['fio'] = "Введите имя и фамилию";

        // Проверка даты рождения
        $u_cr = $this->get_controller("users","tree");
        if ($user['birthday'] == "") $errors['birthday'] = "Укажите дату рождения";
        else if (!$u_cr->check_date($user['birthday'])) $errors['birthday'] = "Неверная дата рождения";
        else $user['birthday'] = $u_cr->convert_date($user['birthday'],true);
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
}

