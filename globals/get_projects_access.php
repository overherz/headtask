<?php

namespace global_module;

class get_projects_access extends \Global_module
{
    protected $admin = false;
    protected $on_ajax_not_run = true;

    function run_module()
    {
        if ($_SESSION && array_key_exists('user',$_SESSION))
        {
            $access = \Controller::get_controller("projects","users")->get_access(false,false,false,$_SESSION['user']['id_group']);
            \Controller::set_global('access',$access['access']);
        }
    }
}


