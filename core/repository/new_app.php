<?php
header('Content-Type: text/html; charset=utf-8');
define('DS', DIRECTORY_SEPARATOR);
define(strtoupper('root'),dirname(dirname(dirname(__FILE__))).DS);
require_once(ROOT.'config.php');
require_once(ROOT.'core/layout.php');
require_once(ROOT.'core/database.php');

if (!$INFO['dev_mode'])
{
    echo "Доступно только из режима разработчика";
    exit();
}

if ($_GET['app_name'] != "")
{
  //  layout::
    new_application(dirname(dirname(dirname(__FILE__)))."/applications/".$_GET['app_name'],$_GET['app_name'],true);
}


function new_application($application,$app_name,$first,$mdir = false)
{
    if (!$mdir) $mdir = "blank";

    if(!is_dir($application))
    {
        if (!mkdir($application))
        {
            echo "Присвойте папке applications владельца www-data командой \"sudo chown www-data:www-data ".dirname(dirname(dirname(__FILE__)))."/applications\"<br>";
            exit();
        }
        else chmod($application, 0777);
    }
    $dir = opendir($mdir);

    while(false !== ($check = readdir($dir)))
    {
        if($check != '.' && $check != '..' && $check != ".svn")
        {
            if(is_dir($mdir .'/'. $check))
            {
                //$check = str_replace("blank", $application, $check);
                mkdir($application .'/'. $check);
                chmod($application .'/'. $check,0777);
                new_application($application .'/'. $check, $app_name, false, $mdir .'/'. $check);
            }
            elseif(is_file($mdir .'/'. $check))
            {
                copy($mdir .'/'. $check, $application .'/'. $check);
                chmod($application .'/'. $check,0777);
                $new_name = str_replace("%blank%",$app_name,$check);
                rename($application .'/'. $check, $application .'/'. $new_name);

                $text = file_get_contents($application .'/'. $new_name);
                $text = str_replace("%blank%",$app_name,$text);
                file_put_contents($application .'/'. $new_name, $text, LOCK_EX);
            }
        }
    }
    header('Location: /'.$_GET['app_name']);
}