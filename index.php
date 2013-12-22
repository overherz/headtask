<?php
if (!empty($_COOKIE[session_name()])) session_id() || session_start();

header('Content-Type: text/html; charset=utf-8');
setlocale(LC_ALL, "ru_RU.UTF-8");
require_once('core/initdata.php');
//pr(apache_get_modules());
//pr($_SERVER['SERVER_SOFTWARE']);
?>
