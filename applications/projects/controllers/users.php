<?php
namespace projects;

class users extends \Controller {

    private $limit = 15;
    
    function default_method()
    {
        switch($_POST['act'])
        {
            case "save_user":
                $this->save_user();
                break;
            case "search_user":
                $this->search_user();
                break;
            case "delete_user":
                $this->delete_user();
                break;
            case "delete_user_form":
                $this->delete_user_form();
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
            case "edit":
                $this->add_edit_users();
                break;
            default:
                $this->show_users();
        }
    }

    function add_edit_users()
    {
        $id_project = $this->_0;
        if ($this->id == "add") $add_users_button = true;
        else
        {
            if ($user = $this->get_user_and_role($this->_0,$this->_1)) $users_button =  true;
            else $this->error_page();
        }

        $access = $this->get_access($id_project);
        if ($access['access']['users'] && !$access['project']['owner'] && $access['access']['show_users'])
        {
            $project = $access['project'];

            crumbs($project['name'],"/projects/~{$project['id']}/");
            crumbs("Участники","/projects/users/{$project['id']}");
            if ($user)
            {
                crumbs($user['fio'],"/users/~{$user['id_user']}/");
                crumbs("Редактирование участника");

                $query = $this->db->prepare("select * from projects_rights_users where id_project=? and id_user=?");
                $query->execute(array($project['id'],$user['id_user']));
                while ($row = $query->fetch())
                {
                    $have_rights[] = $row['id_right'];
                }
            }
            else
            {
                crumbs("Добавление участника");

                $query = $this->db->prepare("select id_user,first_name,last_name
                    from users as u
                    where id_user NOT IN (select id_user from projects_users where id_project=?) and id_user IN (select id_user from company_users where id_company=?)
                ");
                $query->execute(array($this->_0,$_SESSION['user']['current_company']));
                while ($row = $query->fetch())
                {
                    $row['fio'] = build_user_name($row['first_name'],$row['last_name']);
                    $users[] = $row;
                }
            }

            $rights = $this->get_rigts(true);

            $this->set_global('id_project',$project['id']);
            $this->layout_show('users/add_user.html',array(
                //'projects' => $this->get_controller("projects")->get_projects($project['id']),
                'add_users_button' => $add_users_button,
                'project' => $project,
                'access' => $access['access'],
                'user' => $user,
                'users' => $users,
                'users_button' => $users_button,
                'mode' => $this->id,
                'rights' => $rights,
                'have_rights' => $have_rights
            ));
        }
        else $this->error_page("denied");
    }

    function get_rigts($group=false)
    {
        $query = $this->db->query("select pr.*,pg.name as group_name
                from projects_access_rights as pr
                LEFT JOIN projects_access_groups as pg ON pr.id_access_group=pg.id
                order by pr.id_access_group ASC,pr.name ASC
            ");
        while ($row = $query->fetch())
        {
            if ($group)
            {
                $rights[$row['id_access_group']]['name'] = $row['group_name'];
                $rights[$row['id_access_group']]['rights'][] = $row;
            }
            else
            {
                $rights[$row['id']] = $row;
            }
        }

        return $rights;
    }

    function show_users()
    {
        $access = $this->get_access($this->id);
        if (!$project = $access['project']) $this->error_page();

        if ($access['access']['show_users'])
        {
            $where[] = "pu.id_project=".$this->db->quote($this->id);
            if (isset($_POST['search']) && $_POST['search'] != '')
            {
                $search = str_replace(" ","%",$_POST['search']);
                $s = $this->db->quote("%{$search}%");
                $where[] = "(u.first_name LIKE {$s} OR u.last_name LIKE {$s})";
            }
            if (count($where) > 0) $where = "WHERE ".implode(" AND ",$where);

            $total = $this->db->num_rows("projects_users as pu LEFT JOIN users as u ON pu.id_user=u.id_user {$where}");

            require_once(ROOT.'libraries/paginator/paginator.php');
            $paginator = new \Paginator($total, $_POST['page'], $this->limit);
            if ($paginator->pages < $_POST['page']) $paginator = new \Paginator($total, $paginator->pages, $this->limit);

            $query = $this->db->prepare("select u.*,g.color,g.name as group_name,pu.role,
                u.last_user_action,pu.description,
                GROUP_CONCAT(r.id_right order by rg.id_access_group SEPARATOR ',') as rights
                from projects_users as pu
                LEFT JOIN users as u ON pu.id_user=u.id_user
                LEFT JOIN groups as g ON u.id_group=g.id
                LEFT JOIN projects_rights_users as r ON r.id_user=u.id_user and r.id_project = pu.id_project
                LEFT JOIN projects_access_rights as rg ON r.id_right = rg.id
                {$where}
                group by u.id_user
                order by last_name ASC
                LIMIT {$this->limit}
                OFFSET {$paginator->get_range('from')}
            ");
            $query->execute();
            while ($row = $query->fetch()) {
                $ids[] = $row['id_user'];
                $row['fio'] = build_user_name($row['first_name'],$row['last_name']);
                $row['rights'] = explode(",",$row['rights']);
                $users[$row['id_user']] = $row;
            }

            if ($ids)
            {
                $ids = implode(",",$ids);
                $p2 = $this->db->query("select up.iduser,up.value, pr.name, pr.alias FROM userprofiles as up LEFT JOIN profile as pr ON up.idprof=pr.id WHERE up.iduser IN ({$ids}) AND pr.name IN ('skypename', 'mphone')");
                while ($row = $p2->fetch()) {
                    $users[$row['iduser']][$row['name']]=$row['value'];
                }
            }

            crumbs($project['name'],"/projects/~{$project['id']}");
            crumbs("Участники");

            $this->set_global('id_project',$project['id']);
            $data = array(
                //'projects' => $this->get_controller("projects")->get_projects($project['id']),
                'users_button' => true,
                'project' => $project,
                'users' => $users,
                'access' => $access['access'],
                'paginator' => $paginator,
                'stats' => $this->get_controller("projects","tasks")->get_users_stats($project['id']),
                'rights' => $this->get_rigts()
            );

            if ($_POST)
            {
                $res['success'] = $this->layout_get("users/users_table.html",$data);
                echo json_encode($res);
            }
            else $this->layout_show('users/users.html',$data);
        }
        else $this->error_page('denied');
    }

    function get_user_and_role($id_project,$id_user)
    {
        $query = $this->db->prepare("select pu.role,u.first_name,u.last_name,pu.id_user,pu.description
            from projects_users as pu
            LEFT JOIN users as u ON pu.id_user=u.id_user
            where pu.id_project=? and pu.id_user=?
        ");
        $query->execute(array($id_project,$id_user));
        $user = $query->fetch();
        $user['fio'] = build_user_name($user['first_name'],$user['last_name']);
        return $user;
    }

    function search_user()
    {
        $res['success'] = array();
        $_POST['search'] = str_replace(" ","%",$_POST['search']);
        $search = "%{$_POST['search']}%";
        $query = $this->db->prepare("select id_user,first_name,last_name
            from users
            where (last_name LIKE ? OR first_name LIKE ?) and id_user NOT IN (select id_user from projects_users where id_project=?)
        ");
        $query->execute(array($search,$search,$_POST['id_project']));
        while ($row = $query->fetch())
        {
            $row['fio'] = build_user_name($row['first_name'],$row['last_name']);
            $res['success']['options'] .= "<option value='{$row['id_user']}'>{$row['fio']}</option>";
        }

        if ($res['success']['options'] == "")
        {
            $res['success']['options'] = "<option>Ничего не найдено</option>";
            $res['success']['not_found'] = true;
        }

        echo json_encode($res);
    }

    function save_user()
    {
        $access = $this->get_access($_POST['project']);

        $this->db->beginTransaction();

        if ($_POST['id'] == "" && $_POST['new_user'] == "") $res['error'] = "Выберите участника";
        if ($_POST['role'] == "") $res['error'] = "Укажите роль в проекте";
        $c_cr = $this->get_controller("company");
        if (!$c_cr->user_in_company($_POST['id'],$_SESSION['current_company'])) $res['error'] = "В компании нет такого участника";
        if (!$res['error'])
        {
            if ($access['access']['users'] && !$access['project']['owner'])
            {

                if ($_POST['id'])
                {
                    $role = $this->get_role($_POST['project'],$_POST['id']);
                    if ($_SESSION['user']['role_company'] != "admin" && ($role == "manager" || $_POST['role'] == "manager")) $res['error'] = "Только администратор может снимать и назначать менеджеров";
                    else
                    {
                        $query = $this->db->prepare("update projects_users set role=?,description=? where id_user=? and id_project=? LIMIT 1");
                        if (!$query->execute(array($_POST['role'],$_POST['description'],$_POST['id'],$_POST['project']))) $res['error'] = "Ошибка сохранения участника";
                        else $id_user = $_POST['id'];

                        $query = $this->db->prepare("delete from projects_rights_users where id_project=? and id_user=?");
                        if (!$query->execute(array($_POST['project'],$_POST['id']))) $res['error'] = "Ошибка сохранения прав";
                    }
                }
                else
                {
                    if ($_SESSION['user']['role_company'] != "admin" && $_POST['role'] == "manager") $res['error'] = "Только администратор может снимать и назначать менеджеров";
                    else
                    {
                        $query = $this->db->prepare("insert into projects_users(id_user,id_project,role,description) values(?,?,?,?)");
                        if (!$query->execute(array($_POST['new_user'],$_POST['project'],$_POST['role'],$_POST['description']))) $res['error'] = "Ошибка добавления участника";
                        else $id_user = $_POST['new_user'];
                    }
                }
            }
            else $res['error'] = "У Вас недостаточно прав";
        }

        if (!$res['error'] && count($_POST['rights']) > 0)
        {
            $query = $this->db->prepare("insert into projects_rights_users(id_project, id_user, id_right, value) values(?,?,?,?)");
            foreach ($_POST['rights'] as $k => $r)
            {
                if (!$query->execute(array($_POST['project'],$id_user,$k,$r)))
                {
                    $res['error'] = "Ошибка сохранения прав";
                    break;
                }
            }
        }

        if (!$res['error'])
        {
            $log = $this->get_controller("projects","logs");
            $u_ct = $this->get_controller("users","users");
            $user = $u_ct->get_user($id_user);
            $user_name = build_user_name($user['first_name'],$user['last_name']);
            if ($_POST['id'])
            {
                $log->set_logs("project",$_POST['project'],"Отредактирован участник <a href='/users/{$id_user}'>{$user_name}</a>","edit");
            }
            else
            {
                $log->set_logs("project",$_POST['project'],"Добавлен участник <a href='/users/{$id_user}'>{$user_name}</a>","add");
            }
            $this->db->commit();
            $res['success'] = $_POST['project'];
        }
        else $this->db->rollBack();

        echo json_encode($res);
    }

    function delete_user()
    {
        $access = $this->get_access($_POST['id_project']);

        $this->db->beginTransaction();

        if ($access['access']['users'] && !$access['project']['owner'] && $access['access']['show_users'])
        {
            $role = $this->get_role($_POST['id_project'],$_POST['id_user']);
            if ($_SESSION['user']['role_company'] != "admin" && $role == "manager") $res['error'] = "Только администратор может снимать и назначать менеджеров";
            else
            {
                $query = $this->db->prepare("delete from projects_users where id_user=? and id_project=? LIMIT 1");
                if (!$query->execute(array($_POST['id_user'],$_POST['id_project']))) $res['error'] = "Ошибка базы данных";

                if ($_POST['delegate'] == "none") $_POST['delegate'] = null;
                $query = $this->db->prepare("update projects_tasks set assigned=? where assigned=? and id_project=?");
                if (!$query->execute(array($_POST['delegate'],$_POST['id_user'],$_POST['id_project']))) $res['error'] = "Ошибка базы данных22";
            }
        }
        else $res['error'] = "У Вас недостаточно прав";

        if (!$res['error'])
        {
            $log = $this->get_controller("projects","logs");
            $u_ct = $this->get_controller("users","users");
            $user = $u_ct->get_user($_POST['id_user']);
            $user_name = build_user_name($user['first_name'],$user['last_name']);

            $this->db->commit();
            $res['success'] = true;
            $log->set_logs("project",$_POST['id_project'],"Удален участник <a href='/users/{$_POST['id_user']}'>{$user_name}</a>","edit");
        }
        else $this->db->rollBack();

        echo json_encode($res);
    }

    function delete_user_form()
    {
        $query = $this->db->prepare("select u.id_user,u.first_name,u.last_name
            from projects_users as pu
            LEFT JOIN users as u ON u.id_user = pu.id_user
            where pu.id_project=? and pu.id_user !=?
        ");
        $query->execute(array($_POST['id_project'],$_POST['id_user']));
        while ($row = $query->fetch())
        {
            $row['fio'] = build_user_name($row['first_name'],$row['last_name']);
            $users[] = $row;
        }

        $res['success'] = $this->layout_get("users/delete_user_form.html",array('users' => $users));
        echo json_encode($res);
    }

    function get_role($project,$user=false)
    {
        if (!$user) $user = $_SESSION['user']['id_user'];

        $query = $this->db->prepare("select * from projects_users where id_project=? and id_user=?");
        $query->execute(array($project,$user));
        $user = $query->fetch();
        return $user['role'];
    }

    function get_access($id_project=false,$id_user=false,$id_task=false,$global=false)
    {
        $accesses = array(
            'add_project' => false,
            'add_own_project' => true,
            'delete_project' => false,

            'save_task' => false,
            'edit_task' => false
        );

        if (!$global)
        {
            if (!$id_user)
            {
                $id_user = $_SESSION['user']['id_user'];
                $u_cr = $this->get_controller("users");
                $u_info = $u_cr->get_user($id_user);
                $group = $u_info['id_group'];
            }
            else $group = $_SESSION['user']['id_group'];
        }
        else $group = $global;

        if ($id_task)
        {
            $t_cr = $this->get_controller("projects","tasks");
            if ($task = $t_cr->get_task($id_task))
            {
                if ($id_user == $task['assigned'] || $task['assigned'] == "") $accesses['save_task'] = true;
                if ($task['id_user'] == $id_user)
                {
                    $accesses['edit_task'] = true;
                    $types_tasks[] = $task['type'];
                }
                if (!$id_project) $id_project = $task['id_project'];
            }
        }

        if ($_SESSION['user']['role_company'] == "admin") foreach ($accesses as &$a) $a = true;

        if ($id_project)
        {
            if ($role = $this->get_role($id_project,$id_user)) $accesses['role'] = $role;
            else if ($_SESSION['user']['role_company'] != "admin") $this->error_page("denied");

            $project = $this->get_controller("projects")->get_project($id_project);
            if ($accesses['role'])
            {
                set_company($project['id_company']);
            }

            if ($project['owner'] && $project['owner'] != $id_user)
            {
                foreach ($accesses as &$a) $a = false;
                $this->error_page("denied");
            }
            else if ($project['owner']) $accesses['delete_project'] = true;

            if ($role == "manager" || $_SESSION['user']['role_company'] == "admin")
            {
                $query = $this->db->query("select * from projects_access_rights");
                while ($row = $query->fetch()) $accesses[$row['alias']] = true;
            }
            else
            {
                $query = $this->db->prepare("select pa.alias
                    from projects_rights_users as pr
                    LEFT JOIN projects_access_rights as pa ON pr.id_right=pa.id
                    where id_project=? and id_user=?
                ");
                $query->execute(array($project['id'],$id_user));
                while ($row = $query->fetch())
                {
                    $accesses[$row['alias']] = true;
                }
            }
        }
        return array('access' => $accesses,'project' => $project,'task' => $task,'role' => $role);
    }

    function is_manager($project,$user=false)
    {
        if (!$user) $user = $_SESSION['user']['id_user'];

        $query = $this->db->prepare("select * from projects_users where id_project=? and id_user=?");
        $query->execute(array($project,$user));
        $user = $query->fetch();
        if ($user['role'] == "manager") return true;
    }

    function get_users_project($project,$without_me=false)
    {
        if ($without_me) $without_me_string = " and u.id_user != ?";
        $query = $this->db->prepare("select distinct u.id_user,u.first_name,u.last_name
            from users as u
            LEFT JOIN projects_users as pu ON pu.id_user = u.id_user
            where pu.id_project=? {$without_me_string}
            order by u.id_user
        ");
        $data = array($project);
        if ($without_me) $data[] = $_SESSION['user']['id_user'];

        $query->execute($data);
        while ($row = $query->fetch())
        {
            $row['fio'] = build_user_name($row['first_name'],$row['last_name']);
            $users[] = $row;
        }
        return $users;
    }

    function get_users_count($id_project)
    {
        return $this->db->num_rows("projects_users where id_project={$this->db->quote($id_project)}");
    }
}