<?php
namespace projects;

class calendar extends \Controller {
    
    function default_method()
    {
        switch($_POST['act'])
        {
            case "get_months":
                $this->get_months();
                break;
            default:
                $this->default_for_this();
        }
    }

    function default_for_this()
    {
        require_once(ROOT.'/libraries/calendar/calendar.php');

        if ($_POST)
        {
            list($year,$month) = explode(":",$_POST['month']);
            if ($_POST['weekend'] == "show" || $_POST['weekend'] == "") $weekend = true;
            else $weekend = false;
        }
        else
        {
            $year = date("Y");
            $month = date("m");
        }

        $calendar = new \calendar();
        $currentMonth = $calendar->month($year, $month);
        $prevMonth = $currentMonth->prev();
        $nextMonth = $currentMonth->next();

        $task = $this->get_controller("projects","tasks");
        if ($info = $this->get_calendar_tasks("{$year}-{$month}-{$currentMonth->countDays()}")) $tasks = $info['tasks'];

        $data = array(
            'tasks' => $tasks,
            'currentMonth' => $currentMonth,
            'prevMonth' => array('year' => $prevMonth->year()->int(),'month' => $prevMonth->int()),
            'nextMonth' => array('year' => $nextMonth->year()->int(),'month' => $nextMonth->int()),
            'current_date' => date("Y-m-d"),
            'manager' => $info['manager'],
            'weekend' => $weekend
        );

        if ($_POST)
        {
            $res['success'] = $this->layout_get('calendar/month.html',$data);
            echo json_encode($res);
        }
        else
        {
            $data['manager_stats'] = $task->get_manager_stats();
            $data['count_project'] = $task->get_count_project();
            $data['count_personal_tasks'] = $task->get_count_personal_tasks();
            $this->layout_show('calendar/calendar.html',$data);
        }
    }

    function get_months()
    {
        $res['success'] = $this->layout_get("calendar/months.html",array("year" => intval($_POST['year'])));
        echo json_encode($res);
    }

    function get_calendar_tasks($date)
    {
        $datetime1 = date_create(date("Y-m-d"));

        $query = $this->db->prepare("select pt.id,pt.name,pt.start,pt.end,pt.assigned,pt.id_user as task_creater,pt.status,pt.priority,pt.type,p.name as project_name,pt.percent,u.fio as assigned_name,u.nickname as assigned_nickname,p.id as id_project,g.color,g.name as group_name
            from projects_tasks as pt
            LEFT JOIN projects as p ON pt.id_project = p.id
            LEFT JOIN users as u ON pt.assigned = u.id_user
            LEFT JOIN groups as g ON u.id_group=g.id
            where (pt.assigned=? OR pt.assigned IS NULL or pt.id_user=?) and pt.id_project IN( SELECT id_project from projects_users where id_user=? and role='user') and pt.start <= ? and pt.status IN ('new','in_progress','rejected')
            order by p.name ASC,pt.name ASC
        ");
        $query->execute(array($_SESSION['user']['id_user'],$_SESSION['user']['id_user'],$_SESSION['user']['id_user'],$date));
        while ($row = $query->fetch())
        {
            if ($row['end'] != "")
            {
                $datetime2 = date_create($row['end']);
                $interval = date_diff($datetime1, $datetime2);
                $row['diff'] = $interval->format('%d');
            }
            else $row['diff'] = "inf";
            $tasks[$row['id']] = $row;
        }

        $query = $this->db->prepare("select pt.id,pt.name,pt.start,pt.end,pt.assigned,pt.id_user as task_creater,pt.status,pt.priority,pt.type,p.name as project_name,pt.percent,u.fio as assigned_name,u.nickname as assigned_nickname,p.id as id_project,g.color,g.name as group_name
            from projects_tasks as pt
            LEFT JOIN projects as p ON pt.id_project = p.id
            LEFT JOIN users as u ON pt.assigned = u.id_user
            LEFT JOIN groups as g ON u.id_group=g.id
            where pt.id_project IN( SELECT id_project from projects_users where id_user=? and role='manager') and pt.start <= ? and pt.status IN ('new','in_progress','rejected')
            order by field(pt.assigned,?) DESC,p.name ASC,pt.name ASC
        ");
        $query->execute(array($_SESSION['user']['id_user'],$date,$_SESSION['user']['id_user']));
        while ($row = $query->fetch())
        {
            if ($row['end'] != "")
            {
                $datetime2 = date_create($row['end']);
                $interval = date_diff($datetime1, $datetime2);
                $row['diff'] = $interval->format('%d');
            }
            else $row['diff'] = "inf";
            $tasks[$row['id']] = $row;
            $manager = true;
        }
        return array('tasks' => $tasks,'manager' => $manager);
    }
}
