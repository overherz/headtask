<?php
namespace projects;

class news extends \Controller {

    var $limit = 20;
    
    function default_method()
    {
        switch($_POST['act'])
        {
            case "save_news":
                $this->save_news();
                break;
            case "delete_news":
                $this->delete_news();
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
                $this->add_edit_news();
                break;
            case "show":
                $this->show_news();
                break;
            default:
                $this->show_all_news();
        }
    }

    function add_edit_news()
    {
        if ($this->id == "add")
        {
            $id_project = $this->_0;
            $add_news_button = true;
        }
        else
        {
            if ($news = $this->get_news($this->_0))
            {
                $id_project = $news['id_project'];
                $news_button =  true;
            }
            else $this->error_page();
        }

        $access = $this->get_controller("projects","users")->get_access($id_project);
        if ($access['access']['news'])
        {
            $project = $access['project'];

            crumbs($project['name'],"/projects/~{$project['id']}/");
            crumbs("Новости","/projects/news/{$project['id']}");
            if ($news)
            {
                crumbs($news['name'],"/projects/news/show/{$news['id']}");
                crumbs("Редактирование новости");
            }
            else crumbs("Добавление новости");

            $users = $this->get_controller("projects","users")->get_users_project($project['id'],true);

            $this->set_global('id_project',$project['id']);
            $this->layout_show('news/add_news.html',array(
                //'projects' => $this->get_controller("projects")->get_projects($project['id']),
                'add_news_button' => $add_news_button,
                'project' => $project,
                'access' => $access['access'],
                'news' => $news,
                'users' => $users,
                'news_button' => $news_button
            ));
        }
        else $this->error_page("denied");
    }

    function show_news()
    {
        if ($news = $this->get_news($this->_0))
        {
            $access = $this->get_controller("projects","users")->get_access($news['id_project']);

            crumbs($access['project']['name'],"/projects/~{$access['project']['id']}/");
            crumbs("Новости","/projects/news/{$access['project']['id']}");
            crumbs($news['name']);

            $this->set_global('id_project',$access['project']['id']);
            $this->layout_show("news/news_show.html",array(
                'news' => $news,
                'project' => $access['project'],
                //'projects' => $this->get_controller("projects")->get_projects($access['project']['id']),
                'news_button' => true,
                'access' => $access['access'],
            ));
        }
        else $this->error_page();
    }

    function get_news_count($id_project)
    {
        return $this->db->num_rows("projects_news where id_project={$this->db->quote($id_project)}");
    }

    function show_all_news()
    {
        $access = $this->get_controller("projects","users")->get_access($this->id);
        if ($project = $access['project'])
        {
            crumbs($project['name'],"/projects/~{$project['id']}/");
            crumbs("Новости");
            $total = $this->get_news_count($this->id);
            require_once(ROOT.'libraries/paginator/paginator.php');
            $paginator = new \Paginator($total, $_POST['page'], $this->limit);
            $query = $this->db->query("select n.id,n.name,n.created,n.author,u.first_name,u.last_name,u.nickname,g.color,g.name as group_name
                from projects_news as n
                LEFT JOIN users as u ON n.author=u.id_user
                LEFT JOIN groups as g ON u.id_group=g.id
                where id_project={$this->db->quote($this->id)}
                order by created DESC
                LIMIT {$this->limit}
                OFFSET {$paginator->get_range('from')}
            ");
            while ($row = $query->fetch())
            {
                $row['fio'] = build_user_name($row['first_name'],$row['last_name']);
                $news[] = $row;
            }

            $this->set_global('id_project',$project['id']);
            $data = array(
                'project' => $project,
                //'projects' => $this->get_controller("projects")->get_projects($project['id']),
                'news_button' => true,
                'paginator' => $paginator,
                'access' => $access['access'],
                'news' => $news
            );

            if ($_POST)
            {
                if ($text = $this->layout_get('news/news_table.html',$data)) $result['success'] = $text;
                else $result['error'] = "Ничего не найдено";

                echo json_encode($result);
            }
            else $this->layout_show('news/news.html',$data);
        }
        else $this->error_page();
    }

    function get_news($id)
    {
        $query = $this->db->prepare("select pn.*,u.id_user,u.first_name,u.last_name,u.nickname from projects_news as pn
            LEFT JOIN users as u ON pn.author = u.id_user
            where pn.id=?");
        $query->execute(array($id));
        $news = $query->fetch();
        $news['fio'] = build_user_name($news['first_name'],$news['last_name']);

        return $news;
    }

    function get_last_news($project,$limit=5)
    {
        $limit = (int) $limit;
        $query = $this->db->prepare("select id,name,created from projects_news
            where id_project=?
            order by created DESC
            LIMIT {$limit}
        ");

        $query->execute(array($project));
        return $query->fetchAll();
    }

    function save_news()
    {
        if ($_POST['id'])
        {
            $news = $this->get_news($_POST['id']);
            $id_project = $news['id_project'];
        }
        else $id_project = $_POST['project'];

        $access = $this->get_controller("projects","users")->get_access($id_project);
        $project = $access['project'];

        if ($_POST['name'] == "") $res['error'][] = "Введите название";
        if ($_POST['description'] == "") $res['error'][] = "Введите текст новости";
        if ($project['owner']) $res['error'][] = "Действие запрещено";
        if (!$res['error'])
        {
            $log = $this->get_controller("projects","logs");
            if ($_POST['id'])
            {
                if ($access['access']['news'])
                {
                    $query = $this->db->prepare("update projects_news set name=?,description=?,created=? where id=?");
                    if ($query->execute(array($_POST['name'],$_POST['description'],time(),$_POST['id'])))
                    {
                        $res['success'] = $_POST['id'];
                        if ($news['name'] != $_POST['name']) $log_text = ". Название изменено на \"{$_POST['name']}\"";
                        if ($log) $log->set_logs("news",$id_project,"Изменена <a href='/projects/news/show/{$news['id']}'>\"{$news['name']}\"</a>{$log_text}");
                        $notif = "Изменена новость \"{$news['name']}\" в проекте \"{$project['name']}\"";
                        $edit = true;
                    }
                    else $res['error'] = "Ошибка сохранения новости";
                }
                else $res['error'] = "У Вас недостаточно прав";
            }
            else
            {
                if ($access['access']['news'])
                {
                    $query = $this->db->prepare("insert into projects_news(name,description,created,author,id_project) values(?,?,?,?,?)");
                    if ($query->execute(array($_POST['name'],$_POST['description'],time(),$_SESSION['user']['id_user'],$id_project)))
                    {
                        $notif = "Добавлена новость \"{$_POST['name']}\" в проект \"{$project['name']}\"";
                        $last_id = $this->db->lastInsertId();
                        $res['success'] = $last_id;
                        if ($log) $log->set_logs("news",$id_project,"Создана <a href='/projects/news/show/{$last_id}'>\"{$_POST['name']}\"</a>");
                    }
                    else $res['error'] = "Ошибка добавления новости";
                }
                else $res['error'] = "У Вас недостаточно прав";
            }
        }

        if ($res['success'])
        {
            $n_array = array();
            if ($_POST['email'])
            {
                foreach ($_POST['email'] as $v) $n_array[$v]['email'] = true;
            }
            if ($_POST['sms'])
            {
                foreach ($_POST['sms'] as $v) $n_array[$v]['sms'] = true;
            }

            $notif_cr = $this->get_controller("projects","tasks");
            foreach ($n_array as $k => $v)
            {
                $message = $this->layout_get("news/news_mail.html",array(
                    'server_name' => $_SERVER["SERVER_NAME"],
                    'name' => $project['name'],
                    'edit' => $edit,
                    'news' => $res['success'],
                    'news_name' => $_POST['name'],
                    'old_news_name' => $news['name']
                ));
                $notif_cr->send_notification($k,$notif,$message,$v['email'],$v['sms']);
            }
        }
        echo json_encode($res);
    }

    function delete_news()
    {
        $news = $this->get_news($_POST['id']);
        $access = $this->get_controller("projects","users")->get_access($news['id_project']);
        $log = $this->get_controller("projects","logs");

        if ($access['access']['news'])
        {
            $query = $this->db->prepare("delete from projects_news where id=?");
            if ($query->execute(array($_POST['id'])))
            {
                $res['success'] = $access['project']['id'];
                $log->set_logs("news",$access['project']['id'],"Удалена {$news['name']}");
            }
            else $res['error'] = "Ошибка базы данных";
        }
        else $res['error'] = "У Вас недостаточно прав";

        echo json_encode($res);
    }
}