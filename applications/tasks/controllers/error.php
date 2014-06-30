<?php
namespace tasks;

class error extends \Controller {

    function set_error($message,$id)
    {
        $query = $this->db->prepare("update tasks set error_message=?,pid=? where id=? LIMIT 1");
        $query->execute(array($message,"-1",$id));
    }
}

