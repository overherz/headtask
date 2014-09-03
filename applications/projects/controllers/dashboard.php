<?php
namespace projects;

class dashboard extends \Controller {
    
    function default_method()
    {
//        require_once(ROOT.'/libraries/calendar/calendar.php');

//        $year = date("Y");
//        $month = date("m");
//        $day = date("d");

//        $task = $this->get_controller("projects","tasks");
//        if ($info = $this->get_controller("projects","calendar")->get_calendar_tasks("{$year}-{$month}-{$day}",false,true)) $tasks = $info['tasks'];

      //  $start = strtotime("midnight", time());
        //$end = date("d.m.Y",strtotime("tomorrow", time()) - 1);
     //   $logs = $this->get_controller("projects","logs")->get_logs(false,false,false,$start,$end);

        $form = array(
            'my' => array('label' => 'Мои',
                'type' => 'checkbox'
            ),
            'assigned' => array('label' => 'Делегированные',
                'type' => 'radio',
                'options' => array('me' => 'Мне','not_all' => 'Никому','not_me' => 'Не мне'),
                'selected' => 'me'
            ),
            'status' => array('label' => 'Статус',
                'type' => 'multy_select',
                'options' => array('new' => 'новая','in_progress' => 'в процессе','closed' => 'закрытая','rejected' => 'отклоненная'),
                'selected' => array('new','in_progress','closed')
            ),
            'priority' => array('label' => 'Приоритет',
                'type' => 'multy_select',
                'options' => array('1' => 'низкий','2' => 'обычный','3' => 'высокий','4' => 'критический')
            ),
            'percent' => array('label' => 'Просроченные',
                'type' => 'checkbox'
            ),
        );

        if ($_POST['act'] == "get_data")
        {
            setcookie('dashboard', serialize($_POST), time()+60*60*24*30,"/");
        }

        if ($_COOKIE['dashboard'] != "")
        {
            $filter = unserialize($_COOKIE['dashboard']);
            foreach ($form as $k => &$f)
            {
                if ($filter[$k]) $f['selected'] = $filter[$k];
            }
            if (!$_POST['act'] == "get_data")
            {
                $start = $filter['start'];
                $end = $filter['end'];
                $start_edit = $filter['start_edit'];
                $end_edit = $filter['end_edit'];
            }
        }

        $u_cr = $this->get_controller("projects","user_tasks");
        $u_cr->limit = 50;
        $u_cr->form = $form;
        $u_cr->owner = true;
        $u_cr->start = $start;
        $u_cr->end = $end;
        $u_cr->start_edit = $start_edit;
        $u_cr->end_edit = $end_edit;
        $u_cr->dashboard = true;

        if ($data['user_tasks'] = $u_cr->default_method())
        {
            //pr($tasks);
         //   $ids = array_keys($tasks);

            /*
            $query = $this->db->query("select * from tasks where controller='new_comments'");
            $task1 = $query->fetch();
            if ($new_comments = $task->get_count_new_comments_mail($task1['completed']))
                pr($new_comments);

            /*
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

                                         //   }

                                           // pr($ids);
            */
          //  $data['comment_count'] = $task->get_count_new_comments($ids);
        }

     //   $data['new_posts'] = $this->get_controller("projects","forum")->get_new_posts_statistic($_SESSION['user']['id_user']);
      //  $data['manager_stats'] = $task->get_manager_stats();
    //    $data['count_project'] = $task->get_count_project();
     //   $data['count_personal_tasks'] = $task->get_count_personal_tasks();
      //  $data['count'] = $info['count'];
       // $data['mask'] = $info['mask'];
      //  $data['count_show'] = count($tasks);
        if (!$_POST['act'] == "get_data") $this->layout_show('calendar/calendar_current_day.html',$data);
    }
}
