<?php
require_once(__DIR__ .'../../../../core/initdata.php');

class communities extends \Controller {

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
                sleep(30);
                $task_cr->set_status($id,"stand");
            }
        }
        else
        {
            $task_cr->set_error("Неверный ключ",$this->id);
        }
    }
}

new communities($argv[1],$argv[2]);

