<?php
namespace projects;

class all extends \Controller {

    private $limit = 30;

    function default_method()
    {
        crumbs("Все проекты");
        $access = $this->get_controller("projects","users")->get_access();

      //  $where[] = "u.id_user='{$_SESSION['user']['id_user']}'";
        //else $where[] = "(p.owner='{$_SESSION['user']['id_user']}' OR p.owner IS NULL)";

        if (isset($_POST['search']) && $_POST['search'] != '')
        {
            $search = explode(" ",$_POST['search']);
            foreach ($search as $s)
            {
                $s = $this->db->quote("%{$s}%");
                $search_ar[] = "p.name LIKE ".$s;
            }
            $where[] = "(".implode("OR ",$search_ar).")";
        }

        if ($_POST['my'] != "")
        {
            $my = array();
            foreach ($_POST['my'] as $v)
            {
                if ($v == "1") $my[] = "p.owner=".$_SESSION['user']['id_user'];
                if ($v == "2") $my[] = "p.owner IS NULL";
            }
            if (count($my) != 2) $where[] = "(".implode("OR ",$my).")";
        }
        else if ($_GET['filter'] == "my") $where[] = "p.owner=".$_SESSION['user']['id_user'];

        if ($_POST['in'] != "")
        {
            $in = array();
            foreach ($_POST['in'] as $v)
            {
                if ($v == "1") $in[] = "u.id_user='{$_SESSION['user']['id_user']}'";
                if ($v == "2") $in[] = "u.id_user IS NULL";
            }
            if (count($in) != 2) $where[] = "(".implode("OR ",$in).")";
        }
        else if (!$_POST) $where[] = "u.id_user='{$_SESSION['user']['id_user']}'";

        if ($_POST['archive'] != "")
        {
            $archive = array();
            foreach ($_POST['archive'] as $v)
            {
                if ($v == "1") $archive[] = "p.archive IS NULL";
                if ($v == "2") $archive[] = "p.archive IS NOT NULL";
            }
            if (count($archive) != 2) $where[] = "(".implode("OR ",$archive).")";
        }
        else if (!$_POST) $where[] = "p.archive IS NULL";

        if ($where) $where = "where ".implode(" and ",$where);

        $total = $this->db->num_rows("projects as p
            LEFT JOIN projects_users as u ON p.id = u.id_project and u.id_user=".$_SESSION['user']['id_user']."
            {$where}
            order by p.owner DESC,p.name
        ");

        require_once(ROOT.'libraries/paginator/paginator.php');
        $paginator = new \Paginator($total, $_POST['page'], $this->limit);

        $query = $this->db->query("select * from projects as p
            LEFT JOIN projects_users as u ON p.id = u.id_project and u.id_user=".$_SESSION['user']['id_user']."
            {$where}
            group by p.id
            order by p.owner DESC,p.name
            LIMIT {$this->limit}
            OFFSET {$paginator->get_range('from')}
        ");
        $projects = $query->fetchAll();

        $data = array(
            'all_projects' => $projects,
            //'projects' => $this->get_controller("projects")->get_projects(),
            'access' => $access['access'],
            'paginator' => $paginator
        );

        if ($_POST)
        {
            $res['success'] = $this->layout_get("all_projects_table.html",$data);
            echo json_encode($res);
        }
        else $this->layout_show("all_projects.html",$data);
    }
}
