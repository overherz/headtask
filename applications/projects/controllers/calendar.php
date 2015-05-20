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

    function get_calendar_tasks($date,$id_user=false,$dashboard=false)
    {
        $t_cr = $this->get_controller("projects","tasks");
        if (!$id_user) $id_user = $_SESSION['user']['id_user'];

        if ($dashboard)
        {
            $own = 1 << 0;
            $assigned = 1 << 1;
            $not_assigned = 1 << 2;
            $not_own = 1 << 3;
            $closed = 1 << 4;

            $mask = $_COOKIE['dashboard'] != "" ? $_COOKIE['dashboard'] : 0;
           // pr(decbin($mask));

        }

        $begin_of_day = strtotime("midnight", time());
        $end_of_day   = strtotime("tomorrow", $begin_of_day) - 1;

        $query = $this->db->prepare("select pt.id,pt.message,pt.updated,pt.name,pt.start,pt.end,pt.assigned,pt.id_user as task_creater,pt.status,pt.priority,p.name as project_name,pt.percent,u.first_name,u.last_name,u.nickname as assigned_nickname,p.id as id_project,g.color,g.name as group_name
            from projects_tasks as pt
            LEFT JOIN projects as p ON pt.id_project = p.id
            LEFT JOIN users as u ON pt.assigned = u.id_user
            LEFT JOIN groups as g ON u.id_group=g.id
            where p.id_company=? and p.archive IS NULL and pt.id_project IN( SELECT id_project from projects_users where id_user=? and (role='manager' or (role='user' and (pt.id_user=? or pt.assigned=? or pt.assigned IS NULL))))
            and ((pt.start <= ? and pt.status IN ('new','in_progress','feedback'))
            or (pt.updated >= ? and pt.updated <= ? and pt.status = 'closed'))
            order by pt.updated DESC
        ");

//            where pt.id_project IN( SELECT id_project from projects_users where id_user=? and (role='manager' or (role='user' and (pt.id_user=? or pt.assigned=? or pt.assigned IS NULL)))) and ((pt.start <= ?)
        $query->execute(array($_SESSION['user']['current_company'],$id_user,$id_user,$id_user,$date,$begin_of_day,$end_of_day));
        while ($row = $query->fetch())
        {
            $row['assigned_name'] = build_user_name($row['first_name'],$row['last_name'],true);
            $bit = 0;

            if ($row['task_creater'] == $_SESSION['user']['id_user']) $bit = $bit | $own;
            if ($row['assigned'] == $_SESSION['user']['id_user']) $bit = $bit | $assigned;
            if ($row['assigned'] == "") $bit = $bit | $not_assigned;
            if ($row['status'] == "closed") $bit = $bit | $closed;
            if ($row['assigned'] != $_SESSION['user']['id_user'] && $row['assigned'] != "") $bit = $bit | $not_own;

            $count++;
            $b[] = decbin($bit & $mask);
            if (($dashboard && ($bit & $mask) == $mask) || !$dashboard)
            {
                $row['diff'] = $t_cr->get_date_diff($row['end']);

             //   $row['bit'] = $bit;
             //   $row['bin'] = decbin($bit);
                $tasks[$row['id']] = $row;
            }
        }
       // pr($b);
        if ($tasks) uasort($tasks, array($this,"sort_tasks"));
        return array('tasks' => $tasks,'count' => $count,'mask' => $mask);
    }

    function sort_tasks($a, $b)
    {
        return $b['updated'] - $a['updated'];
    }
}
