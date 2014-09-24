<?php
namespace global_module;

class get_user_menu extends \global_module
{
    protected $admin = false;
    protected $on_ajax_not_run = false;

    function run_module()
    {
        if ($_SESSION && array_key_exists('user', $_SESSION))
        {
            $menu = \Controller::get_controller("menu")->generate_menu(\Router::application(), \Router::controller(), \Router::id());
            \Controller::set_global('menu', $menu);
        }
    }
}