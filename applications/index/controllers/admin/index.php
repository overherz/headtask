<?php
namespace admin\index;

class index extends \Admin {

    function default_method()
    {
        switch($_POST['act'])
        {
            case "login":
                $this->login();
                break;
            case "lost_pass":
                $this->lost_pass();
                break;
            case "get_lost_pass":
                $this->get_lost_pass();
                break;
            default: $this->show();
        }
    }

    function show()
    {
        if(!isset($_SESSION)) {
            session_start();
        }
        if (!$_SESSION['admin']) $this->layout_show('admin/login.html');
        else if ($_COOKIE['redirect']) $this->redirect($_COOKIE['redirect']);
        else if ($_SESSION['admin']['id_group'] == 1) $this->redirect("/admin/logs");
        else
        {
            if ($menu = $this->get_global("root_menu"))
            {
                foreach ($menu as $m)
                {
                    reset($m['submenu']);
                    $index = key($m['submenu']);
                    $this->redirect("/admin/".$m['submenu'][$index]['url']);
                    exit();
                }
            }
            else $this->layout_show ("admin/index.html");
        }
    }

    function login()
    {
        if ($_POST['login'] == "") $res['error'][] = "логин не может быть пустым";
        if ($_POST['password'] == "") $res['error'][] = "пароль не может быть пустым";
        $ban = $this->get_controller("black_list",false,true);
        if ($ban->check_ban()) $res['error'] = "За многократные неудачные попытки авторизации Вы забанены на 5 минут";

        if (!$res['error'])
        {
            $log = $this->get_controller("logs");

            $query = $this->db->prepare("select u.*,g.access from users as u LEFT JOIN groups as g ON g.id=u.id_group where email=? and g.access_admin = '1'");
            $query->execute(array($_POST['login']));
            if ($u = $query->fetch())
            {
                if (md5(md5($_POST['password']).md5($u['salt'])) == $u['pass'])
                {
                    unset($u['pass']);unset($u['salt']);
                    $_SESSION['admin'] = $u;
                    $_SESSION['admin']['access'] = json_decode($u['access']);
                    $res['success'] = true;
                    if ($log) $log->save_into_log("login","Попытка авторизации",true,"успешно",$u['id_user']);
                }
                else
                {
                    $res['error'][] = "данные неверны";
                    if ($log) $log->save_into_log("login","Попытка авторизации",false,"неверные логин или пароль",$u['id_user']);
                    if ($ban->check_for_ban() && $log) $log->save_into_log("login","Ограничение авторизации",false,"ip забанен",$u['id_user']);
                }
            }
            else
            {
                $res['error'][] = "данные неверны";
                if ($log) $log->save_into_log("login","Попытка авторизации",false,"пользователь не найден");
                if ($ban->check_for_ban() && $log) $log->save_into_log("login","Ограничение авторизации",false,"ip забанен");
            }
        }

        echo json_encode($res);
    }

    function lost_pass()
    {
        $res['success'] = $this->layout_get("admin/lost_pass.html");
        echo json_encode($res);
    }

    function get_lost_pass()
    {
        $u_cr = $this->get_controller("users","recovery");
        $res = $u_cr->add_recovery($_POST['email']);

        echo json_encode($res);
    }
}

