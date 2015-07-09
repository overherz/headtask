<?php

namespace global_module;

class get_info extends \Global_module
{
    protected $admin = true;
    protected $on_ajax_not_run = false;

    function run_module()
    {
        \Controller::set_global("admin",$_SESSION['admin']);
    }
}

