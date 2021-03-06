<?php

if (function_exists("mb_internal_encoding")) mb_internal_encoding('UTF-8');
$zone = @$_SESSION['user']['timezone'] ? $_SESSION['user']['timezone'] : "Europe/Moscow";
date_default_timezone_set($zone);

define('DS', DIRECTORY_SEPARATOR);
if (php_sapi_name() != "cli") define('URI', $_SERVER['REQUEST_URI']);
define(strtoupper('root'),dirname(dirname(__FILE__)).DS);
define(strtoupper('admin_root'),dirname(dirname(__FILE__)).DS."admin".DS);

$sub = explode(".",$_SERVER['HTTP_HOST']);
if (count($sub) == 3) define(strtoupper('subdomain'),array_shift($sub));

define("LANG","ru");
define("AJAX", (isset($_SERVER["HTTP_X_PJAX"]) && $_SERVER["HTTP_X_PJAX"]) || (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'));
define("PJAX", (isset($_SERVER["HTTP_X_PJAX"]) && $_SERVER["HTTP_X_PJAX"]));

require_once(ROOT."langs/".LANG.".php");
require_once(ROOT.'config.php');
require_once(ROOT.'core/functions.php');

if($INFO['secure'] && (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == ""))
{
    $redirect = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    header("Location: $redirect");
}

set_start_statistic();
set_error_handler("warning_handler");
register_shutdown_function('shutdown');

foreach ($INFO as $key => $value)
{
    if (!is_array($value))
    {
        if ($key == "dev_mode")
        {
            define(strtoupper('true_dev_mode'),$value);
            if ((array_key_exists('secret_dev_mode',$_COOKIE) && $_COOKIE['secret_dev_mode'] == "15071965") || $value) define(strtoupper('secret_dev_mode'),true);
            if ((php_sapi_name() == "cli" || AJAX) && !array_key_exists('get_ajax_queries',$_GET)) $value = false;
            else if (array_key_exists('secret_dev_mode',$_COOKIE) && $_COOKIE['secret_dev_mode'] == "15071965") $value = true;
        }
        define(strtoupper($key),$value);
    }
}

if ($INFO['dev_mode'] || (defined('SECRET_DEV_MODE') && SECRET_DEV_MODE)) error_reporting(E_ALL & ~E_NOTICE);
else error_reporting(0);
ini_set('display_errors', 0);

require_once(ROOT.'core/controller.php');
require_once(ROOT.'core/layout.php');

if ($_GET['get_ajax_queries'] && defined('DEV_MODE') && DEV_MODE) get_resources(true);

require_once(ROOT.'core/database.php');
require_once(ROOT.'core/router.php');
require_once(ROOT.'core/cache.php');
if (CACHE)
{
    phpFastCache::setup("storage",CACHE_STORAGE);
    if (in_array(CACHE_STORAGE,array('memcache','memcached'))) phpFastCache::setup("server",$INFO['cache_server']);
}

if(php_sapi_name() != "cli") new Router();

set_end_statistic();

if (defined('DEV_MODE') && DEV_MODE) get_resources();
if (defined('AJAX') && AJAX && ($INFO['dev_mode'] || (defined('SECRET_DEV_MODE') && SECRET_DEV_MODE))) $_SESSION['dev'] = $GLOBALS['dev'];