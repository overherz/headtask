<?php
namespace users;

class login extends \Controller {
    
    function default_method()
    {
        switch ($_POST['act'])
        {
            case "login":
                $this->get_login($_POST['login'],$_POST['password'],true);
                break;
            default:
                if ($_SESSION['user']['id_user']) $this->redirect();
                $this->layout_show("login.html");
        }
    }

    function get_login($login,$pass,$post=false)
    {
        if ($post)
        {
            if ($login == "") $res['error']['login'] = "Логин не может быть пустым";
            if ($pass == "") $res['error']['password'] = "Пароль не может быть пустым";
        }

        if (!$res['error'])
        {
            $query = $this->db->prepare("select u.*,g.access_site,g.name as group_name,GROUP_CONCAT(cu.id_company) as company
                from users as u
                LEFT JOIN groups as g ON g.id=u.id_group
                LEFT JOIN company_users as cu ON cu.id_user=u.id_user
                where email=?
                group by u.id_user
                ");
            $query->execute(array($login));

            if ($u = $query->fetch())
            {
                if ($post) $hash = $this->get_hash($pass,$u['salt']);
                else $hash = $pass;

                if ($hash == $u['pass'])
                {
                    $u['access'] = (array) json_decode($u['access_site']);
                    if ($u['access']['authorization'] || $u['id_group'] == 1)
                    {
                        if ($u['mailconfirm'] == 1)
                        {
                            if (($post && $_POST['cookie']) || ($_COOKIE['login'] != "" && $_COOKIE['password'] != "" && $_SESSION['user']))
                            {
                                setcookie('login', $login, time()+60*60*24*90,"/",null,null,true);
                                setcookie('password', $u['pass'], time()+60*60*24*90,"/",null,null,true);
                            }

                            unset($u['salt']);unset($u['access_site']); unset($u['pass']);
                            $u['fio'] = build_user_name($u['first_name'],$u['last_name']);
                            $u['timezone'] = $this->get_controller("users")->get_user_timezone($u['tzOffset']);
                            $_SESSION['user'] = $u;
                            $res['success'] = true;
                            if (!$post) return true;
                        }
                        else $res['error']['mailconfirm'] = $login;
                    }
                    else $res['error']['denied'] = "Вам вход запрещен";
                }
                else $res['error']['denied'] = "Данные неверны";
            }
            else $res['error']['denied'] = "Данные неверны";
        }

        if ($post) echo json_encode($res);
    }

    function update_access()
    {
        if ($_SESSION['user'])
        {
            $data = $this->db->query("select g.id,g.access_site,u.uniq_key,GROUP_CONCAT(cu.id_company) as company
                    from users as u
                    LEFT JOIN groups as g ON g.id=u.id_group
                    LEFT JOIN company_users as cu ON u.id_user=cu.id_user
                    where u.id_user='{$_SESSION['user']['id_user']}'
                    group by u.id_user
            ")->fetch();

            $_SESSION['user']['access'] = (array) json_decode($data['access_site']);
            $_SESSION['user']['id_group'] = $data['id'];
            $_SESSION['user']['uniq_key'] = $data['uniq_key'];
            $_SESSION['user']['company'] = $data['company'];
        }
    }

    function get_hash($pass,$salt)
    {
        return md5(md5($pass).md5($salt));
    }
}

