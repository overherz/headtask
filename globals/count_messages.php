<?php

namespace global_module;

class count_messages extends \Global_module
{
    protected $admin = false;
    protected $on_ajax_not_run = true;

    function run_module()
    {
        if ($_SESSION && array_key_exists('user',$_SESSION))
        {
         //   $count = \Controller::get_controller("users","messages")->get_not_read_count();
        //    \Controller::set_global('messages_not_read_count',$count);
        }
    }
}


