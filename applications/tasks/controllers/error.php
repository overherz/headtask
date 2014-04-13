<?php
namespace tasks;

class error extends \Controller {

    function set_error($message,$id)
    {
        $query = $this->db->prepare("update tasks set status=?,error_message=? where id=? LIMIT 1");
        $query->execute(array('stand',$message,$id));
    }
}

