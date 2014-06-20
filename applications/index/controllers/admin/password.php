<?php
namespace admin\index;

class password extends \Admin {

    function default_method()
    {
        switch($_POST['act'])
        {
            case "change_password":
                $this->change_password();
                break;
            case "save_password":
                $this->save_password();
                break;
            default:
                setcookie('redirect', "", time()+60*60*24*7,"/");
                $this->redirect("/admin/");
        }
    }

    function change_password()
    {
        $res['success'] = $this->layout_get("admin/change_pass.html");
        echo json_encode($res);
    }

    function save_password()
    {
        if ($_POST['password'] != $_POST['password_repeat']) $res['error'] = "Пароли не совпадают";
        if ($_POST['password'] == "" || $_POST['password_repeat'] == "") $res['error'] = "Заполните все поля";

        if (!$res['error'])
        {
            $log = $this->get_controller("logs");
            $user = $this->get_controller("users",false,true)->get_user($_SESSION['admin']['id_user']);

            $p = get_pass($_POST['password']);
            $query = $this->db->prepare("update users set pass=?,salt=?,uniq_key=? where id_user=? LIMIT 1");
            if ($query->execute(array($p['password'],$p['salt'],$p['uniq_key'],$_SESSION['admin']['id_user'])))
            {
                $res['success'] = true;
                if ($log) $log->save_into_log("admin","Пользователи",false,"Пользователь \"{$user['fio']}\" сменил пароль",$_SESSION['admin']['id_user']);
            }
            else $res['error'] = "Ошибка базы данных";
        }

        echo json_encode($res);
    }
}

