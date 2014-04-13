<?php
namespace users;

class recovery extends \Controller {  
    
    function default_method()
    {
        crumbs("Восстановление пароля",false,true);
        if ($this->id)
        {
            $query = $this->db->prepare("select * from recovery where hash=? and type='recovery' LIMIT 1");
            $query->execute(array($this->id));
            if ($user = $query->fetch())
            {
                $p = get_pass("1",8);
                $p1 = get_pass($p['salt']);
                $password = $p1['password'];
                $salt = $p1['salt']; 
               
                $this->db->beginTransaction();
                
                if ($this->db->query("update users set pass='{$password}',salt='{$salt}' where email='{$user['email']}' LIMIT 1"))
                {
                    $subject = "Ваш новый пароль";
                    $message = "Ваш новый пароль: ".$p['salt']."<br>Вы можете изменить пароль в Вашем профиле";                      
                    if (!send_mail(get_setting('email'), $user['email'], $subject, $message, get_setting('site_name')))
                    {
                        $error = "Ошибка при отправке письма";   
                        $this->db->rollBack();
                    }
                    else
                    {
                        $change = true;
                        $this->db->query("delete from recovery where hash=".$this->db->quote($this->id)." and type='recovery' LIMIT 1");
                        $this->db->commit();
                        $this->redirect("/users/~{$user['id_user']}/",3);
                    }
                }
                else $error = "Ошибка базы данных";
            }
            else $error = "Запрос на восстановление не найден";
        }
        else if ($_POST)
        {
            //TODO: прописать в крон очистку каждый час
            $data = $this->add_recovery($_POST['email']);
            if ($data['success'])
            {
                $success = true;
                $this->redirect("/users/",2);
            }
            else $error = $data['error'];
        }
        $this->layout_show("recovery.html",array('id' => $this->id,'success' => $success,'error' => $error,'change' => $change));
    }

    function add_recovery($email)
    {
        $query = $this->db->prepare("select salt from users where email=?");
        $query->execute(array($email));
        if ($user = $query->fetch())
        {
            $this->db->beginTransaction();

            $hash = md5(md5(time()).md5($user['salt']));
            $query = $this->db->prepare("insert into recovery(email,hash,date,type) values(?,?,?,?) ON DUPLICATE KEY UPDATE hash=?");
            if ($query->execute(array($email,$hash,strtotime("now"),'recovery',$hash)))
            {
                $subject = "Восстановление пароля";
                $message = $this->layout_get("elements/recovery_mail.html",array('hash' => $hash,'server_name' => $_SERVER["SERVER_NAME"],'site_name' => get_setting('site_name')));
                if (!send_mail(get_setting('email'), $_POST['email'], $subject, $message,get_setting('site_name')))
                {
                    $error = "Ошибка при отправке письма";
                    $this->db->rollBack();
                }
                else {
                    $success = true;
                    $this->db->commit();
                }
            }
            else $error = "Ошибка базы данных";

        }
        else $error = "Пользователь не найден";

        return array('error' => $error,'success' => $success);
    }
}

