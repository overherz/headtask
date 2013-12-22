<?php
namespace admin\index;

class logout extends \Admin {

    function default_method()
    {
        unset($_SESSION['admin']);
        $this->redirect('/admin/');
    }
}

