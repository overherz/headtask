<?php
namespace users;

class profile extends \Controller {  
    
    function default_method()
    {
        if ($_SESSION['user']) $this->get_controller("users")->default_show($_SESSION['user']['id_user']);
        else $this->redirect("/users/login/");
    }   
}

