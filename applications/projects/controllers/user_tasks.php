<?php
namespace projects;

class user_tasks extends \Controller {

    public $limit = 15;
    public $form = array(
        'status' => array('label' => 'Статус',
            'type' => 'multy_select',
            'options' => array('new' => 'новая','in_progress' => 'в процессе','closed' => 'закрытая','rejected' => 'отклоненная'),
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
    public $owner = false;
    public $dashboard = false;

    function default_method($id_user=false)
    {
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

        if ($start && $end) $where[] = "t.start >='{$start}' and (t.end <= '{$end}' or (t.end IS NULL and t.status != 'closed') or (t.end IS NULL and t.status = 'closed' and from_unixtime(t.updated, '%Y-%m-%d') <= '{$end}'))";
        else if ($start) $where[] = "t.start >='{$start}'";
        else if ($end) $where[] = "t.start <= '{$end}' and (t.end <= '{$end}' or (t.end IS NULL and t.status != 'closed') or (t.end IS NULL and t.status = 'closed' and from_unixtime(t.updated, '%Y-%m-%d') <= '{$end}'))";

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

        if (!$this->owner) $where[] = "p.owner IS NULL";
        //$where[] = "(t.id_project IN(select id_project from projects_users where id_user='{$_SESSION['user']['id_user']}' and role='manager') or ((t.id_project IN(select id_project from projects_users where id_user='{$_SESSION['user']['id_user']}' and role='user') and t.assigned='{$_SESSION['user']['id_user']}')))";

        $where[] = "t.id_project IN(
            SELECT id_project from projects_users where id_user={$_SESSION['user']['id_user']}
            and (role='manager' or (role='user' and (t.id_user={$_SESSION['user']['id_user']} or t.assigned={$_SESSION['user']['id_user']} or t.assigned IS NULL))))";

        if (count($where) > 0) $where = "WHERE ".implode(" AND ",$where);

        $total = $this->db->num_rows("projects_tasks as t LEFT JOIN projects as p ON t.id_project = p.id  {$where}");

        require_once(ROOT.'libraries/paginator/paginator.php');
        $paginator = new \Paginator($total, $_POST['page'], $this->limit);
        if ($paginator->pages < $_POST['page']) $paginator = new \Paginator($total, $paginator->pages, $this->limit);

        $t_cr = $this->get_controller("projects","tasks");
        $query = $this->db->prepare("select t.id,t.name,t.assigned,t.status,t.priority,t.start,t.end,t.estimated_time,t.spent_time,t.id_project,t.percent,t.message,t.id_user,t.created,t.updated,
            p.name as project_name,g.color,g.name as group_name,u.first_name,u.last_name,GROUP_CONCAT(c.id_category) as cats
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
        $cats_ids = array();
        while ($row = $query->fetch())
        {
            $row['assigned_name'] = build_user_name($row['first_name'],$row['last_name'],true);
            $row['diff'] = $t_cr->get_date_diff($row['end']);

            $row['cats'] = explode(",",$row['cats']);
            if ($row['cats'][0] == "") $row['cats'] = false;
            if (is_array($row['cats'])) $cats_ids = array_merge($cats_ids,$row['cats']);

            $tasks[] = $row;
        }

        if (count($cats_ids) > 0)
        {
            $cats_ids = array_unique($cats_ids);
            $uniq_ids = implode(",",$cats_ids);

            $query = $this->db->query("select * from projects_tasks_categories where id IN({$uniq_ids})");
            while ($row = $query->fetch())
            {
                $cats[$row['id']] = $row;
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
            'cats' => $cats
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
