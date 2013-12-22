<?php
namespace users;

class contactlist extends \Controller {  
    
    var $limit = 20;        
    
    function default_method()
    {
        switch($_POST['act'])
        {
            case "add_to_list":
                $this->add_to_list();
                break;
            case "del_from_list":
                $this->del_from_list();
                break;
            default: $this->showlist();
        }
    }
    function showlist() {
        $this->check_access();
        $this->set_global("user_menu", "contactlist");
        $where = array(); 
        $where[] = "cl.id_owner = {$_SESSION['user']['id_user']}";
        $where[] = "u.mailconfirm = '1'";           
        if (isset($_GET['q']) && $_GET['q'] != '')
        {
            $search = explode(" ",$_GET['q']);
            foreach ($search as $s)
            {
                $s = $this->db->quote("%{$s}%");
                $search_ar[] = "u.fio LIKE ".$s." OR u.nickname LIKE ".$s." OR up.value LIKE ".$s;                    
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
        if (count($where) > 0) $where = "WHERE ".implode(" AND ",$where);
        else $where = "";

        $total= $this->db->query("select distinct u.id_user,count(u.id_user) as c
                from contact_list as cl
                LEFT JOIN users as u ON u.id_user=cl.id_contact 
                LEFT JOIN userprofiles as up ON up.iduser=u.id_user                    
                LEFT JOIN tags_to_users as tu ON tu.id_user=u.id_user
                LEFT JOIN tags as t ON t.id=tu.id_tag                    
                {$where}
                group by u.id_user,up.idprof
                {$where_tags}")->fetchAll();
        $total = count($total);

        require_once(ROOT.'libraries/paginator/paginator.php');
        $paginator = new \Paginator($total, $_GET['page'], $this->limit);
        $p = $this->db->prepare("select distinct u.fio,u.nickname,u.avatar,u.id_user,u.gender,gr.id as id_group,gr.name as name_group,count(u.id_user) as c
                from contact_list as cl
                LEFT JOIN users as u ON u.id_user=cl.id_contact
                LEFT JOIN userprofiles as up ON up.iduser=u.id_user                    
                LEFT JOIN groups as gr ON u.id_group=gr.id 
                LEFT JOIN tags_to_users as tu ON tu.id_user=u.id_user
                LEFT JOIN tags as t ON t.id=tu.id_tag
                {$where}
                group by u.id_user,up.idprof
                {$where_tags}
                ORDER BY u.fio ASC 
                LIMIT {$this->limit} 
                OFFSET {$paginator->get_range('from')}
        ");                
        $p->execute();
        while ($row = $p->fetch()) {
            $ids[] = $row['id_user'];
            $users[$row['id_user']] = $row;
        }

        if ($ids)
        {
            $ids = implode(",",$ids);
            $p2 = $this->db->query("select up.iduser,up.value, pr.name, pr.alias 
                    FROM userprofiles as up 
                    LEFT JOIN profile as pr ON up.idprof=pr.id 
                    WHERE up.iduser IN ({$ids}) AND pr.name IN ('job', 'post', 'wherefrom')");            
            while ($row = $p2->fetch()) {
                $users[$row['iduser']][$row['name']]=$row['value'];
            }                        
        
            if ($_GET['mode'] == "invite")
            {
                $community = intval($_GET['community']);
                $query = $this->db->query("select * from users_to_communities where id_user IN({$ids}) and id_community=".$this->db->quote($community));
                while ($row = $query->fetch()) $invites[$row['id_user']] = $row;            
            }
        }

        $user_controller = $this->get_controller("users");
        $data = array(
            'users' => $users,
            'total' => $total,
            'paginator' => $paginator,
            'search' => $_GET['search'],
            'tags' => $user_controller->get_user_tags(false,15),
            'tags_count' => $user_controller->get_user_tags_count(),
            'tag' => $tags,
            'get' => $_GET,
            'invites' => $invites,
            'search' => $_GET['q']
        );

        $this->layout_show('contactlist.html',$data);
    }
    function add_to_list() {
        $this->check_access();
        $id = intval($_POST['id_contact']);
        if ($id>0) {
            $query = $this->db->prepare("INSERT INTO contact_list(id_owner,id_contact) VALUES(?, ?)");
            if ($query->execute(array($_SESSION['user']['id_user'],$id))) $res['success'] = true;
            else $res['error'] = "Ошибка базы данных";
        }
        else $res['error'] = "Переданы неверные параметры";
 
        echo json_encode($res);
    }
    function del_from_list() {
        $this->check_access();
        $id = intval($_POST['id_contact']);
        if ($id>0) {
            $query = $this->db->prepare("DELETE FROM contact_list WHERE id_owner = ? AND id_contact = ?");
            if ($query->execute(array($_SESSION['user']['id_user'],$id))) $res['success'] = true;
            else $res['error'] = "Ошибка базы данных";
        }
        else $res['error'] = "Переданы неверные параметры";
        
        echo json_encode($res);
    }
}

