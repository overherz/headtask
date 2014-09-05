<?php
namespace projects;

class logs extends \Controller {

    private $limit = 30;

    function default_method()
    {
        if ($_POST['project'] == "") $all = true;

        if (!$_POST)
        {
            $start = strtotime(date("d.m.Y",strtotime("-3 days", time())));
            $end = time();
        }
        else
        {
            $start = strtotime($_POST['start']);
            $end = strtotime($_POST['end']) + 60*60*24-1;
        }

        $logs = $this->get_logs($_POST['type'],$_POST['project'],false,$start,$end,$_POST['search']);

       // pr($logs['paginator']);

        $data = array(
            'types' => array('project','task','file','news','comment'),//$this->db->get_enum("projects_logs","type"),
            'logs' => $logs['logs'],
            'paginator' => $logs['paginator'],
            'start' => date("d.m.Y",$start),
            'end' => date("d.m.Y",$end),
            'all' => $all
        );

        if ($_POST)
        {
            $res['success'] = $this->layout_get("logs.html",$data);
            echo json_encode($res);
        }
        else $this->layout_show('logs_index.html', $data);
    }

    function get_logs_task($id)
    {
        $query = $this->db->prepare("select pl.*,u.first_name,u.last_name,u.nickname,g.color,g.name as group_name
                    from projects_tasks_logs as pl
                    LEFT JOIN users as u ON u.id_user = pl.id_user
                    LEFT JOIN groups as g ON u.id_group=g.id
                    WHERE pl.id_task=?
                    order by pl.created DESC
                ");
        $query->execute(array($id));
        while ($row = $query->fetch())
        {
            $row['fio'] = build_user_name($row['first_name'],$row['last_name']);
            $logs[] = $row;
        }
        return $logs;
    }

    function get_delayed_manager_tasks()
    {
        $now = date("Y-m-d");
        $query = $this->db->prepare("select pt.name,pt.end,pt.id_project,pt.id,p.name as project_name,u.first_name,u.last_name,u.nickname,pt.assigned
            from projects_tasks as pt
            LEFT JOIN projects as p ON pt.id_project = p.id
            LEFT JOIN users as u ON pt.assigned = u.id_user
            where p.id IN( SELECT id_project from projects_users where id_user=? and role='manager') and end < ? and status IN ('new','in_progress')
        ");
        $query->execute(array($_SESSION['user']['id_user'],$now));
        while ($row = $query->fetch())
        {
            $row['fio'] = build_user_name($row['first_name'],$row['last_name']);
            $tasks[] = $row;
        }
        return $tasks;
    }

    function get_manager_logs($start,$end)
    {
        $query = $this->db->prepare("select pl.*,t.name as task_name,p.name as project_name,t.id_project,u.first_name,u.last_name,u.nickname,g.color,g.name as group_name
                    from projects_tasks_logs as pl
                    LEFT JOIN projects_tasks as t ON pl.id_task = t.id
                    LEFT JOIN projects as p ON t.id_project = p.id
                    LEFT JOIN users as u ON u.id_user = pl.id_user
                    LEFT JOIN groups as g ON u.id_group=g.id
                    WHERE p.id IN( SELECT id_project from projects_users where id_user=? and role='manager') and p.archive IS NULL
                    and p.owner IS NULL and pl.created between ? and ?
                    order by pl.created DESC
                ");
        $query->execute(array($_SESSION['user']['id_user'],$start,$end));
        while ($row = $query->fetch())
        {
            $row['fio'] = build_user_name($row['first_name'],$row['last_name']);
            $logs[] = $row;
        }
        return array('logs' => $logs,'paginator' => $paginator);
    }

    function get_logs1($type,$start,$end)
    {
        switch ($type)
        {
            case "project":
                $query = $this->db->prepare("select pl.*,p.name as project_name,u.first_name,u.last_name,u.nickname,g.color,g.name as group_name
                    from projects_logs as pl
                    LEFT JOIN projects as p ON pl.id_project = p.id
                    LEFT JOIN users as u ON u.id_user = pl.id_user
                    LEFT JOIN groups as g ON u.id_group=g.id
                    WHERE pl.id_project IN( SELECT id_project from projects_users where id_user=?) and p.archive IS NULL
                    and pl.created between ? and ?
                    order by pl.created DESC
                ");
                $query->execute(array($_SESSION['user']['id_user'],$start,$end));
                while ($row = $query->fetch())
                {
                    $row['fio'] = build_user_name($row['first_name'],$row['last_name']);
                    $logs[] = $row;
                }
                return $logs;
                break;
            case "task":
                $query = $this->db->prepare("select pl.*,t.name as task_name,p.name as project_name,t.id_project,u.first_name,u.last_name,u.nickname,g.color,g.name as group_name
                    from projects_tasks_logs as pl
                    LEFT JOIN projects_tasks as t ON pl.id_task = t.id
                    LEFT JOIN projects as p ON t.id_project = p.id
                    LEFT JOIN users as u ON u.id_user = pl.id_user
                    LEFT JOIN groups as g ON u.id_group=g.id
                    WHERE t.assigned=? and p.id IN( SELECT id_project from projects_users where id_user=?) and p.archive IS NULL
                    and pl.created between ? and ?
                    order by pl.created DESC
                ");
                $query->execute(array($_SESSION['user']['id_user'],$_SESSION['user']['id_user'],$start,$end));
                while ($row = $query->fetch())
                {
                    $row['fio'] = build_user_name($row['first_name'],$row['last_name']);
                    $logs[] = $row;
                }
                return $logs;
                break;
        }
    }

    function get_logs($type=false,$id_project=false,$id_task=false,$start=false,$end=false,$search=false)
    {
        $search_data = array($_SESSION['user']['id_user']);
        $where = array();

        if ($type)
        {

            if (!is_array($type))
            {
                $old_type = $type;
                $type = array();
                $type[] = $old_type;
            }

            foreach ($type as &$s) $s = $this->db->quote($s);
            $where[] = "pl.type IN (".implode(",",$type).")";
        }

        if ($start && $end)
        {
            $where[] = "pl.created between ? and ?";
            $search_data[] = $start;
            $search_data[] = $end;
        }

        if ($id_project)
        {
            $where[] = "p.id=?";
            $search_data[] = $id_project;
        }

        if ($id_task)
        {
            $where[] = "t.id=?";
            $search_data[] = $id_task;
        }

        if ($search != '')
        {
            $search = explode(" ",$search);
            foreach ($search as $s)
            {
                $s = $this->db->quote("%{$s}%");
                $search_ar[] = "pl.text LIKE ".$s;
            }
            $where[] = "(".implode("OR ",$search_ar).")";
        }

        if (count($where) > 0) $where_string = " AND ".implode(" AND ",$where);

        $query = $this->db->prepare("
                    select count(pl.id) as count
                    from projects_logs as pl
                    LEFT JOIN projects_tasks as t ON pl.id_task = t.id
                    LEFT JOIN projects as p ON pl.id_project = p.id
                    WHERE pl.id_project IN (SELECT id_project from projects_users where id_user=?) and p.archive IS NULL
                    {$where_string}
        ");
        $query->execute($search_data);
        $count = $query->fetch();

        require_once(ROOT.'libraries/paginator/paginator.php');
        $paginator = new \Paginator($count['count'], $_POST['page'], $this->limit);

        $query = $this->db->prepare("select pl.*,t.name as task_name,p.name as project_name,u.first_name,u.last_name,u.nickname,g.color,g.name as group_name,
                    tu.trash_name as trash_user_name,tp.trash_name as trash_project_name,
                    p.id as id_project,u.id_user as id_user
                    from projects_logs as pl
                    LEFT JOIN projects_tasks as t ON pl.id_task = t.id
                    LEFT JOIN projects as p ON pl.id_project = p.id
                    LEFT JOIN users as u ON u.id_user = pl.id_user
                    LEFT JOIN trash_data as tu ON pl.id_user = tu.id_for_type and tu.type = 'user'
                    LEFT JOIN trash_data as tp ON pl.id_project = tp.id_for_type and tp.type = 'project'
                    LEFT JOIN groups as g ON u.id_group=g.id
                    WHERE pl.id_project IN (SELECT id_project from projects_users where id_user=?) and p.archive IS NULL
                    {$where_string}
                    group by pl.id
                    order by pl.created DESC
                    LIMIT {$this->limit}
                    OFFSET {$paginator->get_range('from')}
                ");
        $query->execute($search_data);
        while ($row = $query->fetch())
        {
            $row['text'] = htmlentities($row['text']);
            $row['text'] = preg_replace("/&lt;a(.*?)&gt;(.*)&lt;\/a&gt;/u","<a html_entity_decode($1)>$2</a>",$row['text']);
//            $m = preg_match("/&lt;a(.*?)&gt;(.*)&lt;\/a&gt;/u",$row['text'],$matches);
//            pr($matches);

            $row['fio'] = build_user_name($row['first_name'],$row['last_name'],true);
            $logs[] = $row;
        }
        return array('logs' => $logs,'paginator' => $paginator);
    }

    function set_logs($type,$id_project,$text,$id_task=false)
    {
        if ($type)
        {
            $query = $this->db->prepare("insert into projects_logs(id_user,id_project,id_task,text,created,type) values(?,?,?,?,?,?)");
            if ($query->execute(array($_SESSION['user']['id_user'],$id_project,$id_task,$text,time(),$type))) return true;
        }
    }
}