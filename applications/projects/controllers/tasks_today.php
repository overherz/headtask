<?php
namespace projects;

class tasks_today extends \Controller {
    
    function default_method()
    {
        require_once(ROOT.'/libraries/calendar/calendar.php');

        $year = date("Y");
        $month = date("m");
        $day = date("d");

        $task = $this->get_controller("projects","tasks");
        if ($info = $this->get_controller("projects","calendar")->get_calendar_tasks("{$year}-{$month}-{$day}")) $tasks = $info['tasks'];

        $data = array(
            'tasks' => $tasks,
            'manager' => $info['manager']
        );

        if ($ids = array_keys($tasks))
        {
            $query = $this->db->prepare("SELECT count(c.id) as count,c.id_task
                FROM projects_tasks_comments as c
                LEFT JOIN projects_tasks_last_visit as ls ON c.id_task=ls.id_task and ls.id_user=?
                WHERE ((ls.last_visit < c.created) or ls.id_user IS NULL) and c.id_task IN (".implode(",",$ids).")
                group by c.id_task
            ");
            $query->execute(array($_SESSION['user']['id_user']));
            while($row = $query->fetch())
            {
                $co[$row['id_task']] = $row;
            }
            $data['comment_count'] = $co;
        }

        $data['new_posts'] = $this->get_controller("projects","forum")->get_new_posts_statistic($_SESSION['user']['id_user']);
        $data['manager_stats'] = $task->get_manager_stats();
        $data['count_project'] = $task->get_count_project();
        $data['count_personal_tasks'] = $task->get_count_personal_tasks();
        $this->layout_show('calendar/calendar_current_day.html',$data);
    }
}
