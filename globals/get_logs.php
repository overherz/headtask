<?php

namespace global_module;

class get_logs extends \global_module
{
    protected $admin = false;
    protected $on_ajax_not_run = true;

    function run_module()
    {
        $logs_cr = \Controller::get_controller("projects","logs");
        $logs_cr->limit = 20;
        $logs = $logs_cr->get_logs();
        \Controller::set_global("logs",$logs);
    }
}

