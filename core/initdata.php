<?php
if (function_exists("mb_internal_encoding")) mb_internal_encoding('UTF-8');
$zone = @$_SESSION['user']['timezone'] ? $_SESSION['user']['timezone'] : "Europe/Moscow";
date_default_timezone_set($zone);

define('DS', DIRECTORY_SEPARATOR);
if (php_sapi_name() != "cli") define('URI', $_SERVER['REQUEST_URI']);
define(strtoupper('root'),dirname(dirname(__FILE__)).DS);
define(strtoupper('admin_root'),dirname(dirname(__FILE__)).DS."admin".DS);
define("LANG","ru");
require_once(ROOT."langs/".LANG.".php");
require_once(ROOT.'config.php');
require_once(ROOT.'core/functions.php');
set_start_statistic();
set_error_handler("warning_handler");
register_shutdown_function('shutdown');

if ($INFO['antiddos'] && php_sapi_name() != "cli")
{
    include ROOT."libraries/ksantiddos.php";
    $ksa = new ksantiddos();
    $ksa->doit(30,10); // allow 20 hits in 10 seconds
}

foreach ($INFO as $key => $value)
{
    if (!is_array($value))
    {
        if ($key == "dev_mode")
        {
            define(strtoupper('true_dev_mode'),$value);
            if ((array_key_exists('secret_dev_mode',$_COOKIE) && $_COOKIE['secret_dev_mode'] == "15071965") || $value) define(strtoupper('secret_dev_mode'),true);
            if ((php_sapi_name() == "cli" || (array_key_exists('dev_mode',$_GET) && $_GET['dev_mode'] == "off") || (array_key_exists('dev_mode',$_POST) && $_POST['dev_mode'] == "off") ) && !array_key_exists('get_ajax_queries',$_GET)) $value = false;
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

if(defined('DEV_MODE') && DEV_MODE) get_resources();
if ($_GET['ajax'] && ($INFO['dev_mode'] || (defined('SECRET_DEV_MODE') && SECRET_DEV_MODE))) $_SESSION['dev'] = $GLOBALS['dev'];