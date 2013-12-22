<?php
namespace pages;

class pages extends \Controller {

    function default_method($get=false)
    {
        if ($this->id)
        {
            if (is_numeric($this->id)) $query = $this->db->prepare("select * from pages as p
                LEFT JOIN pages_text as pt ON pt.id_page=p.id
                where p.id=? and pt.main IS NOT NULL");
            else $query = $this->db->prepare("select * from pages as p
                LEFT JOIN pages_text as pt ON pt.id_page=p.id
                where url=? and pt.main IS NOT NULL");
            $query->execute(array($this->id));
            if ($page = $query->fetch())
            {
                if ($get) return $page;
                else $this->layout_show('index.html',array('page' => $page));
            }
            else $this->error_page();

        }
        else $this->error_page();
    }
}

