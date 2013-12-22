<?php
namespace users;

class business_zones extends \Controller {

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
        $this->set_global("user_menu", "business_zones");
        $status = "uc.status='confirm'";
        $order_by = "com.name ASC";

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

        if (count($where) > 0) $where = "WHERE ".implode(" AND ",$where)." and uc.id_user='{$_SESSION['user']['id_user']}' and {$status}";
        else $where = "where uc.id_user='{$_SESSION['user']['id_user']}' and {$status}";

        $total= $this->db->query("select distinct com.id,count(com.id) as c
                from business_zones as com
                LEFT JOIN users_to_business_zones as uc ON uc.id_zone=com.id
                {$where}
                group by com.id
                {$where_tags}")->fetchAll();
        $total = count($total);
//pr($total);
        require_once(ROOT.'libraries/paginator/paginator.php');
        $paginator = new \Paginator($total, $_GET['page'], $this->limit);
        $p = $this->db->prepare("select distinct com.id,com.name,com.description,uc.role,count(com.id) as c,ib.path
                from business_zones as com
                LEFT JOIN users_to_business_zones as uc ON uc.id_zone=com.id
                LEFT JOIN images_to_business_zones as ib ON ib.id_zone=com.id and ib.main = 1
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
            $business_zones[$row['id']] = $row;
        }

        $user_controller = $this->get_controller("users");

        $data = array(
            'business_zones' => $business_zones,
            'total' => $total,
            'paginator' => $paginator,
            'search' => $_GET['q'],
            'roles' => array('root_admin','admin','user','worker')
        );

        $this->layout_show('business_zones.html',$data);
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

