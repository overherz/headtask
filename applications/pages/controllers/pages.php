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
                $page['text'] = htmlspecialchars_decode(preg_replace('/<pre>.*?<code.*?>(.*)?<\/code>.*?<\/pre>/siu', '$1', $page['text']));
                if ($get) return $page;
                else
                {
                    $data['page'] = $page;
                    $data = $data+$this->rules($page['template'],$page['id_page']);
                    $this->layout_show("templates/{$page['template']}.html",$data);
                }
            }
            else $this->error_page();

        }
        else $this->error_page();
    }

    function get_layout($layout)
    {
        $this->layout = false;
        return $this->layout_get($layout,array($data));
    }

    function rules($template,$id)
    {
        $data = array();
        if ($template == "with_news" || $template == "with_news_and_list")
        {
            $data['last_news'] = $this->get_controller("news","news")->get_news(10);
            if ($template == "with_news_and_list")
            {
                $query = $this->db->prepare("select path,name from pages where parent_id=? order by name");
                $query->execute(array($id));
                $data['childs'] = $query->fetchAll();
            }
        }
        return $data;
    }
}

