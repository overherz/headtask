<?php
namespace users;
class tags extends \Controller {

    function default_method()
    {
        switch($_POST['act'])
        {
            case "add_tag_to_user":
                $this->add_tag_to_user();
                break;
            case "delete_tag_from_user":
                $this->delete_tag_from_user();
                break;
            case "search_tags":
                $this->search_tags();
                break;            
            default: $this->show();
        }
    }
    
    function show() 
    { 
        $this->check_access();
        $this->set_global("user_menu", "tags");        
        $this->layout_show('tags.html',array('tags' => $this->get_controller("users")->get_user_tags()));
    }  
    
    function add_tag_to_user()
    {    
        $tag = $_POST['tag'];        
        if (strlen($tag) > 0 && $_SESSION['user'])
        {            
            $from_from_base = $this->db->query("select id from tags where name=".$this->db->quote($tag)." LIMIT 1")->fetch();
            if ($from_from_base)
            {
                $i = $this->db->prepare("insert into tags_to_users(id_tag,id_user,count) values(?,?,'0')");                
                if (!$i->execute(array($from_from_base['id'],$_SESSION['user']['id_user']))) $res['error'] = "Ошибка базы данных";
                else $res['success'] = $this->layout_get("elements/tags.html",array('tags' => $this->get_controller("users")->get_user_tags(false,false,true)));
            }
        }
        else $res['error'] = "Переданы неверные данные";
        
        echo json_encode($res);        
    }
    
    function delete_tag_from_user()
    {
        $tag = $_POST['tag'];        
        if (strlen($tag) > 0 && $_SESSION['user'])
        {            
            $from_from_base = $this->db->query("select id from tags where name=".$this->db->quote($tag)." LIMIT 1")->fetch();
            if ($from_from_base)
            {
                $i = $this->db->prepare("delete from tags_to_users where id_tag=? and id_user=? LIMIT 1");                
                if (!$i->execute(array($from_from_base['id'],$_SESSION['user']['id_user']))) $res['error'] = "Ошибка базы данных";
                else $res['success'] = true;
            }
        }
        else $res['error'] = "Переданы неверные данные";
        
        echo json_encode($res);                
    }    
    
    function search_tags()
    {
        if ($_POST['search_tag'] != "")
        {
            $query = $this->db->query("select * from tags where name 
                LIKE ".$this->db->quote("%{$_POST['search_tag']}%")." 
                and id NOT IN (SELECT id_tag from tags_to_users where id_user='{$_SESSION['user']['id_user']}') LIMIT 20");
            while ($row = $query->fetch()) $tags[$row['id']] = $row['name'];            
        }
        if (!$res['success'] = $this->layout_get("elements/tags.html",array('tags' => $tags,'search' => $_POST['search_tag']))) $res['success'] = true;
        echo json_encode($res);
    }
    
    function update_rating_tag($tags=array())
    {
        $count_tags = count($tags);
        
        if ($count_tags > 0)
        {
            for ($i=0;$i<$count_tags;$i++)
            {
                $q_n[] = "?";                
            }
            
            $query = $this->db->prepare("select id from tags where name IN (".implode(",",$q_n).")");
            $query->execute($tags);

            while ($row = $query->fetch()) $update_ids[] = $row['id'];
            if ($update_ids)
            {
                $this->db->query("update tags_to_users set count=count+1 where id_user='{$_SESSION['user']['id_user']}' and id_tag IN(".implode(",",$update_ids).")");
            }    
        }        
    }
}
