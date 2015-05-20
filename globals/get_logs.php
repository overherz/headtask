<?php

namespace global_module;

class get_logs extends \Global_module
{
    protected $admin = false;
    protected $on_ajax_not_run = true;

    function run_module()
    {
        if ($_SESSION['user'])
        {
            $logs_cr = \Controller::get_controller("projects","logs");
            $logs_cr->limit = 30;
            $logs_cr->without_user = true;
            $logs = $logs_cr->get_logs();
            \Controller::set_global("logs",$logs);
        }
    }
}

