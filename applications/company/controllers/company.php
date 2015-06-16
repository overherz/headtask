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
}
