<?php
namespace index;

class index extends \Controller {

    function default_method()
    {
        $this->redirect("/projects/tasks_today/");
    }
}

