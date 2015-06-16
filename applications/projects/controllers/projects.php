<?php
namespace projects;

class projects extends \Controller {

    private $project_panel_limit = 15;
    private $limit = 30;
    
    function default_method()
    {
        switch($_POST['act'])
        {
            case "get_delete_project":
                $this->get_delete_project();
                break;
            case "delete_project":
                $this->delete_project();
                break;
            case "get_panel_page_projects":
                $this->get_projects();
                break;
            case "get_projects":
                $this->get_projects();
                break;
            default:
                $this->default_for_this();
        }
    }

    function default_for_this()
    {
        if (!$this->id)
        {
            crumbs("Все проекты");
            $access = $this->get_controller("projects","users")->get_access();

            //  $where[] = "u.id_user='{$_SESSION['user']['id_user']}'";
            //else $where[] = "(p.owner='{$_SESSION['user']['id_user']}' OR p.owner IS NULL)";

            if (isset($_POST['search']) && $_POST['search'] != '')
            {
                $search = explode(" ",$_POST['search']);
                foreach ($search as $s)
                {
                    $s = $this->db->quote("%{$s}%");
                    $search_ar[] = "p.name LIKE ".$s;
                }
                $where[] = "(".implode(" OR ",$search_ar).")";
            }

            if ($_POST['my'] != "")
            {
                $my = array();
                foreach ($_POST['my'] as $v)
                {
                    if ($v == "1") $my[] = "p.owner=".$_SESSION['user']['id_user'];
                    if ($v == "2") $my[] = "p.owner IS NULL";
                }
                $where[] = "(".implode(" OR ",$my).")";
            }
            else if ($_GET['filter'] == "my") $where[] = "p.owner=".$_SESSION['user']['id_user'];
            else $where[] = "(p.owner=".$_SESSION['user']['id_user']." OR p.owner IS NULL)";

            if ($_POST['in'] != "")
            {
                $in = array();
                foreach ($_POST['in'] as $v)
                {
                    if ($v == "1") $in[] = "u.id_user='{$_SESSION['user']['id_user']}'";
                    if ($v == "2") $in[] = "u.id_user IS NULL";
                }
                $where[] = "(".implode("OR ",$in).")";
            }
            else $where[] = "u.id_user='{$_SESSION['user']['id_user']}'";

            if ($_POST['archive'] != "")
            {
                $archive = array();
                foreach ($_POST['archive'] as $v)
                {
                    if ($v == "1") $archive[] = "p.archive IS NULL";
                    if ($v == "2") $archive[] = "p.archive IS NOT NULL";
                }
                $where[] = "(".implode(" OR ",$archive).")";
            }
            else $where[] = "p.archive IS NULL";

            $where[] = "p.id_company=".$_SESSION['user']['current_company'];

            if ($where) $where = "where ".implode(" and ",$where);

            $total = $this->db->num_rows("projects as p
            LEFT JOIN projects_users as u ON p.id = u.id_project and u.id_user=".$_SESSION['user']['id_user']."
            {$where}
            order by p.owner DESC,p.name
        ");

            require_once(ROOT.'libraries/paginator/paginator.php');
            $paginator = new \Paginator($total, $_POST['page'], $this->limit);

            $query = $this->db->query("select * from projects as p
            LEFT JOIN projects_users as u ON p.id = u.id_project and u.id_user=".$_SESSION['user']['id_user']."
            {$where}
            group by p.id
            order by p.owner DESC,p.name
            LIMIT {$this->limit}
            OFFSET {$paginator->get_range('from')}
        ");
            $projects = $query->fetchAll();

            $data = array(
                'all_projects' => $projects,
                //'projects' => $this->get_controller("projects")->get_projects(),
                'access' => $access['access'],
                'paginator' => $paginator
            );

            if ($_POST)
            {
                $res['success'] = $this->layout_get("all_projects_table.html",$data);
                echo json_encode($res);
            }
            else $this->layout_show("all_projects.html",$data);
        }
        else
        {
            $access = $this->get_controller("projects","users")->get_access($this->id);
            if (!$project = $access['project'])
            {
                if ($_POST) $res['error'] = "Проект не найден";
                else $this->error_page();
            }

            if (!$access['access']['show_review'])
            {
                if ($_POST) $res['error'] = "У Вас недостаточно прав";
                else $this->error_page("denied");
            }


            if (!$res['error'])
            {
                if ($project['owner']) crumbs("Личные","/projects/all/?filter=my");
                crumbs($project['name'],"/projects/~{$project['id']}");
                crumbs("Обзор");

                $stats_other['files'] = $this->get_controller("projects","files")->get_files_count($this->id);
                $stats_other['docs'] = $this->get_controller("projects","documents")->get_documents_count($this->id);

                if ($project['owner'] == "")
                {
                    $stats_other['news'] = $this->get_controller("projects","news")->get_news_count($this->id);
                    $stats_other['users'] = $this->get_controller("projects","users")->get_users_count($this->id);
                    $stats_other['forum'] = $this->get_controller("projects","forum")->get_forums_count($this->id);
                }

                if ($_POST)
                {
                    $data = array(
//                    'access' => $access['access'],
                        'project' => $project,
                        'stats' => $this->get_controller("projects","tasks")->get_stats($this->id),
                        //'categories' => $this->get_categories($this->id)
                    );
                    $res['success'] = $this->layout_get("review_post.html",$data);
                }
                else
                {
                    $start = strtotime(date("d.m.Y",strtotime("-3 days", time())));
                    $end = time();
                    $logs = $this->get_controller("projects","logs")->get_logs(false,$this->id,false,$start,$end);

                    $this->set_global("id_project",$this->id);
                    $data = array(
                        'access' => $access['access'],
                        'project' => $project,
                        'review_button' => true,
                        'stats' => $this->get_controller("projects","tasks")->get_stats($this->id),
                        'stats_other' => $stats_other,
                        //'categories' => $this->get_categories($this->id),
                        'logs' => $logs['logs'],
                        'paginator' => $logs['paginator'],
                        'types' => array('project','task','file','news','comment','forum'),//$this->db->get_enum("projects_logs","type"),
                        'start' => date("d.m.Y",$start),
                        'end' => date("d.m.Y",$end),
                    );
                    $this->layout_show("review.html",$data);
                }
            }
            if ($_POST) echo json_encode($res);
        }
    }

    function get_number_page($id_project)
    {
        $where = "WHERE p.archive IS NULL and p.id IN (select id_project from projects_users where id_user=? and role IS NOT NULL)";
        $this->db->query("SET @recNo:=0");
        $query = $this->db->prepare("SELECT n FROM
            (SELECT @recNo := @recNo+1 n, p.id
              FROM projects as p
              {$where}
              order by p.owner DESC,p.name
            ) s WHERE id=?");
        $query->execute(array($_SESSION['user']['id_user'],$id_project));
        $n = $query->fetch();
        $total = $n['n'];

        require_once(ROOT.'libraries/paginator/paginator.php');
        $paginator = new \Paginator($total, 1, $this->project_panel_limit);
        return $paginator->pages;
    }

    function get_projects($id_project=false,$data=false)
    {
        if ($this->get_global('id_project')) $id_project = $this->get_global('id_project');

    //    if ($_POST['project_panel_page'] != "") $page = $_POST['project_panel_page'];
    //    else if ($id_project) $page = $this->get_number_page($id_project);

        $where[] = "p.id_company=".$_SESSION['user']['current_company'];
        $where[] = "archive IS NULL";
        $where[] = "u.id_user='{$_SESSION['user']['id_user']}'";
        $where[] = "(p.owner ='{$_SESSION['user']['id_user']}' OR p.owner IS NULL)";
//        else $where[] = "(p.owner='{$_SESSION['user']['id_user']}' OR p.owner IS NULL)";

        if ($where) $where = "where ".implode(" and ",$where);

    //    $query = $this->db->query("select count(distinct p.id) as count from projects as p
    //        LEFT JOIN projects_users as u ON p.id = u.id_project and u.id_user=".$_SESSION['user']['id_user']."
    //        {$where}
    //    ");
   //     $total =$query->fetch();
   //     $total = $total['count'];

   //     require_once(ROOT.'libraries/paginator/paginator.php');
    //    $paginator = new \Paginator($total, $page, $this->project_panel_limit);

        $query = $this->db->query("select p.*,u.role from projects as p
            LEFT JOIN projects_users as u ON p.id = u.id_project and u.id_user=".$_SESSION['user']['id_user']."
            {$where}
            order by p.owner DESC,p.name
        ");

        while ($row = $query->fetch())
        {
            $projects[$row['id']] = $row;
        }

        if (!$data)
        {
            if ($_POST['project_panel_page'])
            {
                $data['projects'] = array('projects' => $projects,'paginator' => $paginator,'current_project' => $_POST['id_project']);
                $res['success'] = $this->layout_get("projects_in_panel.html",$data);

                echo json_encode($res);
            }
            else
            {
                $data = array (
                    'projects' => $projects,
                    'paginator' => $paginator,
                    'current_project' => $this->get_global('id_project')
                );
                return $this->layout_get("projects_in_panel.html",array('projects' => $data));
            }
        }
        else
        {
            return array (
                'projects' => $projects,
                'paginator' => $paginator
            );
        }
    }

    function get_project($id)
    {
        $query = $this->db->prepare("select * from projects where id=?");
        $query->execute(array($id));
        $project = $query->fetch();

        return $project;
    }

    function get_delete_project()
    {
        $access = $this->get_controller("projects","users")->get_access($_POST['id']);
        if ($access['access']['delete_project'])
        {
            $captcha = $this->get_controller("captcha")->get_captcha(6);
            $res['success'] = $this->layout_get("get_delete_project.html",array('captcha' => $captcha,'project' => $access['project']));
        }
        else $res['error'] = "У Вас недостаточно прав";

        echo json_encode($res);
    }

    function delete_project()
    {
        $access = $this->get_controller("projects","users")->get_access($_POST['id']);

        if ($_SESSION['captcha'][$_POST['id_captcha']] != $_POST['captcha'] || $_POST['captcha'] == "" || $_SESSION['captcha'][$_POST['id_captcha']] == "") $res['error']['text'] = "Неверная картинка";

        if (!$res['error'])
        {
            if ($access['access']['delete_project'])
            {
                $log = $this->get_controller("projects","logs");
                $project = $this->get_project($_POST['id']);

                $query = $this->db->prepare("select * from projects_files where id_project=?");
                if (!$query->execute(array($_POST['id']))) $res['error'] = "Ошибка базы данных";
                else $files = $query->fetchAll();

                $this->db->beginTransaction();

                $query = $this->db->prepare("delete from projects where id=?");
                if (!$query->execute(array($_POST['id']))) $res['error'] = "Возникла ошибка при попытке удалить проект";

                $query = $this->db->prepare("insert into trash_data(type,id_for_type,trash_name) values(?,?,?)");
                if (!$query->execute(array('project',$project['id'],$project['name']))) $res['error'] = "Возникла ошибка при попытке удалить проект";

                if (!$log->set_logs('project',$project['id'],$project['name'],"delete")) $res['error'] = "Возникла ошибка при попытке обновить логи";

                if (!$res['error'])
                {
                    $res['success'] = true;
                    $this->db->commit();

                    if ($files)
                    {
                        require_once(ROOT.'libraries/imaginator/imaginator.php');
                        foreach ($files as $v)
                        {
                            if ($v['type'] == "other")
                            {
                                $folder = "uploads/projects";
                                $path = $folder."/".real_path($v['file']);
                                unlink ($path);
                            }
                            else if ($v['type'] == "image")
                            {
                                \imaginator::unlink_images($v['file'],"projects");
                            }
                        }
                    }
                }
                else $this->db->rollBack();
            }
            else $res['error']['text'] = "У Вас недостаточно прав";
        }
        else
        {
            $captcha = $this->get_controller("captcha")->get_captcha(6);
            $res['error']['captcha_html'] = $captcha;
        }
        echo json_encode($res);
    }

    function get_categories($id_project,$for_filter=false)
    {
        $query = $this->db->prepare("select * from projects_tasks_categories where id_project=? order by name ASC");
        $query->execute(array($id_project));
        if ($for_filter)
        {
            while ($row = $query->fetch())
            {
                $cats[$row['id']] = $row['name'];
            }
            return $cats;
        }
        else return $query->fetchAll();
    }
}