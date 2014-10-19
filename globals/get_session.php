<?php

namespace global_module;

class get_session extends \Global_module
{
    protected $admin = false;
    protected $on_ajax_not_run = false;

    function run_module()
    {
        $session_name = session_name();
        if ($_GET[$session_name])
        {
            if (session_id() && $_GET[$session_name] != session_id()) session_destroy();
            $_COOKIE[$session_name] = $_GET[$session_name];
            session_id($_GET[$session_name]);
            session_start();
        }

        $user_cr = \Controller::get_controller("users","login");

        if(defined('SITE_ACCESS_CHECK') && SITE_ACCESS_CHECK)
        {
            if(!isset($_SESSION)) {
                session_start();
            }

            if (\Router::application() == "users" && \Router::controller() == "recovery") return false;
            if (\Router::application() == "users" && \Router::controller() == "registration") return false;
            if (\Router::application() == "captcha" && \Router::controller() == "get_image") return false;
            if (\Router::application() == "users" && ($_POST['act'] == "lost_pass" || $_POST['act'] == "get_lost_pass")) return false;
            if (\Router::application() == "captcha" && \Router::controller() == "captcha") return false;
            if (!array_key_exists('user',$_SESSION) && (\Router::application() != "users" || (\Router::application() == "users" && \Router::controller() != "login")))
            {
                if ($_COOKIE['login'] == "" || $_COOKIE['password'] == "" || !$user_cr->get_login($_COOKIE['login'],$_COOKIE['password']))
                {
                    if ($_GET['ajax'])
                    {
                        echo json_encode("LoginException");
                        exit();
                    }
                    else \Controller::redirect(SITE_LOGIN_PAGE);
                }
            }
        }

        $user_cr->update_access();
        $last_user_action = time();
        \Controller::set_global("time",$last_user_action-5*60);
        if ($_SESSION && array_key_exists('user',$_SESSION)) \MyPDO::connect()->query("update users set last_user_action='{$last_user_action}' where id_user='{$_SESSION['user']['id_user']}' LIMIT 1");
        \Controller::set_global('user',$_SESSION['user']);
        \Controller::set_global('message_server',MESSAGE_SERVER);

        if ($_SESSION['user'] && !$_SESSION['user']['access']['authorization'] && $_SESSION['user']['id_group'] != 1) \Controller::get_controller("users","logout")->default_method();
    }
}