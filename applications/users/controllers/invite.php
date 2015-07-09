<?php
namespace users;

class invite extends \Controller {
    
    function default_method()
    {
        switch ($_POST['act'])
        {
            case "send_invite":
                $this->send_invite();
                break;
            case "get_invite_form":
                $this->get_invite_form();
                break;
        }
    }

    function get_invite_form()
    {
        $res['success'] = $this->layout_get("invite_form.html");
        echo json_encode($res);
    }

    function send_invite()
    {
        if ($_SESSION['user']['role_company'] != "admin") $res['error'] = "Приглашать могут только администраторы";
        if (!check_mail($_POST['email'])) $res['error'] = "Email неверен";
        else
        {
            $query = $this->db->prepare("select u.id_user,cu.id_company from users as u
              LEFT JOIN company_users as cu ON u.id_user=cu.id_user
              where u.email=? and cu.id_company=?
            ");
            $query->execute(array($_POST['email'],$_SESSION['user']['current_company']));
            $user = $query->fetch();
            if ($user['id_company']) $res['error'] = "Данный адрес уже является участником";
        }

        if (!$res['error'])
        {
            $this->db->beginTransaction();
            $hash = md5(md5(time()).md5($_POST['email']));
            $query = $this->db->prepare("insert into invites(email,hash,date,id_company) values(?,?,?,?) ON DUPLICATE KEY UPDATE hash=?");
            if ($query->execute(array($_POST['email'],$hash,time(),$_SESSION['user']['current_company'],$hash)))
            {
                $subject = "Приглашение";
                $message = $this->layout_get("elements/invite_mail.html",array('hash' => $hash,'domain' => get_full_domain_name(),'site_name' => get_setting('site_name')));
                if (!send_mail(get_setting('email'), $_POST['email'], $subject, $message,get_setting('site_name')))
                {
                    $res['error'] = "Ошибка при отправке письма";
                    $this->db->rollBack();
                }
                else {
                    $res['success'] = true;
                    $this->db->commit();
                }
            }
            else $res['error'] = "Ошибка базы данных";
        }

        echo json_encode($res);
    }
}

