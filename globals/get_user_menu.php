<?php
namespace global_module;

class get_user_menu extends \Global_module
{
    protected $admin = false;
    protected $on_ajax_not_run = false;

    function run_module()
    {
        if ($_SESSION && array_key_exists('user', $_SESSION))
        {
            $menu = \Controller::get_controller("menu")->generate_menu(\Router::application(), \Router::controller(), \Router::id());
            \Controller::set_global('menu', $menu);
            foreach ($menu as $m)
            {
                if ($m['active']) \Controller::set_global('menu_li',$m['id']);
                if ($m['category'])
                {
                    foreach ($m['category'] as $mm)
                    {
                        if ($mm['active']) \Controller::set_global('menu_sub_li',$mm['id']);
                    }
                }
            }
        }
    }
}