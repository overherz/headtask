<?php
namespace tasks;

require_once(__DIR__ .'../../../../core/initdata.php');

class new_posts extends \Controller {

    private $id;

    function __construct($id,$key)
    {
        $task_cr = $this->get_controller("tasks");
        if ($task = $task_cr->get_task($id))
        {
            $task_cr->get_options();
            if ($key == get_setting('cron_key'))
            {
                $this->id = $task['id'];
                $GLOBALS['cli_task_id'] = $this->id;
                $task_cr->set_status($id,"run",$task['period']);
                $this->get_controller("projects","forum")->new_posts_to_mail();
                $task_cr->set_status($id,"stand");
            }
        }
        else
        {
            $task_cr->set_error("Неверный ключ",$this->id);
        }
    }
}

new new_posts($argv[1],$argv[2]);
