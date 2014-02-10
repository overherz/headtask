<?php
namespace projects;

class projects extends \Controller {

    private $project_panel_limit = 15;
    
    function default_method()
    {
        switch($_POST['act'])
        {
            case "delete_project":
                $this->delete_project();
                break;
            case "get_panel_page_projects":
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
            $projects_ar = $this->get_projects();
            if ($projects_ar)
            {
                $projects = $projects_ar['projects'];
                $this->redirect("/projects/~{$projects[0]['id']}/");
            }
            else $this->redirect("/projects/all/");
        }
        else
        {
            $access = $this->get_controller("projects","users")->get_access($this->id);
            if (!$project = $access['project']) $this->error_page();

            if ($project['owner']) crumbs("Личные проекты","/projects/",true);
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

            $this->layout_show("review.html",array(
                'access' => $access['access'],
                'projects' => $this->get_projects($this->id),
                'project' => $project,
                'review_button' => true,
                'stats' => $this->get_controller("projects","tasks")->get_stats($this->id),
                'stats_other' => $stats_other,
                'news' => $this->get_controller("projects","news")->get_last_news($this->id)
            ));
        }
    }

    function get_number_page($id_project)
    {
        if ($_SESSION['user']['id_group'] != 1)
        {
            $where = "WHERE p.archive IS NULL and p.id IN (select id_project from projects_users where id_user=? and role IS NOT NULL)";
        }
        else
        {
            $where = "WHERE p.archive IS NULL and (p.owner=? OR p.owner IS NULL)";
        }
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

    function get_projects($id_project=false)
    {
        if ($id_project) $page = $this->get_number_page($id_project);
        else $page = $_POST['project_panel_page'];

        $where[] = "archive IS NULL";
        if ($_SESSION['user']['id_group'] != 1) $where[] = "u.id_user='{$_SESSION['user']['id_user']}' and u.role IS NOT NULL";
        else $where[] = "(p.owner='{$_SESSION['user']['id_user']}' OR p.owner IS NULL)";

        if ($where) $where = "where ".implode(" and ",$where);

        $query = $this->db->query("select count(distinct p.id) as count from projects as p
            LEFT JOIN projects_users as u ON p.id = u.id_project
            {$where}
        ");
        $total =$query->fetch();
        $total = $total['count'];

        require_once(ROOT.'libraries/paginator/paginator.php');
        $paginator = new \Paginator($total, $page, $this->project_panel_limit);

        $query = $this->db->query("select p.* from projects as p
            LEFT JOIN projects_users as u ON p.id = u.id_project
            {$where}
            group by p.id
            order by p.owner DESC,p.name
            LIMIT {$this->project_panel_limit}
            OFFSET {$paginator->get_range('from')}
        ");

        if ($projects = $query->fetchAll())
        {
            if ($_POST['project_panel_page'])
            {
                $data['projects'] = array('projects' => $projects,'paginator' => $paginator,'current_project' => $_POST['id_project']);
                $res['success']['panel'] = $this->layout_get("projects_in_panel.html",$data);

                echo json_encode($res);
            }
            else
            {
                return array (
                    'projects' => $projects,
                    'paginator' => $paginator
                );
            }
        }
    }

    function get_project($id)
    {
        $query = $this->db->prepare("select * from projects where id=?");
        $query->execute(array($id));
        $project = $query->fetch();

        return $project;
    }

    function delete_project()
    {
        $access = $this->get_controller("projects","users")->get_access($_POST['id']);
        if ($access['access']['delete_project'])
        {
            $this->db->beginTransaction();

            $query = $this->db->prepare("select * from projects_files where id_project=?");
            if (!$query->execute(array($_POST['id']))) $res['error'] = "Ошибка базы данных";
            else $files = $query->fetchAll();

            $query = $this->db->prepare("delete from projects where id=?");
            if (!$query->execute(array($_POST['id']))) $res['error'] = "Возникла ошибка при попытке удалить проект";
        }
        else $res['error'] = "У Вас недостаточно прав";

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
        echo json_encode($res);
    }
}