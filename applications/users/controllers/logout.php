<?php
namespace users;

class logout extends \Controller {

    function default_method()
    {
        unset($_SESSION['user']);
        setcookie('login', "", time()+60*60*24*90,"/",get_cookie_domain(),null,true);
        setcookie('password', "", time()+60*60*24*90,"/",get_cookie_domain(),null,true);
        $this->redirect('/');
    }
}

