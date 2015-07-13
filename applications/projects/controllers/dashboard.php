<?php
namespace projects;

class dashboard extends \Controller {
    
    function default_method()
    {
        $t_cr = $this->get_controller("projects","tasks");
        foreach ($t_cr->status as $k => $f)
        {
            $form_status[$f] = lang("task_status_".$f);
        }

        $form = array(
            'my' => array('label' => 'Создал я',
                'type' => 'checkbox',
                'wrapper' => 'div'
            ),
            'assigned' => array('label' => 'Делегированные',
                'type' => 'radio',
                'options' => array('all' => 'Все','me' => 'Мне','not_all' => 'Никому','not_me' => 'Не мне'),
                'selected' => 'me'
            ),
            'status' => array('label' => 'Статус',
                'type' => 'checkbox',
                'options' => $form_status,
                'selected' => array('new','in_progress','closed'),
                'wrapper' => 'div'
            ),
            'priority' => array('label' => 'Приоритет',
                'type' => 'checkbox',
                'options' => array('1' => 'низкий','2' => 'обычный','3' => 'высокий','4' => 'критический'),
                'wrapper' => 'div'
            ),
            'percent' => array('label' => 'Просроченные',
                'type' => 'checkbox'
            ),
            'search' => array('label' => 'Поиск',
                'type' => 'text',
                'selected' => $_POST['search']
            )
        );

        $u_data_cr = $this->get_controller("users");

        if ($_POST['act'] == "get_data")
        {
            $u_data_cr->save_user_data($_SESSION['user']['id_user'],"dashboard",serialize($_POST));
        }

        else if ($user_data = $u_data_cr->get_user_data($_SESSION['user']['id_user'],"dashboard"))
        {
            $filter = unserialize($user_data['data']);
            foreach ($form as $k => &$f)
            {
                if ($filter[$k]) $f['selected'] = $filter[$k];
                else $f['selected'] = false;
            }

            $start = $filter['start'];
            $end = $filter['end'];
            $start_edit = $filter['start_edit'];
            $end_edit = $filter['end_edit'];
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
        if (!$_POST['act'] == "get_data") $this->layout_show('calendar/dashboard.html',$data);
    }
}
