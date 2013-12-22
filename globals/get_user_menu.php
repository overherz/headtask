<?php

if (!$_GET['ajax'] && ($_SESSION && array_key_exists('user',$_SESSION)))
{
    $menu = Controller::get_controller("page")->generate_menu(Router::application(),Router::controller(),Router::id());
    Controller::set_global('menu',$menu);
}
