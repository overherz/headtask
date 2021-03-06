<?php
namespace projects;

class tasks extends \Controller {

    public $limit = 30;
    public $status = array('new','in_progress','feedback','rejected','closed');
    
    function default_method()
    {
        switch($_POST['act'])
        {
            case "save_task":
                $this->save_task();
                break;
            case "get_forward_task":
                $this->get_forward_tasks();
                break;
            case "forward_task":
                $this->forward_tasks();
                break;
            case "add_file_to_task":
                $this->add_file_to_task();
                break;
            case "add_files":
                $this->add_files();
                break;
            case "delete_task":
                $this->delete_task();
                break;
            case "add_comment":
                $this->add_comment();
                break;
            case "delete_comment":
                $this->delete_comment();
                break;
            case "get_categories":
                $this->get_categories();
                break;
            default:
                $this->default_for_this();
        }
    }

    function default_for_this()
    {
        switch($this->id)
        {
            case "add":
                $this->add_task();
                break;
            case "show":
            case "edit":
                $this->show_edit_task();
                break;
            default:
                $this->show_tasks();
        }
    }

    function add_task()
    {
        $access = $this->get_controller("projects","users")->get_access($this->_0);

        if ($access['access']['add_task'])
        {
            if (!$project = $access['project']) $this->error_page();

            if ($project['owner']) crumbs("Личные","/projects/all/?filter=my");
            crumbs($project['name'],"/projects/~{$project['id']}");
            crumbs("Задачи","/projects/tasks/{$project['id']}/");
            crumbs("Добавление");
            $users = $this->get_controller("projects","users")->get_users_project($this->_0);

            $this->set_global('id_project',$project['id']);
            $this->layout_show('tasks/add_task.html',array(
                //'projects' => $this->get_controller("projects")->get_projects($project['id']),
                'add_tasks_button' => true,
                'project' => $project,
                'users' => $users,
                'manager' => true,
                'access' => $access['access'],
                'status' => $this->status,
                'categories' => $this->get_controller("projects")->get_categories($project['id'])
            ));
        }
        else $this->error_page("denied");
    }

    function get_categories()
    {
        $categories = $this->get_controller("projects")->get_categories($this->id);
        $res['success'] = $this->layout_get("tasks/get_categories.html",array('categories' => $categories));
        echo json_encode($res);
    }

    function show_edit_task()
    {
        if ($this->id == "show")
        {
            $show_task = true;
            $logs = $this->get_controller("projects","logs")->get_logs("task",false,$this->_0);
        }
        else if ($this->id == "edit") $to_task = true;

        if ($this->_0)
        {
            $access = $this->get_controller("projects", "users")->get_access(false, false, $this->_0);
            if (!$project = $access['project']) $this->error_page();

            if ($access['access']['show_tasks'] || ($access['task']['id_user'] == $_SESSION['user']['id_user'] || $access['task']['assigned'] == $_SESSION['user']['id_user']))
            {
                if (!$access['access']['edit_task'] && !$access['access']['edit_tasks'] && $this->id == "edit") $this->error_page('denied');
                $task = $access['task'];
                if (intval($task['spent_time']) == $task['spent_time']) $task['spent_time'] = (int) $task['spent_time'];

                if ($project['owner']) crumbs("Личные","/projects/all/?filter=my");
                crumbs($project['name'],"/projects/~{$project['id']}");
                crumbs("Задачи","/projects/tasks/{$project['id']}/");
                crumbs($task['name'],"/projects/tasks/show/{$task['id']}/");

                $query = $this->db->prepare("select ft.*,f.*,u.first_name,u.last_name,u.id_user,u.id_group,g.color,g.name as group_name
                    from files_to_tasks as ft
                    LEFT JOIN projects_files as f ON f.id = ft.id_file
                    LEFT JOIN users as u ON f.owner=u.id_user
                    LEFT JOIN groups as g ON u.id_group=g.id
                    where id_task=?");
                $query->execute(array($task['id']));
                $f_ctr = $this->get_controller("projects","files");
                while ($row = $query->fetch())
                {
                    $row['fio'] = build_user_name($row['first_name'],$row['last_name'],true);
                    $row['size'] = $f_ctr->format_file_size($row['size']);
                    $files[] = $row;
                }

                $query = $this->db->prepare("select c.*
                    from projects_tasks_to_categories as tc
                    LEFT JOIN projects_tasks_categories as c ON tc.id_category=c.id
                    where id_task=? order by c.name ASC
                ");
                $query->execute(array($task['id']));
                while ($row = $query->fetch())
                {
                    $task_categories[$row['id']] = $row;;
                }

                if ($this->id == "edit")
                {
                    $users = $this->get_controller("projects","users")->get_users_project($task['id_project']);
                    crumbs("Редактирование");
                    $layout = "tasks/add_task.html";
                    if (!$access['access']['edit_tasks'] && !$access['access']['edit_task']) $this->error_page("denied");
                    $categories = $this->get_controller("projects")->get_categories($task['id_project']);
                }
                else $layout = "tasks/show_task.html";

                if ($this->id == "show")
                {
                    $query = $this->db->prepare("select * from projects_tasks_last_visit where id_task=? and id_user=? LIMIT 1");
                    $query->execute(array($this->_0,$_SESSION['user']['id_user']));
                    $task['subscribe'] = $query->fetch();
                    $last_visit = time();
                    $query = $this->db->prepare("insert into projects_tasks_last_visit (last_visit,id_task,id_user) values (?,?,?) ON DUPLICATE KEY UPDATE last_visit=?");
                    $query->execute(array($last_visit,$this->_0,$_SESSION['user']['id_user'],$last_visit));
                    $task['diff'] = $this->get_date_diff($task['end']);

                    $comments = $this->generate_comments($this->_0);
                }

                $this->set_global('id_project',$project['id']);
                $this->layout_show($layout,array(
                    //'projects' => $this->get_controller("projects")->get_projects($project['id']),
                    'tasks_button' => true,
                    'project' => $project,
                    'task' => $task,
                    'users' => $users,
                    'files' => $files,
                    'show_task' => $show_task,
                    'to_task' => $to_task,
                    'access' => $access['access'],
                    'logs' => $logs['logs'],
                    'comments'=> $comments,
                    'categories' => $categories,
                    'task_categories' => $task_categories,
                    'status' => $this->status,
                ));
            }
            else $this->error_page("denied");
        }
        else $this->error_page();
    }

    function show_tasks()
    {
        $access = $this->get_controller("projects","users")->get_access($this->id);
        if (!$project = $access['project']) $this->error_page();

        if ($project['owner']) crumbs("Личные","/projects/all/?filter=my");
        crumbs($project['name'],"/projects/~{$project['id']}");
        crumbs("Задачи");

        $categories = $this->get_controller("projects")->get_categories($this->id);

        foreach ($this->status as $k => $f)
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
                'selected' => 'all'
            ),
            'status' => array('label' => 'Статус',
                'type' => 'checkbox',
                'options' => $form_status,
                'selected' => array('new','in_progress','rejected'),
                'wrapper' => 'div'
            ),
            'priority' => array('label' => 'Приоритет',
                'type' => 'checkbox',
                'options' => array('1' => 'низкий','2' => 'обычный','3' => 'высокий','4' => 'критический'),
                'wrapper' => 'div'
            ),
            'category' => array('label' => 'Категории',
                'type' => 'multy_select',
                'options' => $categories,
                'selected' => array(intval($_GET['cat'])),

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
            $u_data_cr->save_user_data($_SESSION['user']['id_user'],"project_filter".$this->id,serialize($_POST));
        }
        else if ($user_data = $u_data_cr->get_user_data($_SESSION['user']['id_user'],"project_filter".$this->id))
        {
            $cats_ids = array();
            $filter = unserialize($user_data['data']);

            if ($filter['category'] != "" && count($categories) > 0)
            {
                foreach ($categories as $c => $cat)
                {
                    if (in_array($c,$filter['category']))
                    {
                        $categories_show[$c] = $cat;
                        $cats_ids[] = $c;
                    }
                }
            }

            foreach ($form as $k => &$f)
            {
                if ($filter[$k]) $f['selected'] = $filter[$k];
                else $f['selected'] = false;
            }

            $form['category']['data'] = $categories_show;

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
        $u_cr->id_project = $this->id;
        $u_cr->access = $access['access'];

        $this->set_global('id_project',$project['id']);
        $data = array(
            'project' => $project,
            'tasks_button' => true,
            'access' => $access['access'],
            'all' => true,
            'user_tasks' => $u_cr->default_method(),
        );

        if (!$_POST['act'] == "get_data") $this->layout_show('tasks/tasks.html',$data);
    }

    function get_task($id)
    {
        $query = $this->db->prepare("select t.*,a.first_name as assigned_first_name,a.last_name as assigned_last_name,
                u.first_name as user_first_name,u.last_name as user_last_name,
                g.color,g.name as group_name, gt.color as assigned_color,gt.name as assigned_group_name
                from projects_tasks as t
                LEFT JOIN users as a ON t.assigned = a.id_user
                LEFT JOIN users as u ON t.id_user = u.id_user
                LEFT JOIN groups as g ON u.id_group=g.id
                LEFT JOIN groups as gt ON a.id_group=gt.id
                where t.id=?
            ");
        $query->execute(array($id));
        $task = $query->fetch();
        $task['assigned_name'] = build_user_name($task['assigned_first_name'],$task['assigned_last_name'],true);
        $task['user_name'] = build_user_name($task['user_first_name'],$task['user_last_name'],true);
        return $task;
    }

    function save_task()
    {
        $access = $this->get_controller("projects","users")->get_access($_POST['project'],false,$_POST['id']);
        $project = $access['project'];
        $task = $access['task'];

        if (isset($_POST['name']) && $_POST['name'] == "") $res['error'][] = "Введите название";

        if (isset($_POST['start']))
        {
            if ($_POST['start'] == "") $res['error'][] = "Укажите дату начала";
            elseif (!check_date($_POST['start'])) $res['error'][] = "Укажите правильную дату начала";
            else $_POST['start'] = convert_date($_POST['start'],true);
        }

        if (isset($_POST['end']) && $_POST['end'] != "")
        {
            if (!check_date($_POST['end'])) $res['error'][] = "Укажите правильную дату окончания";
            else
            {
                $_POST['end'] = convert_date($_POST['end'],true);
                if (strtotime($_POST['end']) < strtotime($_POST['start'])) $res['error'][] = "Дата окончания не может быть меньше даты начала";
            }
        }
        else $_POST['end'] = null;

        if (!$res['error'])
        {
            if ($_POST['assigned'] == "") $_POST['assigned'] = null;
            if ($_POST['estimated_time'] == "") $_POST['estimated_time'] = null;

            if ($project['owner']) $_POST['assigned'] = $_SESSION['user']['id_user'];

            $log = $this->get_controller("projects","logs");
            $this->db->beginTransaction();
            if ($_POST['id'])
            {
                if ($access['access']['edit_task'] || $access['access']['edit_tasks'])
                {
                    $text_log = array();
                    if ($task['name'] != $_POST['name'])
                        $text_log[] = lang("log_task_change_name",$_POST['name']);
                    if ($task['status'] != $_POST['status'])
                        $text_log[] = lang("log_task_change_status",array(lang("task_status_".$_POST['status']),lang("task_status_".$task['status'])));
                    if ($task['percent'] != $_POST['percent'])
                        $text_log[] = lang("log_task_change_percent",array($_POST['percent'],$task['percent']));
                    if ($task['priority'] != $_POST['priority'])
                        $text_log[] = lang("log_task_change_priority",array(lang("task_priority_".$_POST['priority']),lang("task_priority_".$task['priority'])));

                    $query = $this->db->prepare("
                        update projects_tasks
                        set name=?,status=?,percent=?,message=?,description=?,priority=?,start=?,end=?,assigned=?,estimated_time=?,updated=?
                        where id=?
                    ");

                    require_once(ROOT.'libraries/simple_html_dom.php');
                    $html = str_get_html($_POST['description']);
                    if ($html)
                    {
                        foreach($html->find('script') as $element)
                        {
                            $element->outertext = (string)$element->innertext;
                        }
                        $_POST['description'] = $html->save();
                    }

                    if ($query->execute(array($_POST['name'],$_POST['status'],$_POST['percent'],$_POST['message'],
                        $_POST['description'],$_POST['priority'],$_POST['start'],$_POST['end'],
                        $_POST['assigned'],$_POST['estimated_time'],time(),$_POST['id']
                    )))
                    {
                        $res['success'] = $_POST['id'];

                        $message_mail = implode(". ",$text_log);
                        array_unshift($text_log,lang("log_task_change","<a href='/projects/tasks/show/{$task['id']}/'>{$task['name']}</a>"));
                        $message = implode(". ",$text_log);
                        $log->set_logs("task",$task['id_project'],$message,"edit",$task['id']);
                    }
                    else $res['error'] = "Ошибка сохранения задачи";

                    $notif = "Задача \"{$_POST['name']}\" в проекте \"{$project['name']}\" была отредактирована";
                    $edit = true;
                }
                else $res['error'] = "У Вас недостаточно прав";
            }
            else
            {
                if ($access['access']['add_task'])
                {
                    $query = $this->db->prepare("
                      insert into projects_tasks(name,status,percent,message,description,priority,start,end,assigned,estimated_time,id_project,id_user,created,updated)
                      values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)
                    ");
                    $time = time();
                    if ($query->execute(array($_POST['name'],$_POST['status'],
                        $_POST['percent'],$_POST['message'],$_POST['description'],
                        $_POST['priority'],$_POST['start'],$_POST['end'],$_POST['assigned'],
                        $_POST['estimated_time'],$_POST['project'],$_SESSION['user']['id_user'],$time,$time
                    )))
                    {
                        $last_id = $this->db->lastInsertId();
                        $res['success'] = $last_id;
                        $log->set_logs("task",$_POST['project'],lang("log_task_create","<a href='/projects/tasks/show/{$last_id}/'>{$_POST['name']}</a>"),"add",$last_id);
                    }
                    else $res['error'] = "Ошибка создания задачи";

                    $notif = "У Вас новая задача \"{$_POST['name']}\" в проекте \"{$project['name']}\"";
                }
                else $res['error'] = "У Вас недостаточно прав";
            }

            if ($access['access']['add_task'] ||
                (($access['access']['edit_task'] || $access['access']['edit_tasks']) && $_POST['id'])
            )
            {
                $query = $this->db->prepare("delete from files_to_tasks where id_task=?");
                if (!$query->execute(array($_POST['id']))) $res['error'] = "Ошибка базы данных";

                if (count($_POST['files']) > 0)
                {
                    $query = $this->db->prepare("insert into files_to_tasks(id_file,id_task) values(?,?)");
                    foreach($_POST['files'] as $k => $v)
                    {
                        if (!$query->execute(array($v,$res['success']))) $res['error'] = "Ошибка базы данных";
                    }
                }

                $query = $this->db->prepare("delete from projects_tasks_to_categories where id_task=?");
                if (!$query->execute(array($_POST['id']))) $res['error'] = "Ошибка базы данных";

                if (count($_POST['category']) > 0)
                {
                    $query = $this->db->prepare("insert into projects_tasks_to_categories(id_category,id_task) values(?,?)");
                    foreach($_POST['category'] as $k => $v)
                    {
                        if (!$query->execute(array($v,$res['success']))) $res['error'] = "Ошибка базы данных";
                    }
                }
            }

            if ($res['error']) $this->db->rollBack();
            else
            {
                $this->db->commit();

                $message = $this->layout_get("tasks/task_mail.html",array(
                    'domain' => get_full_domain_name(SUBDOMAIN),
                    'name' => $project['name'],
                    'task_name' => $_POST['name'],
                    'edit' => $edit,
                    'task' => $res['success'],
                    'message' => $message_mail,
                    'id_project' => $project['id']
                ));

                if ($_POST['assigned'] != "")
                    $this->send_notification($_POST['assigned'],$notif,$message,$email=$_POST['email'],$phone=$_POST['sms']);

                if ($task['assigned'] != "" && $_POST['assigned'] != $task['assigned'])
                    $this->send_notification($task['assigned'],$notif,$message,$email=$_POST['email'],$phone=$_POST['sms']);

                if ($edit) $this->send_notification($task['id_user'],$notif,$message,$email=$_POST['email'],$phone=$_POST['sms']);

            }
        }

        echo json_encode($res);
    }

    function get_forward_tasks()
    {
        if ($task = $this->get_task($_POST['id']))
        {
            if (intval($task['spent_time']) == $task['spent_time']) $task['spent_time'] = (int) $task['spent_time'];
            $res['success'] = $this->layout_get("tasks/forward_task.html",array('task' => $task,'status' => $this->status));
        }
        else $res['error'] = "Задача не найдена";
        echo json_encode($res);
    }

    function forward_tasks()
    {
        $access = $this->get_controller("projects","users")->get_access(false,false,$_POST['id']);
        if ($access['access']['edit_task'] || $access['access']['save_task'] || $access['access']['edit_tasks'])
        {
            if ($task = $access['task'])
            {
                if ($task['status'] == "closed") $res['error'] = "Задача уже закрыта";

                if (!$res['error'])
                {
                    $spent_time = (float) $_POST['spent_time'];

                    if ($task['assigned'] == "") $task['assigned'] = $_SESSION['user']['id_user'];

                    $query = $this->db->prepare("update projects_tasks set status=?,assigned=?,spent_time=spent_time+{$spent_time},percent=?,updated=?,message=? where id=? LIMIT 1");
                    if ($query->execute(array($_POST['status'],$task['assigned'],$_POST['new_current_percent'],time(),$_POST['message'],$_POST['id'])))
                    {
                        $res['success']['project'] = $task['id_project'];
                        $log = $this->get_controller("projects","logs");

                        $text_log = array();
                        if ($task['status'] != $_POST['status'])
                            $text_log[] = lang("log_task_change_status",array(lang("task_status_".$_POST['status']),lang("task_status_".$task['status'])));
                        if ($task['percent'] != $_POST['new_current_percent'])
                            $text_log[] = lang("log_task_change_percent",array($_POST['new_current_percent'],$task['percent']));

                        $message_mail = implode(". ",$text_log);
                        array_unshift($text_log,lang("log_task_change","<a href='/projects/tasks/show/{$task['id']}/'>{$task['name']}</a>"));
                        $message = implode(". ",$text_log);
                        $log->set_logs("task",$task['id_project'],$message,"edit",$task['id']);

                        $message = $this->layout_get("tasks/task_mail.html",array(
                            'domain' => get_full_domain_name(SUBDOMAIN),
                            'name' => $access['project']['name'],
                            'edit' => true,
                            'task' => $task['id'],
                            'task_name' => $task['name'],
                            'message' => $message_mail,
                            'id_project' => $access['project']['id']
                        ));

                        $notif = "В задаче \"{$task['name']}\" в проекте \"{$access['project']['name']}\" изменена готовность";

                        $this->send_notification($task['assigned'],$notif,$message,$email=$_POST['email'],$phone=$_POST['sms']);
                        $this->send_notification($task['id_user'],$notif,$message,$email=$_POST['email'],$phone=$_POST['sms']);
                    }
                    else $res['error'] = "Ошибка базы данных";
                }
            }
            else $res['error'] = "Задача не найдена";
        }
        else $res['error'] = "У Вас недостаточно прав";

        echo json_encode($res);
    }

    function add_file_to_task()
    {
        $access = $this->get_controller("projects","users")->get_access($_POST['project']);
        if ($_POST['files'])
        {
            foreach ($_POST['files'] as &$v) $v = (int) $v;
            $ids = implode(",",$_POST['files']);
            $excluded = " and p.id NOT IN (".$ids.")";
        }

        $limit = 10;

        $where = array();
        if (isset($_POST['search']) && $_POST['search'] != '')
        {
            $search = explode(" ",$_POST['search']);
            foreach ($search as $s)
            {
                $s = $this->db->quote("%{$s}%");
                $search_ar[] = "p.name LIKE ".$s;
            }
            $where[] = "(".implode("OR ",$search_ar).")";
        }
        if (!$access['access']['show_files']) $where[] = "p.owner=".$_SESSION['user']['id_user'];

        if (count($where) > 0) $where_text = "AND ".implode(" AND ",$where);

        $total = $this->db->num_rows("projects_files as p where id_project=".$this->db->quote($_POST['project'])." {$excluded} {$where_text}");

        require_once(ROOT.'libraries/paginator/paginator.php');
        $paginator = new \Paginator($total, $_POST['page'], $limit);
        if ($paginator->pages < $_POST['page']) $paginator = new \Paginator($total, $paginator->pages, $limit);

        $query = $this->db->prepare("select p.*,u.first_name,u.last_name,g.color,g.name as group_name
                from projects_files as p
                LEFT JOIN users as u ON p.owner=u.id_user
                LEFT JOIN groups as g ON u.id_group=g.id
                where p.id_project=? {$excluded} {$where_text}
                order by p.created DESC
                LIMIT {$limit}
                OFFSET {$paginator->get_range('from')}
        ");
        $query->execute(array($_POST['project']));
        $f_ctr = $this->get_controller("projects","files");
        while ($row = $query->fetch())
        {
            $row['fio'] = build_user_name($row['first_name'],$row['last_name'],true);
            $row['size'] = $f_ctr->format_file_size($row['size']);
            $files[] = $row;
        }

        $data = array(
            'files' => $files,
            'paginator' => $paginator,
            'get_popup_files' => true,
        );

        $res['success'] = $this->layout_get('files/popup_files.html',$data);
        echo json_encode($res);
    }

    function add_files()
    {
        if ($_POST['files'])
        {
            foreach ($_POST['files'] as &$v) $v = (int) $v;
            $ids = implode(",",$_POST['files']);
            $query = $this->db->query("select p.*,u.first_name,u.last_name,g.color,g.name as group_name
                from projects_files as p
                LEFT JOIN users as u ON p.owner=u.id_user
                LEFT JOIN groups as g ON u.id_group=g.id
                where p.id IN(".$ids.")
            ");
            $res['success'] = "";
            $f_ctr = $this->get_controller("projects","files");
            while ($row = $query->fetch())
            {
                $row['fio'] = build_user_name($row['first_name'],$row['last_name'],true);
                $row['size'] = $f_ctr->format_file_size($row['size']);
                $res['success'] .= $this->layout_get("files/file.html",array('file' => $row,'to_task' => true));
            }
        }
        else $res['error'] = "Ничего не выбрано";

        echo json_encode($res);
    }

    function delete_task()
    {
        $access = $this->get_controller("projects","users")->get_access(false,false,$_POST['id']);
        $task = $access['task'];
        $log = $this->get_controller("projects","logs");

        if ($access['access']['delete_tasks'])
        {
            $query = $this->db->prepare("delete from projects_tasks where id=?");
            if ($query->execute(array($_POST['id'])))
            {
                $res['success']['project'] = $task['id_project'];
                $log->set_logs("task",$access['project']['id'],$task['name'],"delete");

                $message = $this->layout_get("tasks/task_mail.html",array(
                    'domain' => get_full_domain_name(SUBDOMAIN),
                    'name' => $access['project']['name'],
                    'delete' => true,
                    'task_name' => $task['name'],
                    'id_project' => $access['project']['id']
                ));

                $notif = "Удалена задача \"{$task['name']}\" в проекте \"{$access['project']['name']}\"";

                $this->send_notification($task['assigned'],$notif,$message,true,false);
                $this->send_notification($task['id_user'],$notif,$message,true,false);
            }
            else $res['error'] = "Ошибка базы данных";
        }
        else $res['error'] = "У Вас недостаточно прав";

        echo json_encode($res);
    }

    function send_notification($id,$text,$full_text,$email=false,$phone=false)
    {
        if ($id && $id != $_SESSION['user']['id_user'])
        {
            if ($phone && get_setting("send_sms"))
            {
                $query = $this->db->prepare("select * from profile as pr
                            LEFT JOIN userprofiles as up ON pr.id = up.idprof
                            WHERE pr.name='mphone' and up.iduser=?
                        ");
                $query->execute(array($id));
                $phone = $query->fetch();
                $phone_value = str_replace(array(" ","+","-"),"",$phone['value']);
                $login = get_setting('fastsms_login');
                $password = get_setting('fastsms_password');
                $sender = get_setting('fastsms_sender');
                if ($phone_value !="") file_get_contents("http://api.fastsms.pro/send.php?username={$login}&password={$password}&sender={$sender}&numbers={$phone_value}&message=".urlencode($text));
            }

            if ($email)
            {
                $query = $this->db->prepare("select email from users where id_user=?");
                $query->execute(array($id));
                $email_value = $query->fetch();
                send_mail(get_setting('email'), $email_value['email'], $text, $full_text, get_setting('site_name'));
            }
        }
    }

    function get_delayed_tasks()
    {
        $now = date("Y-m-d");
        $query = $this->db->prepare("select pt.name,pt.end,pt.id_project,pt.id,p.name as project_name
            from projects_tasks as pt
            LEFT JOIN projects as p ON pt.id_project = p.id
            where assigned=? and end < ? and status IN ('new','in_progress')
        ");
        $query->execute(array($_SESSION['user']['id_user'],$now));
        return $query->fetchAll();
    }

    function get_delayed_manager_tasks()
    {
        $now = date("Y-m-d");
        $query = $this->db->prepare("select pt.name,pt.end,pt.id_project,pt.id,p.name as project_name,u.first_name,u.last_name,pt.assigned
            from projects_tasks as pt
            LEFT JOIN projects as p ON pt.id_project = p.id
            LEFT JOIN users as u ON pt.assigned = u.id_user
            where p.id IN( SELECT id_project from projects_users where id_user=? and role='manager') and end < ? and status IN ('new','in_progress')
        ");
        $query->execute(array($_SESSION['user']['id_user'],$now));
        while ($row = $query->fetch())
        {
            $row['fio'] = build_user_name($row['first_name'],$row['last_name'],true);
            $tasks[] = $row;
        }
        return $tasks;
    }

    function get_count_project()
    {
        return $this->db->num_rows("projects_users where id_user='{$_SESSION['user']['id_user']}'");
    }

    function get_count_personal_tasks()
    {
        return $this->db->num_rows("projects_tasks as pt
            LEFT JOIN projects as p ON pt.id_project = p.id
            where pt.assigned='{$_SESSION['user']['id_user']}' and pt.status IN ('new','in_progress','rejected')","pt.id
        ");
    }

    function get_manager_stats()
    {
        $query = $this->db->prepare("select pt.status
            from projects_users as pu
            LEFT JOIN projects_tasks as pt ON pt.id_project = pu.id_project
            where pu.id_user=? and (pu.role='manager' or (pu.role='user' and (pt.assigned IS NULL OR pt.id_user=?))) and pt.id IS NOT NULL
        ");
        $query->execute(array($_SESSION['user']['id_user'],$_SESSION['user']['id_user']));

        $stats = array();
        while ($row = $query->fetch())
        {
            $stats[$row['status']]++;
        }

        return $stats;
    }

    function get_stats($id_project)
    {
        $query = $this->db->prepare("select distinct t.id,t.status,GROUP_CONCAT(c.id_category SEPARATOR ',') as cats
            from projects_tasks as t
            LEFT JOIN projects_tasks_to_categories as c ON c.id_task = t.id
            where id_project=?
            group by t.id
        ");
        $query->execute(array($id_project));

        $stats = array();
        while ($row = $query->fetch())
        {
            $stats[$row['status']]++;
            $stats['all']++;

            if ($row['status'] != "closed" && $row['status'] != "rejected" && $row['cats'] != "")
            {
                $cats = explode(",",$row['cats']);
                foreach ($cats as $c)
                {
                    $stats['cats'][$c]++;
                }
            }
        }
        return $stats;
    }

    function get_users_stats($id_project)
    {
        $query = $this->db->prepare("select status,assigned from projects_tasks
            where id_project=? and assigned IS NOT NULL
        ");
        $query->execute(array($id_project));

        $stats = array();
        while ($row = $query->fetch())
        {
            $stats[$row['assigned']][$row['status']]++;
            $stats[$row['assigned']]['all']++;
        }

        return $stats;
    }

    function add_comment()
    {
        $access = $this->get_controller("projects","users")->get_access(false,false,$_POST['id']);
        if (!$access['access']['show_tasks'])
        {
            if ($access['task']['id_user'] != $_SESSION['user']['id_user'] && $access['task']['assigned'] != $_SESSION['user']['id_user']) $res['error'] = "У Вас недостаточно прав";
        }

        $parent = intval($_POST['parent']);
        if ($parent < 1) $parent = null;
        $comment = trim($_POST['comment']);
        $created = time();
//        $created_test = $created-$this->time_limit;

    //    if ($access['task']['status'] == "closed") $res['error'] = "Закрытые задачи нельзя комментировать";
        if ($comment == "") $res['error'] = "Комментарий не может быть пустым";
//        if ($_SESSION['last_comment'] > $created_test && $_SESSION['user']['id_group'] != 1) $res['error'] = "Комментарий можно добавлять каждые {$this->time_limit} секунд";

        if ($parent)
        {
            $query = $this->db->prepare("select id from projects_tasks_comments where id=?");
            $query->execute(array($parent));
            if (!$query->fetch()) $res['error'] = "Комментарий выше был удален";
        }

        if (!$res['error'])
        {
            $query = $this->db->prepare("insert into projects_tasks_comments(text,parent_id,id_task,id_user,created) values(?,?,?,?,?)");
            if ($query->execute(array($comment,$parent,$_POST['id'],$_SESSION['user']['id_user'],$created)))
            {
                $insert_id = $this->db->lastInsertId();

                $log = $this->get_controller("projects","logs");
                $log->set_logs("comment",$access['project']['id'],"К задаче <a href='/projects/tasks/show/{$access['task']['id']}/#comment_{$insert_id}'>{$access['task']['name']}</a>","add");

                $_SESSION['last_comment'] = $created;
                $query = $this->db->prepare("select c.*,u.gender,u.first_name,u.last_name,u.avatar,u.id_group,gr.name as group_name,gr.color as group_color
                    from projects_tasks_comments as c
                    LEFT JOIN users as u ON u.id_user=c.id_user
                    LEFT JOIN groups as gr ON gr.id=u.id_group where c.id = ? LIMIT 1
                ");
                $query->execute(array($insert_id));
                $com = $query->fetch();
                $com['fio'] = build_user_name($com['first_name'],$com['last_name']);

                $last_visit = strtotime("now");
                $query = $this->db->prepare("insert into projects_tasks_last_visit(id_user,id_task,last_visit) values(?,?,?) ON DUPLICATE KEY UPDATE last_visit=?");
                $query->execute(array($_SESSION['user']['id_user'],$_POST['id'],$last_visit,$last_visit));

                $res['success'] = $this->layout_get('tasks/comment.html',array('com' => $com,'ajax' => true));
            }
            else $res['error'] = "Ошибка базы данных";
        }

        echo json_encode($res);
    }

    function delete_comment()
    {
        $access = $this->get_controller("projects","users")->get_access(false,false,$_POST['id_task']);

        $id = intval($_POST['id']);
        $query = $this->db->prepare("select id_task
            from projects_tasks_comments as co
            where id=? LIMIT 1");
        $query->execute(array($id));

        if ($comment = $query->fetch())
        {
            $data = $this->get_controller("users","access")->get_access("article",$comment['id_article']);
            if (!$data['access']['delete_comment']) $res['error'] = "У Вас недостаточно прав";
            else
            {
                if (!$this->db->query("delete from comments_to_articles where id=".$this->db->quote($id)." LIMIT 1")) $res['error'] = "Ошибка базы данных";
                else $res['success'] = true;
            }
        }

        echo json_encode($res);
    }

    function generate_comments($id)
    {
        $comments = array();
        $query = $this->db->prepare("SELECT c.*,u.gender,u.first_name,u.last_name,u.avatar,u.id_group,gr.name as group_name,gr.color as group_color
                from projects_tasks_comments as c
                LEFT JOIN users as u ON u.id_user=c.id_user
                LEFT JOIN groups as gr ON gr.id=u.id_group
                where c.id_task=?
                order by c.id ASC
        ");
        $query->execute(array($id));

        while ($row = $query->fetch())
        {
            $row['fio'] = build_user_name($row['first_name'],$row['last_name']);
            $comments[$row['id']] = $row;
        }
        if($comments) $res = $this->generate_comments_foreach($comments);

        return $res;
    }

    function generate_comments_foreach(array $listIdParent)
    {
        $to_delete = array();
        foreach ($listIdParent as $id => $node)
        {
            if ($node['parent_id'])
            {
                $listIdParent[$node['parent_id']]['category'][$id] = &$listIdParent[$id];
                $to_delete[] = $id;
            }
        }

        $final = $listIdParent;

        foreach ($to_delete as $v) unset($final[$v]);
        return $final;
    }

    function get_count_new_comments(array $ids)
    {
        if (count($ids) > 0)
        {
            $query = $this->db->prepare("SELECT count(c.id) as count,c.id_task
                FROM projects_tasks_comments as c
                LEFT JOIN projects_tasks_last_visit as ls ON c.id_task=ls.id_task and ls.id_user=?
                WHERE ((c.created > ls.last_visit ) or ls.id_user IS NULL) and c.id_task IN (".implode(",",$ids).") and c.id_user !=?
                group by c.id_task
            ");
            $query->execute(array($_SESSION['user']['id_user'],$_SESSION['user']['id_user']));
            while($row = $query->fetch())
            {
                $co[$row['id_task']] = $row;
            }
            return $co;
        }
    }

    function get_count_new_comments_mail($last_action)
    {
        $last_action = (int) $last_action;
        $year = date("Y");
        $month = date("m");
        $day = date("d");

        $query = $this->db->query("select id_user,email,first_name,last_name from users");

        if ($users = $query->fetchAll())
        {
            foreach ($users as $u)
            {
                if ($info = $this->get_controller("projects","calendar")->get_calendar_tasks("{$year}-{$month}-{$day}",$u['id_user'])) $tasks = $info['tasks'];

                if ($tasks)
                {
                    $ids = array_keys($tasks);
                    $query_c = $this->db->prepare("SELECT count(c.id) as count,c.id_task,t.name,company.name as subdomain
                        FROM projects_tasks_comments as c
                        LEFT JOIN projects_tasks_last_visit as ls ON c.id_task=ls.id_task and ls.id_user=?
                        LEFT JOIN projects_tasks as t ON c.id_task=t.id
                        LEFT JOIN projects as p ON t.id_project=p.id
                        LEFT JOIN company as company ON p.id_company=company.id
                        WHERE (c.created > IF(ls.last_visit > {$last_action}, ls.last_visit, {$last_action})) and c.id_task IN (".implode(",",$ids).") and c.id_user !=?
                        group by c.id_task
                    ");
                    $query_c->execute(array($u['id_user'],$u['id_user']));
                    while($row = $query_c->fetch())
                    {
                        $co[$u['id_user']]['email'] = $u['email'];
                        $co[$u['id_user']]['fio'] = build_user_name($u['first_name'],$u['last_name']);
                        $co[$u['id_user']]['tasks'][$row['id_task']] = $row;
                    }
                }
            }
            return $co;
        }
    }

    function new_comments_to_mail()
    {
        $query = $this->db->query("select * from tasks where controller='new_comments'");
        $task = $query->fetch();

        if ($new_comments = $this->get_count_new_comments_mail($task['completed']))
        {
            $from = get_setting('email');
            foreach($new_comments as $n)
            {
                $html = $this->layout_get("tasks/comments_mail.html",array('new_comments' => $n));
                if (!send_mail($from, $n['email'], "Новые комментарии в задачах", $html, get_setting('site_name'))) echo "error {$n['email']}\n\r";
            }
        }
    }

    function get_date_diff($end)
    {
        if ($end != "")
        {
            $datetime1 = date_create(date("Y-m-d"));
            $datetime2 = date_create($end);
            $interval = date_diff($datetime1, $datetime2);
            $diff = str_replace("+","",$interval->format('%R%a'));
        }
        else $diff = "inf";

        return $diff;
    }
}