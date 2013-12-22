<?php
namespace admin\logs;

class admin extends \Admin {

    var $limit = 15;

    function default_method()
    {
        $this->get_controller("logs",false,true)->default_method('admin');
    }
}

