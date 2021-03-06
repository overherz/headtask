<?php
namespace users;

class registration extends \Controller {

    private $invite = false;
    
    function default_method()
    {
        if ($_POST['act'] == "check_for_activate_send") $this->check_for_activate_send();
        else if ($_GET['act']=='confirm') $this->mailconfirm();
        else $this->init_registration();
    }

    function mailconfirm()
    {
        $this->db->beginTransaction();

        $query = $this->db->prepare("select * from recovery where hash=? and type='confirm_mail' LIMIT 1");
        $query->execute(array($_GET['confirmcode']));
        if ($user = $query->fetch())
        {
            if ($this->db->query("UPDATE users SET mailconfirm = 1 where email = '{$user['email']}'"))
            {
                $this->db->query("delete from recovery where hash=".$this->db->quote($_GET['confirmcode'])." and type='confirm_mail' LIMIT 1");
                $data['success'] = true;
                $this->redirect("/", 3);
            }
            else $data['error'] = "Ошибка базы данных";
        }
        else $data['error'] = "Код не найден";

        if ($data['error']) $this->db->rollBack();
        else $this->db->commit();

        $this->layout_show('elements/mailconfirm.html', $data);
    }

    function showform()
    {
        $captcha = $this->get_controller("captcha")->get_captcha(6);
        $data['captcha'] = $captcha;
        $data['tz'] = $this->get_controller("users")->tz;

        $query = $this->db->prepare("select email,hash,date from invites where hash=?");
        $query->execute(array($this->id));
        $invite = $query->fetch();
        $data['email'] = $invite['email'];
        $data['invite'] = $invite;
        
        $this->layout_show('registration.html',$data);
    }

    function showform_create_company()
    {
        if (!$_SESSION['user']) $this->redirect('/users/login');
        else
        {
            $captcha = $this->get_controller("captcha")->get_captcha(6);
            $data['captcha'] = $captcha;
            $this->layout_show('create_company.html',$data);
        }
    }

    function init_registration()
    {
        if ($this->id == "create_company")
        {
            if ($_POST) $this->create_company();
            else $this->showform_create_company();
        }
        else
        {
            if ($this->id != "")
            {
                if ($this->invite = $this->get_invite($this->id))
                {
                    $c_cr = $this->get_controller("company");
                    $this->invite['company'] = $c_cr->get_company($this->invite['id_company']);
                    $u_cr = $this->get_controller("users");
                    $user = $u_cr->get_user_from_email($this->invite['email']);
                }
            }

            if ($this->invite && $_SESSION['user'] && $this->invite['company']) $this->add_user_to_company();
            else if ($this->invite && $user && $this->invite['company']) $this->redirect("/users/login?redirect=/users/registration/".$this->invite['hash']);
            else if ($_POST) $this->full_registration();
            else $this->showform();
        }
    }

    function add_user_to_company()
    {
        if (!$_SESSION['user']) $this->redirect('/users/login');
        else
        {
            $this->db->beginTransaction();

            $query = $this->db->prepare("select domain from company where id_company=?");
            $query->execute(array($this->invite['id_company']));
            $domain = $query->fetch();

            $query = $this->db->prepare("insert into company_users(id_company,id_user,role) values(?,?,?)");
            if (!$query->execute(array($this->invite['id_company'],$_SESSION['user']['id_user'],"user"))) $error = true;
            if (!$this->delete_invite($this->invite['hash'])) $error = true;

            if (!$error)
            {
                $this->db->commit();
            }
            else $this->db->rollBack();

            $this->layout_show('registration.html',array('add_success' => !$error));
            $this->redirect(get_full_domain_name($domain['domain']),3);
        }
    }

    function create_company()
    {
        if (!$_SESSION['user']) $res['error']['global'] = "Доступно только авторизованным пользователям";
        else
        {
            $this->db->beginTransaction();
            if ($_SESSION['captcha'][$_POST['id_captcha']] != $_POST['captcha']) $res['error']['captcha'] = "выбор неверен";

            if ($_POST['company'] == "") $res['error']['company'] = "пусто";
            else if (!$this->check_company_name($_POST['company'])) $res['error']['company'] = "содержит запрещенные символы";
            else if (!$this->check_company_name2($_POST['company'])) $res['error']['company'] = "название занято";

            if (!$res['error'])
            {
                $query = $this->db->prepare("insert into company(name) values(?)");
                if (!$query->execute(array($_POST['company']))) $res['error']['global'] = "Ошибка базы данных";
                else
                {
                    $id_company = $this->db->lastInsertId();

                    $query = $this->db->prepare("insert into company_users(id_company,id_user,role) values(?,?,?)");
                    if (!$query->execute(array($id_company,$_SESSION['user']['id_user'],"admin"))) $res['error']['global'] = "Ошибка базы данных";
                }
            }

            if ($res['error'])
            {
                $this->db->rollBack();
                $res['error']['captcha_html'] = $this->get_controller("captcha")->get_captcha(6);
            }
            else
            {
                $res['success'] = get_full_domain_name($_POST['company']);
                $this->db->commit();
            }

            echo json_encode($res);
        }
    }

    function full_registration()
    {
        foreach ($_POST as $k => &$v)
        {
            if (!in_array($k,array('password1','password2'))) $v = trim($v);
        }

        $res = $this->validate_registration();

        if (!$res['error'])
        {
            $birthday = convert_date($_POST['birthday'],true);

            $this->db->beginTransaction();

            $get_pass = get_pass($_POST['password1']);
            $pass = $get_pass['password'];
            $salt = $get_pass['salt'];
            $uniq_key = $get_pass['uniq_key'];


            $created = time();
            $p = $this->db->prepare("insert into users(last_name,first_name,email,pass,salt,uniq_key,gender,id_group,mailconfirm,created,tzOffset,birthday) values(?,?,?,?,?,?,?,?,?,?,?,?)");
            if (!$p->execute(array(
                    $_POST['last_name'],
                    $_POST['first_name'],
                    $_POST['email'],
                    $pass,
                    $salt,
                    $uniq_key,
                    $_POST['gender'],
                    DEFAULT_USER_GROUP_ID,
                    true,
                    $created,
                    $_POST['tz'],
                    $birthday)
            )) $res['error']['global'] = "Ошибка базы данных";
            else $id_user = $this->db->lastInsertId();

            if ($this->invite)
            {
                if (!$this->delete_invite($this->invite['hash'])) $res['error']['global'] = "Ошибка базы данных";
            }

            if (!$this->invite && $id_user)
            {
                $query_cr_company = $this->db->prepare("insert into company(name) values(?)");
                if (!$query_cr_company->execute(array($_POST['company']))) $res['error']['global'] = "Ошибка базы данных";
                else
                {
                    $id_company = $this->db->lastInsertId();
                    $query_cr_link_to_company = $this->db->prepare("insert into company_users(id_company,id_user,role) values(?,?,?)");
                    if (!$query_cr_link_to_company->execute(array($id_company,$id_user,"admin"))) $res['error']['global'] = "Ошибка базы данных";
                }
            }
            else if ($this->invite && $id_user)
            {
                $id_company = $this->invite['id_company'];
                $query_cr_link_to_company = $this->db->prepare("insert into company_users(id_company,id_user,role) values(?,?,?)");
                if (!$query_cr_link_to_company->execute(array($id_company,$id_user,"user"))) $res['error']['global'] = "Ошибка базы данных";
            }

            if (!$res['error'])
                if (!$this->send_activate_link($_POST['email'],$_POST['password1'],$_POST['company'])) $res['error'] = "Ошибка при отправке письма";

            if ($res['error']) $this->db->rollBack();
            else
            {
                $res['success'] = get_full_domain_name($_POST['company']);
                $this->db->commit();
            }
        }
        else $res['error']['captcha_html'] = $this->get_controller("captcha")->get_captcha(6);
        echo json_encode($res);
    }

    function validate_registration()
    {
        // Проверка паролей
        if ($_POST['password1'] == "") $res['error']['password1'] = "пусто";
        else if ($_POST['password2'] == "") $res['error']['password2'] = "пусто";
        else if ($_POST['password1'] != $_POST['password2'])
        {
            $res['error']['password1'] = $res['error']['password2'] = "не совпадает";
        }
        elseif (mb_strlen($_POST['password1']) < 8)
        {
            $res['error']['password1'] = "не короче 8 символов";
        }

        if (!$this->get_controller("users")->tz[$_POST['tz']]) $res['error']['tz'] = "выбор неверен";

        // Проверка адреса почты
        if ($_POST['email'] == "") $res['error']['email'] = "пусто";
        else if (!preg_match(iconv("utf-8","windows-1251",'/^[а-яa-z0-9]{1}[а-яa-z0-9_\-\.]{1,30}@([а-яa-z0-9\-]{1,30}\.{0,1}[а-яa-z0-9\-]{1,5}){1,3}\.[а-яa-z]{2,5}$/i'),mb_strtolower(iconv("utf-8","windows-1251",$_POST['email'])))) $res['error']['email'] = "Адрес почты неверен";

        $query = $this->db->prepare("select email from users where email=? LIMIT 1");
        $query->execute(array($_POST['email']));
        if ($result = $query->fetch()) $res['error']['email'] = "адрес занят";

        if (!$this->invite)
        {
            if ($_POST['company'] == "") $res['error']['company'] = "пусто";
            else if (!$this->check_company_name($_POST['company'])) $res['error']['company'] = "содержит запрещенные символы";
            else if (!$this->check_company_name2($_POST['company'])) $res['error']['company'] = "название занято";
        }

        // Проверка имени
        if ($_POST['last_name'] == "") $res['error']['last_name'] = "пусто";
        if ($_POST['first_name'] == "") $res['error']['first_name'] = "пусто";

        //проверка пола
        if ($_POST['gender'] != "m" && $_POST['gender'] != "f") $res['error']['gender'] = "пусто";

        // Проверка даты рождения
        if ($_POST['birthday'] == "") $res['error']['birthday'] = "пусто";
        else if (!check_date($_POST['birthday'])) $res['error']['birthday'] = "неверная дата";

        // Проверка капчи
        if ($_SESSION['captcha'][$_POST['id_captcha']] != $_POST['captcha']) $res['error']['captcha'] = "выбор неверен";

        return $res;
    }

    function get_invite($hash)
    {
        $query = $this->db->prepare("select * from invites where hash=?");
        $query->execute(array($hash));
        return $query->fetch();
    }

    function delete_invite($hash)
    {
        $query = $this->db->prepare("delete from invites where hash=?");
        if ($query->execute(array($hash))) return true;
    }

    function check_for_activate_send()
    {
        $query = $this->db->prepare("select email from users where email=? and mailconfirm='0'");
        $query->execute(array($_POST['email']));
        if ($query->fetch())
        {
            if (!$this->send_activate_link($_POST['email'])) $res['error'] = "При отправке письма возникла ошибка";
            else $res['success'] = true;
        }
        echo json_encode($res);
    }

    function send_activate_link($email,$password=false,$subdomain=false)
    {
        $get_pass = get_pass(uniqid());
        $salt = $get_pass['salt'];
        $code = md5(md5(time()).$salt);

        $query = $this->db->prepare("insert into recovery(email,hash,date,type) values(?,?,?,?) ON DUPLICATE KEY UPDATE hash=?");
        if ($query->execute(array($email,$code,time(),'confirm_mail', $code)))
        {
            $subject = "Регистрация";
            $message = $this->layout_get("elements/activate_mail.html",array(
                'domain' => get_full_domain_name($subdomain),
                'email' => $email,
                'password' => $password,
                'code' => $code
            ));
            if (send_mail(get_setting('email'), $email, $subject, $message, get_setting('site_name'))) return true;
        }
    }

    function check_company_name($name)
    {
        if (preg_match("/^[[a-z0-9]{1}[a-z0-9_]{1,14}[a-z0-9]{1}$/",$name))
        {
            if (!preg_match("/(_){2,}/",$name)) return true;
        }
    }

    function check_company_name2($name)
    {
        $query = $this->db->prepare("select * from company where name=?");
        $query->execute(array($name));
        if (!$query->fetch()) return true;
    }
}
