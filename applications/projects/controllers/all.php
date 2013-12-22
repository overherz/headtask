<?php
namespace projects;

class all extends \Controller {

    private $limit = 30;

    function default_method()
    {
        crumbs("Все проекты");
        $access = $this->get_controller("projects","users")->get_access();

        if ($_SESSION['user']['id_group'] != 1) $where[] = "u.id_user='{$_SESSION['user']['id_user']}' and u.role IS NOT NULL";
        else $where[] = "(p.owner='{$_SESSION['user']['id_user']}' OR p.owner IS NULL)";

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

        if ($where) $where = "where ".implode(" and ",$where);

        $total = $this->db->num_rows("projects as p
            LEFT JOIN projects_users as u ON p.id = u.id_project
            {$where}
            order by p.owner DESC,p.name
        ","distinct p.id");

        require_once(ROOT.'libraries/paginator/paginator.php');
        $paginator = new \Paginator($total, $_POST['page'], $this->limit);

        $query = $this->db->query("select * from projects as p
            LEFT JOIN projects_users as u ON p.id = u.id_project
            {$where}
            group by p.id
            order by p.owner DESC,p.name
            LIMIT {$this->limit}
            OFFSET {$paginator->get_range('from')}
        ");
        $projects = $query->fetchAll();

        $data = array(
            'all_projects' => $projects,
            'projects' => $this->get_controller("projects")->get_projects(),
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

    function get_all_projects()
    {

        return $projects;
    }
}
