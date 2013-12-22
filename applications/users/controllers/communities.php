<?php
namespace users;

class communities extends \Controller {  
    
    var $limit = 5;        
    
    function default_method()
    {
        switch($_POST['act'])
        {
            case "agree":
                $this->agree();
                break;
            case "reject":
                $this->reject();
                break;
            default: $this->all();
        }
    }
    
    function all()
    {
        $this->check_access();
        $this->set_global("user_menu", "communities");    
        
        if ($_GET['act'] == "notifications") $notifications = true;
        if ($notifications) 
        {
            $status = "uc.status IN('request','invite')";
            $order_by = "uc.created DESC";
            crumbs("Приглашения и заявки");
        }
        else 
        {
            $status = "uc.status='confirm'";
            $order_by = "com.name ASC";
        }

        $where = array();            
        if (isset($_GET['q']) && $_GET['q'] != '')
        {
            $search = explode(" ",$_GET['q']);
            foreach ($search as $s)
            {
                $s = $this->db->quote("%{$s}%");
                $search_ar[] = "com.name LIKE ".$s." OR com.description LIKE ".$s." OR com.location LIKE ".$s;                    
            }   
            $where[] = "(".implode("OR ",$search_ar).")";
        }

        if (isset($_GET['tag']) && $_GET['tag'] != '')
        {
            $search = explode(",",$_GET['tag']);
            foreach ($search as $s)
            {
                $tags[] = $s;
                $s = $this->db->quote($s);
                $tag_ar[] = "t.name = {$s}";                    
            }
            $where_tags = "HAVING c = ".count($tags);
            $where[] = "(".implode("OR ",$tag_ar).")";   
            $this->get_controller('users','tags')->update_rating_tag($tags);
        }            
        if (count($where) > 0) $where = "WHERE ".implode(" AND ",$where)." and uc.id_user='{$_SESSION['user']['id_user']}' and {$status}";
        else $where = "where uc.id_user='{$_SESSION['user']['id_user']}' and {$status}";

        $total= $this->db->query("select distinct com.id,count(com.id) as c
                from communities as com
                LEFT JOIN users_to_communities as uc ON uc.id_community=com.id
                LEFT JOIN articles as a ON a.id_community=com.id
                LEFT JOIN tags_to_articles as ta ON ta.id_article=a.id
                LEFT JOIN tags as t ON t.id=ta.id_tag                    
                {$where}     
                group by com.id
                {$where_tags}")->fetchAll();
        $total = count($total);

        require_once(ROOT.'libraries/paginator/paginator.php');
        $paginator = new \Paginator($total, $_GET['page'], $this->limit);
        $p = $this->db->prepare("select distinct com.id,com.name,com.avatar,com.description,com.location,com.subjects,uc.created,uc.status,uc.request_from_user,count(com.id) as c
                from communities as com
                LEFT JOIN users_to_communities as uc ON uc.id_community=com.id
                LEFT JOIN articles as a ON a.id_community=com.id
                LEFT JOIN tags_to_articles as ta ON ta.id_article=a.id
                LEFT JOIN tags as t ON t.id=ta.id_tag                    
                {$where}     
                group by com.id
                {$where_tags}
                ORDER BY {$order_by} 
                LIMIT {$this->limit} 
                OFFSET {$paginator->get_range('from')}
        ");                
        $p->execute();
        while ($row = $p->fetch()) {
            $ids[] = $row['id'];
            $communities[$row['id']] = $row;
            if ($row['status'] == "invite") $users_id[] = $row['request_from_user'];
        }

        if ($notifications && $users_id)
        {
            $users_id = implode(",", $users_id);
            $query = $this->db->query("select * from users where id_user IN({$users_id})");
            while ($row = $query->fetch()) $users[$row['id_user']] = $row;
        }       
        
        $user_controller = $this->get_controller("users");

        $data = array(
            'communities' => $communities,
            'total' => $total,
            'users' => $users,
            'paginator' => $paginator,
            'search' => $_GET['search'],
            'tags' => $user_controller->get_user_tags(false,15),
            'tags_count' => $user_controller->get_user_tags_count(),
            'tag' => $tags,
            'search' => $_GET['q']
        );

        if ($_GET['act'] == "notifications") $this->layout_show("communities_notifications.html",$data);
        else $this->layout_show('communities.html',$data);
    }
    
    function agree()
    {
        $this->check_access();
        $id = intval($_POST['id']);
        if ($id > 0)
        {
            $query = $this->db->prepare("update users_to_communities set status='confirm',created=? where id_user=? and status='invite' and id_community=? LIMIT 1");
            $created = strtotime("now");
            if ($query->execute(array($created,$_SESSION['user']['id_user'],$id))) $res['success'] = true;
            else $res['error'] = "Ошибка базы данных";
        }
        else $res['error'] = "Переданы неверные параметры";
        
        echo json_encode($res);
    }
    
    function reject()
    {
        $this->check_access();        
        $id = intval($_POST['id']);
        if ($id > 0)
        {
            $query = $this->db->prepare("delete from users_to_communities where id_user=? and status='invite' and id_community=? LIMIT 1");
            if ($query->execute(array($_SESSION['user']['id_user'],$id))) $res['success'] = true;
            else $res['error'] = "Ошибка базы данных";
        }
        else $res['error'] = "Переданы неверные параметры";
        
        echo json_encode($res);        
    }
}

