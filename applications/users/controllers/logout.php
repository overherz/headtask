<?php
namespace users;

class logout extends \Controller {

    function default_method()
    {
        unset($_SESSION['user']);
        setcookie('login', "", time()+60*60*24*7,"/",null,null,true);
        setcookie('password', "", time()+60*60*24*7,"/",null,null,true);
        $this->redirect('/');
    }
}

