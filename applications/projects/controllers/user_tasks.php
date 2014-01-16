<?php
namespace projects;

class user_tasks extends \Controller {

    var $limit = 15;

    function default_method()
    {
        $query = $this->db->query("select id_project from projects_users where id_user='{$_SESSION['user']['id_user']}' and role='manager'");
        if (!$query->fetchAll()) $this->error_page("denied");

        $form = array(
            'status' => array('label' => 'Статус',
                'type' => 'multy_select',
                'options' => array('new' => 'новая','in_progress' => 'в процессе','closed' => 'закрытая','rejected' => 'отклоненная'),
                'selected' => array('new','in_progress','closed','rejected')
            ),
            'priority' => array('label' => 'Приоритет',
                'type' => 'multy_select',
                'options' => array('1' => 'низкий','2' => 'обычный','3' => 'высокий','4' => 'критический'),
                'selected' => array('1','2','3','4')
            ),
            'type' => array('label' => 'Тип задачи',
                'type' => 'multy_select',
                'options' => array('task' => 'улучшение','error' => 'ошибка'),
                'selected' => array('task','error')
            ),
            'percent' => array('label' => 'Только просроченные',
                'type' => 'checkbox'
            ),
        );

        if ($_POST['id_user'] == "") $result['error'] = "Выберите пользователя";
        else
        {
            $where[] = "t.assigned=".$this->db->quote($_POST['id_user']);

            if ($_POST['start'] != "") $start = convert_date($_POST['start'],true);
            if ($_POST['end'] != "") $end = convert_date($_POST['end'],true);

            if ($start && $end) $where[] = "t.start >='{$start}' and (t.end <= '{$end}' or t.end IS NULL)";
            else if ($start) $where[] = "t.start >='{$start}'";
            else if ($end) $where[] = "t.start <= '{$end}' and (t.end <= '{$end}' or t.end IS NULL)";

            if (isset($_POST['search']) && $_POST['search'] != '')
            {
                $search = explode(" ",$_POST['search']);
                foreach ($search as $s)
                {
                    $s = $this->db->quote("%{$s}%");
                    $search_ar[] = "t.name LIKE ".$s." OR t.description LIKE ".$s." OR a.fio LIKE ".$s." OR a.nickname LIKE ".$s;
                }
                $where[] = "(".implode("OR ",$search_ar).")";
            }

            if (isset($_POST['status']) && $_POST['status'] != '')
            {
                foreach ($_POST['status'] as &$s) $s = $this->db->quote($s);
                $where[] = "t.status IN (".implode(",",$_POST['status']).")";
            }

            if (isset($_POST['percent']) && $_POST['percent'] != '')
            {
                $d = "'".date("Y-m-d")."'";
                $where[] = "(t.end IS NOT NULL and t.end < {$d} and t.status IN('new','in_progress'))";
            }

            if (isset($_POST['priority']) && $_POST['priority'] != '')
            {
                foreach ($_POST['priority'] as &$s) $s = $this->db->quote($s);
                $where[] = "t.priority IN (".implode(",",$_POST['priority']).")";
            }

            if (isset($_POST['type']) && $_POST['type'] != '')
            {
                foreach ($_POST['type'] as &$s) $s = $this->db->quote($s);
                $where[] = "t.type IN (".implode(",",$_POST['type']).")";
            }

            $where[] = "(t.id_project IN(select id_project from projects_users where id_user='{$_SESSION['user']['id_user']}' and role='manager') or ((t.id_project IN(select id_project from projects_users where id_user='{$_SESSION['user']['id_user']}' and role='user') and t.assigned='{$_SESSION['user']['id_user']}')))";

            if (count($where) > 0) $where = "WHERE ".implode(" AND ",$where);

            $total = $this->db->num_rows("projects_tasks as t LEFT JOIN users as a ON t.assigned = a.id_user {$where}");

            require_once(ROOT.'libraries/paginator/paginator.php');
            $paginator = new \Paginator($total, $_POST['page'], $this->limit);
            if ($paginator->pages < $_POST['page']) $paginator = new \Paginator($total, $paginator->pages, $this->limit);

            $datetime1 = date_create(date("Y-m-d"));

            $query = $this->db->prepare("select t.id,t.type,t.name,t.assigned,t.status,t.priority,t.start,t.end,t.estimated_time,t.spent_time,t.id_project,t.percent,t.message,t.id_user,t.created,t.updated,
                a.fio as assigned_name,a.nickname as assigned_nickname,
                u.fio as user_name,u.nickname as user_nickname,g.color,g.name as group_name,
                gt.color as assigned_color,gt.name as assigned_group_name,p.name as project_name
                from projects_tasks as t
                LEFT JOIN users as a ON t.assigned = a.id_user
                LEFT JOIN users as u ON t.id_user = u.id_user
                LEFT JOIN groups as g ON u.id_group = g.id
                LEFT JOIN groups as gt ON a.id_group = gt.id
                LEFT JOIN projects as p ON t.id_project = p.id
                {$where}
                order by t.updated DESC,t.name ASC
                LIMIT {$this->limit}
                OFFSET {$paginator->get_range('from')}
            ");
            $query->execute();
            while ($row = $query->fetch())
            {
                if ($row['end'] != "")
                {
                    $datetime2 = date_create($row['end']);
                    $interval = date_diff($datetime1, $datetime2);
                    $row['diff'] = $interval->format('%d');
                }
                else $row['diff'] = "inf";
                $tasks[] = $row;
            }
        }

        $users= $this->db->query("select distinct u.id_user,u.fio
                    from users as u
                    LEFT JOIN groups as gr ON u.id_group=gr.id
                    ")->fetchAll();

        $data = array(
            'form' => $form,
            'users' => $users,
            'paginator' => $paginator,
            'tasks' => $tasks,
        );

        if ($_POST)
        {
            if ($text = $this->layout_get('calendar/task_today.html',$data)) $result['success'] = $text;
            else $result['error'] = "Ничего не найдено";

            echo json_encode($result);
        }
        else $this->layout_show('user_tasks.html',$data);
    }
}
