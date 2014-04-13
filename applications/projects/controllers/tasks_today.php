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
        if ($info = $this->get_controller("projects","calendar")->get_calendar_tasks("{$year}-{$month}-{$day}",false,true)) $tasks = $info['tasks'];

        $data = array(
            'tasks' => $tasks,
            'manager' => $info['manager']
        );

        if ($tasks)
        {
            //pr($tasks);
            $ids = array_keys($tasks);


            $query = $this->db->query("select * from tasks where controller='new_topics'");
            $ta4 = $query->fetch();
            if ($new_topics = $this->get_controller("projects","forum")->get_new_topics_statistic($ta4['completed']))
            {
                foreach($new_topics as $n)
                {
                    $html = $this->layout_get("forum/topics_mail.html",array('new_topics' => $n,'server_name' => DOMEN_FOR_CLI));
                   // pr($html);
                }
            }

            /*
                        $query = $this->db->query("select * from tasks where controller='new_posts'");
                        $ta3 = $query->fetch();
                        if ($new_posts = $this->get_controller("projects","forum")->get_new_posts_statistic(false,$ta3['completed'])) pr($new_posts);

                               // if ($_SESSION['user']['id_user'] == "1")
                               // {
                                      $query = $this->db->query("select * from tasks where controller='new_comments'");
                                      $task1 = $query->fetch();
                                       if ($new_comments = $task->get_count_new_comments_mail($task1['completed']))
                                       pr($new_comments);
                             //   }

                               // pr($ids);
*/
            $data['comment_count'] = $task->get_count_new_comments($ids);
        }

        $data['new_posts'] = $this->get_controller("projects","forum")->get_new_posts_statistic($_SESSION['user']['id_user']);
        $data['manager_stats'] = $task->get_manager_stats();
        $data['count_project'] = $task->get_count_project();
        $data['count_personal_tasks'] = $task->get_count_personal_tasks();
        $this->layout_show('calendar/calendar_current_day.html',$data);
    }
}
