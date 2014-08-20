<?php
namespace projects;

class logs extends \Controller {

    function default_method()
    {
        switch ($_GET['act'])
        {
            case "update":
                $this->update_logs();
                break;
            default: $this->show_logs();
        }
    }

    function update_logs()
    {
        $query = $this->db->query("select l.*,t.id_project
            from projects_tasks_logs as l
            LEFT JOIN projects_tasks as t ON l.id_task = t.id
        ");
        while ($row = $query->fetch())
        {
            $query = $this->db->prepare("insert into projects_logs(id_user,id_project,id_task,text,created,type) values(?,?,?,?,?,?)");
            $query->execute(array($row['id_user'],$row['id_project'],$row['id_task'],$row['text'],$row['created'],'task'));
        }
    }

    function show_logs()
    {
        if (!$_POST)
        {
            $start = strtotime(date("d-m-Y",strtotime("-1 days", time())));
            $end = time();
        }
        else
        {
            $start = strtotime($_POST['start']);
            $end = strtotime($_POST['end']) + 60*60*24-1;
        }

        $logs = $this->get_logs($_POST['type'],false,false,$start,$end);

        $data = array(
            'types' => array('project','task','file'),//$this->db->get_enum("projects_logs","type"),
            'logs' => $logs,
            'start' => date("d-m-Y",$start),
            'end' => date("d-m-Y",$end)
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
        return $logs;
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

    function get_logs($type=false,$id_project=false,$id_task=false,$start=false,$end=false)
    {
        $search_data = array($_SESSION['user']['id_user']);
        $where = array();

        if ($type)
        {
            $where[] = "pl.type=?";
            $search_data[] = $type;
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

        if (count($where) > 0) $where_string = " AND ".implode(" AND ",$where);

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
                ");
        $query->execute($search_data);
        while ($row = $query->fetch())
        {
            $row['fio'] = build_user_name($row['first_name'],$row['last_name']);
            $logs[] = $row;
        }

        return $logs;
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