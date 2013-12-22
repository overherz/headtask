<?php

function _get_info()
{
    Controller::set_global("admin",$_SESSION['admin']);
}

_get_info();
