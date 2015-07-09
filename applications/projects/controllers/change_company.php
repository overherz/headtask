<?php
namespace projects;

class change_company extends \Controller
{
    function default_method()
    {
        $query = $this->db->prepare("select * from company_users where id_company=? and id_user=".$_SESSION['user']['id_user']);
        $query->execute(array($this->id));
        if ($query->fetch())
        {
            $_SESSION['user']['current_company'] = $this->id;
        }
        $this->redirect('/projects/dashboard/');
    }
}