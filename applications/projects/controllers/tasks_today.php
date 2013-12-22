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

        $data['new_posts'] = $this->get_controller("projects","forum")->get_new_posts_statistic($_SESSION['user']['id_user']);
        $data['manager_stats'] = $task->get_manager_stats();
        $data['count_project'] = $task->get_count_project();
        $data['count_personal_tasks'] = $task->get_count_personal_tasks();
        $this->layout_show('calendar/calendar_current_day.html',$data);
    }
}
