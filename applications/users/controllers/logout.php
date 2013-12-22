<?php
namespace users;

class logout extends \Controller {

    function default_method()
    {
        unset($_SESSION['user']);
        setcookie('login', "", time()+60*60*24*7,"/");
        setcookie('password', "", time()+60*60*24*7,"/");
        $this->redirect('/');
    }
}

