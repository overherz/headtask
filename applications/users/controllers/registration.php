<?php
namespace users;

class registration extends \Controller {  
    
    function default_method()
    {
        if ($_POST['act'] == "check_for_activate_send") $this->check_for_activate_send();
        else if ($_POST) $this->from_single_registration();
        else if ($_GET['act']=='confirm') $this->mailconfirm();
        else $this->showform();
    }

    function mailconfirm()
    {
        $this->db->beginTransaction();

        $query = $this->db->prepare("select * from recovery where hash=? and type='confirm_mail' LIMIT 1");
        $query->execute(array($_GET['confirmcode']));
        if ($user = $query->fetch())
        {
            $ugroup = DEFAULT_USER_GROUP_ID;
            if ($this->db->query("UPDATE users SET mailconfirm = 1 where email = '{$user['email']}'"))
            {
                $this->db->query("delete from recovery where hash=".$this->db->quote($_GET['confirmcode'])." and type='confirm_mail' LIMIT 1");
                $upass = $this->db->query("SELECT pass FROM users WHERE email = '{$user['email']}'")->fetch();

                $data['success'] = true;
                setcookie('login', $user['email'], time()+60*60*24*7,"/");
                setcookie('password', $upass['pass'], time()+60*60*24*7,"/");
                $this->redirect("/users/edit/?mode=new",3);
            }
            else $data['error'] = "Ошибка базы данных";
        }
        else $data['error'] = "Ошибка базы данных";

        if ($data['error']) $this->db->rollBack();
        else $this->db->commit();

        $this->layout_show('mailconfirm.html', $data);
    }

    function showform()
    {
        $captcha = $this->get_controller("captcha")->get_captcha(6);
        $data['captcha'] = $captcha;
        crumbs("Регистрация",false,true);
        
        $this->layout_show('registration.html',$data);
        
    }

    function from_single_registration()
    {
        // Проверка паролей
        if ($_POST['password1'] == "") $res['error']['password1'] = "введите пароль";
        else if ($_POST['password2'] == "") $res['error']['password2'] = "пусто";
        else if ($_POST['password1'] != $_POST['password2']) $res['error']['password2'] = "не совпадает";

        // Проверка адреса почты
        if ($_POST['email'] == "") $res['error']['email'] = "введите адрес почты";
        else if (!preg_match(iconv("utf-8","windows-1251",'/^[а-яa-z0-9]{1}[а-яa-z0-9_\-\.]{1,30}@([а-яa-z0-9\-]{1,30}\.{0,1}[а-яa-z0-9\-]{1,5}){1,3}\.[а-яa-z]{2,5}$/i'),mb_strtolower(iconv("utf-8","windows-1251",$_POST['email'])))) $res['error']['email'] = "Адрес почты неверен";

        $query = $this->db->prepare("select email from users where email=? LIMIT 1");
        $query->execute(array($_POST['email']));
        if ($result = $query->fetch()) $res['error']['email'] = "такой адрес уже занят";
        
        //Проверка никнейма
        if ($_POST['nickname'] == "") $res['error']['nickname'] = "введите псевдоним";
        else if (!preg_match(iconv("utf-8","windows-1251",'/^[a-zA-Z0-9]{3,16}$/i'),iconv("utf-8","windows-1251",$_POST['nickname']))) $res['error']['nickname'] = "Неверно введен псевдоним";

        $query = $this->db->prepare("select nickname from users where nickname=? LIMIT 1");
        $query->execute(array($_POST['nickname']));
        if ($result = $query->fetch()) $res['error']['nickname'] = "такой псевдоним уже занят";

        // Проверка имени
        if ($_POST['fullname'] == "") $res['error']['fullname'] = "введите Ваше имя";
        else if (!preg_match(iconv("utf-8",'windows-1251','/[a-zа-яА-Я]+ [a-zа-яА-Я]+/i'), iconv("utf-8",'windows-1251',$_POST['fullname']))) $res['error']['fullname'] = "Введите имя полностью";

        //проверка пола
        if ($_POST['gender'] != "m" && $_POST['gender'] != "f") $res['error']['gender'] = "пол не выбран";
        else $gender = $_POST['gender'];

        // Проверка даты рождения
        $u_cr = $this->get_controller("users","tree");
        if ($_POST['birthday'] == "") $res['error']['birthday'] = "Укажите дату рождения";
        else if (!$u_cr->check_date($_POST['birthday'])) $res['error']['birthday'] = "Неверная дата рождения";
        else $birthday = $u_cr->convert_date($_POST['birthday'],true);

        // Проверка капчи
        if ($_SESSION['captcha'][$_POST['id_captcha']] != $_POST['captcha']) $res['error']['captcha'] = "выбрана неверная картинка";

        $this->db->beginTransaction();
        if (!$res['error'])
        {
            $fio = trim($_POST['fullname']);
            $email = trim($_POST['email']);
            $nickname = trim($_POST['nickname']);
            $get_pass = get_pass($_POST['password1']);
            $pass = $get_pass['password'];
            $salt = $get_pass['salt'];
            $uniq_key = $get_pass['uniq_key'];

            if ($this->send_activate_link($email))
            {
                $created = time();
                $p = $this->db->prepare("insert into users(fio,nickname,email,pass,salt,uniq_key,gender, id_group, mailconfirm,created, tzOffset,birthday) values(?, ?, ?, ?, ?, ?, ?, ?, 0, ?, ?,?)");
                if (!$p->execute(array($fio, $nickname, $email, $pass, $salt, $uniq_key, $gender, DEFAULT_USER_GROUP_ID, $created, $_POST['tz'],$birthday))) $res['error']['global'] = "Ошибка базы данных";
                else $id_user = $this->db->lastInsertId();

                $query = $this->db->prepare("insert into tree_persons(id_user,name,life_start,gender,main) values(?,?,?,?,?)");
                if (!$query->execute(array($id_user,$fio,$birthday,$gender,true))) $res['error']['global'] = "Ошибка базы данных";
            }
            else $res['error']['global'] = "Ошибка базы данных";
            
        }
        else $res['error']['captcha_html'] = $this->get_controller("captcha")->get_captcha(6);

        if ($res['error']) $this->db->rollBack();
        else
        {
            $res['success'] = true;
            $this->db->commit();
        }
        echo json_encode($res);
    }

    function check_for_activate_send()
    {
        $query = $this->db->prepare("select email from users where email=? and mailconfirm='0'");
        $query->execute(array($_POST['email']));
        if ($query->fetch())
        {
            if (!$this->send_activate_link($_POST['email'],true)) $res['error'] = "При отправке письма возникла ошибка";
            else $res['success'] = true;
        }
        echo json_encode($res);
    }

    function send_activate_link($email,$repeat=false)
    {
        $get_pass = get_pass(uniqid());
        $salt = $get_pass['salt'];
        $code = md5(md5(time()).$salt);
        $query = $this->db->prepare("insert into recovery(email,hash,date,type) values(?,?,?,?) ON DUPLICATE KEY UPDATE hash=?");
        if ($query->execute(array($email,$code,time(),'confirm_mail', $code)))
        {
            $subject = "\"drewwo.ru\". Регистрация";
            if(!$repeat) $message = "\"drewwo.ru\". Спасибо за регистрацию. <br> <b>Ваши регистрационные данные:</b><br>Логин: {$email}<br>Пароль: {$_POST['password1']}<br>";
            $message .= "<br> Вам необходимо подтвердить e-mail, для этого перейдите по ссылке <a href='http://".$_SERVER["SERVER_NAME"]."/users/registration/?act=confirm&confirmcode={$code}'>http://".$_SERVER["SERVER_NAME"]."/users/registration/?act=confirm&confirmcode={$code}</a>";
            send_mail(EMAIL, $email, $subject, $message,"drewwo.ru");
            return true;
        }
    }
}
