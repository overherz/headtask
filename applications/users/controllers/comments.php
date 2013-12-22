<?php
namespace users;
class comments extends \Controller {
    
    var $limit = 10;
    
    function default_method() 
    { 
        $this->check_access();
        $this->set_global("user_menu", "comments");
        
        $where = array();    
        $having = array();
        if (isset($_GET['q']) && $_GET['q'] != '')
        {
            $search = explode(" ",$_GET['q']);
            foreach ($search as $s)
            {
                $s = $this->db->quote("%{$s}%");
                $search_ar[] = "ar.text LIKE ".$s." OR ar.name LIKE ".$s;                    
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
            $where[] = "(".implode("OR ",$tag_ar).")";  
            $this->get_controller('users','tags')->update_rating_tag($tags);
        }    

        if ($_GET['new_comment'])
        {
            $having[] = "new_count > 0";
        }

        if (count($where) > 0) $where = "WHERE ".implode(" AND ",$where)." and ar.access_display != 'no' and lv.id_user='{$_SESSION['user']['id_user']}'";
        else $where = " where ar.access_display != 'no' and lv.id_user='{$_SESSION['user']['id_user']}'";    

        if (count($having) > 0) $having = "having ".implode(" AND ",$having);
        else $having = "";
        $total= $this->db->query("select (select count(id) from comments_to_articles as c where c.id_article=ar.id and c.created >= lv.last_visit and c.id_user != lv.id_user) as new_count
                from articles_last_visit as lv
                LEFT JOIN articles as ar ON ar.id=lv.id_article 
                LEFT JOIN tags_to_articles as ta ON ta.id_article=lv.id_article 
                LEFT JOIN tags as t ON t.id=ta.id_tag 
                LEFT JOIN users as u ON ar.author=u.id_user  
                {$where} 
                group by ar.id
                {$having}
        ")->fetchAll();

        $total = count($total);

        require_once(ROOT.'libraries/paginator/paginator.php');
        $paginator = new \Paginator($total, $_GET['page'], $this->limit);
        $p = $this->db->prepare("select ar.id,ar.name,ar.author,ar.preview,ar.created,ar.image,u.fio,u.nickname,gr.id as id_group,gr.name as name_group,count(distinct c.id) as count,count(distinct c1.id) as new_count
                from articles_last_visit as lv
                LEFT JOIN articles as ar ON ar.id=lv.id_article
                LEFT JOIN users as u ON ar.author=u.id_user
                LEFT JOIN groups as gr ON u.id_group=gr.id 
                LEFT JOIN comments_to_articles as c ON c.id_article=lv.id_article  
                LEFT JOIN comments_to_articles as c1 ON c1.id=c.id and c1.created >= lv.last_visit and c.id_user != {$_SESSION['user']['id_user']}
                LEFT JOIN tags_to_articles as ta ON ta.id_article=lv.id_article 
                LEFT JOIN tags as t ON t.id=ta.id_tag
                {$where} 
                group by lv.id_article 
                {$having}
                ORDER BY ar.created DESC
                LIMIT {$this->limit}
                OFFSET {$paginator->get_range('from')}
                ");
        $p->execute();

        while($row = $p->fetch())
        {
            $ids[] = $row['id'];
            $row['preview'] = preg_replace('/([^\s]{36})[^\s]+/', '$1...', $row['preview']);
            $articles[$row['id']] = $row;
        }
        if ($ids)
        {
            $ids = implode(",",$ids);
            $query = $this->db->query("SELECT id_article,count(distinct id_user) as count FROM comments_to_articles where id_article IN ({$ids}) group by id_article");
            while ($row = $query->fetch())
            {
                $articles[$row['id_article']]['count_users'] = $row['count'];
            }

            $query = $this->db->query("select * from tags_to_articles as ta LEFT JOIN tags as t ON ta.id_tag=t.id where ta.id_article IN ({$ids})");
            while ($row = $query->fetch())
            {
                $articles[$row['id_article']]['tags'][$row['id']] = $row['name'];
            }  
              //          pr($articles);
        }
        
        $user_controller = $this->get_controller("users");
        
        $data = array(
            'articles'=>$articles,
            'total'=>$total,
            'paginator' => $paginator,
            'search' => $_GET['search'],
            'tags' => $user_controller->get_user_tags(false,15),
            'tags_count' => $user_controller->get_user_tags_count(),
            'tag' => $tags,
            'search' => $_GET['q'],
            'new_comment' => $_GET['new_comment']
        );

        $this->layout_show('comments.html',$data);
    }   
}
