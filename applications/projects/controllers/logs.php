<?php
namespace projects;

class logs extends \Controller {

    function default_method()
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

  //      $logs_tasks = $this->get_logs("task",$start,$end);
  //      $logs_projects = $this->get_logs("project",$start,$end);
  //      $manager_logs = $this->get_manager_logs($start,$end);

        $query = $this->db->prepare("select l.*,u.first_name,u.last_name,u.id_user,p.name as project_name,
            tu.trash_name as trash_user_name,tp.trash_name as trash_project_name,
            p.id as id_project,u.id_user as id_user,
            g.color,g.name as group_name
            from projects_logs as l
            LEFT JOIN users as u ON l.id_user = u.id_user
            LEFT JOIN projects as p ON l.id_project = p.id
            LEFT JOIN trash_data as tu ON l.id_user = u.id_user and tu.type = 'user'
            LEFT JOIN trash_data as tp ON l.id_user = u.id_user and tp.type = 'project'
            LEFT JOIN groups as g ON u.id_group=g.id
            WHERE p.id IN( SELECT id_project from projects_users where id_user=?
        ");
        $query->execute(array($_SESSION['user']['id_user']));
        while ($row = $query->fetch())
        {
            if ($row['first_name']) $row['fio'] = build_user_name($row['first_name'],$row['last_name']);
            $logs[] = $row;
        }

        $data = array(
            'logs' => $logs,
            'logs_tasks' => $logs_tasks,
            'logs_projects' => $logs_projects,
            'manager_logs' => $manager_logs,
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

    function get_logs($type,$start,$end)
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

    function set_logs($type,$id_project,$text,$id_task=false)
    {
        if ($type)
        {
            $query = $this->db->prepare("insert into projects_logs(id_user,id_project,id_task,text,created,type) values(?,?,?,?,?,?)");
            if ($query->execute(array($_SESSION['user']['id_user'],$id_project,$id_task,$text,time(),$type))) return true;
        }
    }
}