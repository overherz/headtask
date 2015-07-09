<?php
namespace company;

class company extends \Controller {  
    
    function default_method()
    {
        //$this->layout_show('index.html');
    }

    function get_company($id_company)
    {
        $query = $this->db->prepare("select * from company where id=?");
        $query->execute(array($id_company));
        return $query->fetch();
    }

    function user_in_company($id_user,$id_company)
    {
        $query = $this->db->prepare("select * from company_users where id_user=? and id_company=?");
        $query->execute(array($id_user,$id_company));
        return $query->fetch();
    }
}
