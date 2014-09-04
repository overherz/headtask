<?php
namespace projects;

class dashboard extends \Controller {
    
    function default_method()
    {
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
                else $f['selected'] = false;
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
        if (!$_POST['act'] == "get_data") $this->layout_show('calendar/dashboard.html',$data);
    }
}
