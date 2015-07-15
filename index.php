<?php
if (!session_id())
{
    session_set_cookie_params(0, '/', ".tasker.dev");
    session_start();
}

header('Content-Type: text/html; charset=utf-8');
setlocale(LC_ALL, "ru_RU.UTF-8");
require_once('core/initdata.php');
