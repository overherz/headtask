<?php
namespace projects;

class user_tasks extends \Controller {

    public $limit = 15;
    public $form = array(
        'status' => array('label' => 'Статус',
            'type' => 'multy_select',
            'options' => array(),
            'selected' => array('new','in_progress')
        ),
        'priority' => array('label' => 'Приоритет',
            'type' => 'multy_select',
            'options' => array('1' => 'низкий','2' => 'обычный','3' => 'высокий','4' => 'критический')
        ),
        'percent' => array('label' => 'Только просроченные',
            'type' => 'checkbox'
        ),
    );
    public $start = false;
    public $end = false;
    public $start_edit = false;
    public $end_edit = false;
    public $owner = false;
    public $dashboard = false;
    public $id_project = false;
    public $access = array();

    function default_method($id_user=false)
    {
        $t_cr = $this->get_controller("projects","tasks");
        if (count($this->form['status']['options']) == 0)
        {
            foreach ($t_cr->status as $f)
            {
                $this->form['status']['options'][$f] = lang("task_status_".$f);
            }
        }

        if (!$id_user && $_POST['id_user'] != "") $id_user = $_POST['id_user'];

        if (!$_POST)
        {
            foreach ($this->form as $k => $f)
            {
                if ($f['selected']) $_POST[$k] = $f['selected'];
            }
        }

        if ($_POST['start'] != "") $start = convert_date($_POST['start'],true);
        else $start = convert_date($this->start,true);
        if ($_POST['end'] != "") $end = convert_date($_POST['end'],true);
        else $end = convert_date($this->end,true);

        if ($_POST['start_edit'] != "") $start_edit = convert_date($_POST['start_edit'],true);
        else $start_edit = convert_date($this->start_edit,true);
        if ($_POST['end_edit'] != "") $end_edit = convert_date($_POST['end_edit'],true);
        else $end_edit = convert_date($this->end_edit,true);

        if ($start && $end) $where[] = "t.start >='{$start}' and (t.end <= '{$end}' or t.end IS NULL)";
        else if ($start) $where[] = "t.start >='{$start}'";
        else if ($end) $where[] = "t.start <= '{$end}' and (t.end <= '{$end}' or t.end IS NULL)";

        if ($start_edit && $end_edit) $where[] = "from_unixtime(t.updated,'%Y-%m-%d') >='{$start_edit}' and from_unixtime(t.updated,'%Y-%m-%d') <= '{$end_edit}'";
        else if ($start_edit) $where[] = "from_unixtime(t.updated,'%Y-%m-%d') >='{$start_edit}'";
        else if ($end_edit) $where[] = "from_unixtime(t.updated,'%Y-%m-%d') <= '{$end_edit}' and from_unixtime(t.updated,'%Y-%m-%d') <= '{$end_edit}'";

        if (isset($_POST['search']) && $_POST['search'] != '')
        {
            $search = explode(" ",$_POST['search']);
            foreach ($search as $s)
            {
                $s = $this->db->quote("%{$s}%");
                $search_ar[] = "t.name LIKE ".$s." OR t.description LIKE ".$s;
            }
            $where[] = "(".implode("OR ",$search_ar).")";
        }

        $where[] = "p.id_company=".$GLOBALS['globals']['current_company'];

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

        if (isset($_POST['my']) && $_POST['my'] != '')
        {
            $where[] = "t.id_user=".$_SESSION['user']['id_user'];
        }

        if (isset($_POST['assigned']) && $_POST['assigned'] != '')
        {
            switch ($_POST['assigned'])
            {
                case "me":
                    $where[] = "t.assigned = ".$_SESSION['user']['id_user'];
                    break;
                case "not_me":
                    $where[] = "t.assigned != ".$_SESSION['user']['id_user'];
                    break;
                case "not_all":
                    $where[] = "t.assigned IS NULL";
                    break;
            }
        }
        else if ($id_user) $where[] = "t.assigned=".$this->db->quote($id_user);

        if ($this->id_project)
        {
            $where[] = "t.id_project=".$this->db->quote($this->id_project);
            if (!$this->access['show_tasks'])
            {
                $where[] = "(t.id_user={$_SESSION['user']['id_user']} or t.assigned={$_SESSION['user']['id_user']})";
            }
        }
        else
        {
            $where[] = "t.id_project IN(
            SELECT id_project from projects_users where id_user={$_SESSION['user']['id_user']}
            and (role='manager' or (role='user' and (t.id_user={$_SESSION['user']['id_user']} or t.assigned={$_SESSION['user']['id_user']} or t.assigned IS NULL))))";
        }

        if (isset($_POST['category']) && $_POST['category'] != '')
        {
            foreach ($_POST['category'] as $k => &$s)
            {
                $s = (int) $s;
                if ($s < 1) unset($_POST['category'][$s]);
            }
            if (count($_POST['category']) > 0) $where[] = "c.id_category IN (".implode(",",$_POST['category']).")";
        }

        if (!$this->owner) $where[] = "p.owner IS NULL";
        //$where[] = "(t.id_project IN(select id_project from projects_users where id_user='{$_SESSION['user']['id_user']}' and role='manager') or ((t.id_project IN(select id_project from projects_users where id_user='{$_SESSION['user']['id_user']}' and role='user') and t.assigned='{$_SESSION['user']['id_user']}')))";

        if (!$this->id_project) $where[] = "p.archive IS NULL";
        if (count($where) > 0) $where = "WHERE ".implode(" AND ",$where);

        $total = $this->db->num_rows("projects_tasks as t LEFT JOIN projects as p ON t.id_project = p.id LEFT JOIN projects_tasks_to_categories as c ON c.id_task = t.id {$where}",'distinct t.id');

        require_once(ROOT.'libraries/paginator/paginator.php');
        $paginator = new \Paginator($total, $_POST['page'], $this->limit);
        if ($paginator->pages < $_POST['page']) $paginator = new \Paginator($total, $paginator->pages, $this->limit);

        $query = $this->db->prepare("select t.id,t.name,t.assigned,t.status,t.priority,t.start,t.end,t.estimated_time,t.spent_time,t.id_project,t.percent,t.message,t.id_user,t.created,t.updated,
            p.name as project_name,g.color,g.name as group_name,u.first_name,u.last_name
            from projects_tasks as t
            LEFT JOIN projects as p ON t.id_project = p.id
            LEFT JOIN users as u ON t.assigned = u.id_user
            LEFT JOIN groups as g ON u.id_group=g.id
            LEFT JOIN projects_tasks_to_categories as c ON c.id_task = t.id
            {$where}
            group by t.id
            order by t.updated DESC,t.name ASC
            LIMIT {$this->limit}
            OFFSET {$paginator->get_range('from')}
        ");
        $query->execute();
        $tasks_ids = array();
        while ($row = $query->fetch())
        {
            $row['assigned_name'] = build_user_name($row['first_name'],$row['last_name'],true);
            $row['diff'] = $t_cr->get_date_diff($row['end']);
            $tasks_ids[] = $row['id'];
            $tasks[$row['id']] = $row;
        }

        if ($tasks && $this->dashboard)
        {
            $ids = array_keys($tasks);
            $comment_count = $t_cr->get_count_new_comments($ids);
        }

        if (count($tasks_ids) > 0)
        {
            $tasks_ids = implode(",",$tasks_ids);
            $query = $this->db->query("select *
                from projects_tasks_to_categories as tc
                LEFT JOIN projects_tasks_categories as c ON tc.id_category = c.id
                where tc.id_task IN({$tasks_ids}) order by c.name ASC");
            while ($row = $query->fetch())
            {
                $tasks[$row['id_task']]['cats'][] = $row;
            }
        }

        $data = array(
            'form' => $this->form,
            'paginator' => $paginator,
            'tasks' => $tasks,
            'id_user' => $id_user,
            'dashboard' => $this->dashboard,
            'start' => $this->start,
            'end' => $this->end,
            'start_edit' => $this->start_edit,
            'end_edit' => $this->end_edit,
            'comment_count' => $comment_count,
            'id_project' => $this->id_project,
            'access' => $this->access
        );

        if ($_POST['act'] == "get_data")
        {
            if ($text = $this->layout_get('calendar/task_today.html',$data)) $result['success'] = $text;
            else $result['error'] = "Ничего не найдено";

            echo json_encode($result);
        }
        else return $this->layout_get('user_tasks.html',$data);
    }
}
