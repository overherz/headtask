<?php
namespace projects;

class documents extends \Controller {

    var $limit = 20;
    
    function default_method()
    {
        switch($_POST['act'])
        {
            case "save_documents":
                $this->save_documents();
                break;
            case "delete_documents":
                $this->delete_documents();
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
                $this->add_edit_document();
                break;
            case "show":
                $this->show_document();
                break;
            default:
                $this->show_documents();
        }
    }

    function add_edit_document()
    {
        if ($this->id == "add")
        {
            $id_project = $this->_0;
            $add_documents_button = true;
        }
        else
        {
            if ($documents = $this->get_documents($this->_0))
            {
                $id_project = $documents['id_project'];
                $documents_button =  true;
            }
            else $this->error_page();
        }

        $access = $this->get_controller("projects","users")->get_access($id_project);
        if ($access['access']['documents'])
        {
            $project = $access['project'];

            if ($project['owner']) crumbs("Личные","/projects/all/?filter=my");
            crumbs($project['name'],"/projects/~{$project['id']}/");
            crumbs("Wiki","/projects/documents/{$project['id']}");
            if ($documents)
            {
                crumbs($documents['name'],"/projects/documents/show/{$documents['id']}");
                crumbs("Редактирование документа");
            }
            else crumbs("Добавление документа");

            $this->set_global('id_project',$project['id']);
            $this->layout_show('documents/add_documents.html',array(
                //'projects' => $this->get_controller("projects")->get_projects($project['id']),
                'add_documents_button' => $add_documents_button,
                'project' => $project,
                'access' => $access['access'],
                'documents' => $documents,
                'documents_button' => $documents_button
            ));
        }
        else $this->error_page("denied");
    }

    function show_document()
    {
        if ($documents = $this->get_documents($this->_0))
        {
            $access = $this->get_controller("projects","users")->get_access($documents['id_project']);

            if ($access['project']['owner']) crumbs("Личные","/projects/all/?filter=my");
            crumbs($access['project']['name'],"/projects/~{$access['project']['id']}/");
            crumbs("Wiki","/projects/documents/{$access['project']['id']}");
            crumbs($documents['name']);

            $this->set_global('id_project',$access['project']['id']);
            $this->layout_show("documents/documents_show.html",array(
                'documents' => $documents,
                'project' => $access['project'],
                //'projects' => $this->get_controller("projects")->get_projects($access['project']['id']),
                'documents_button' => true,
                'access' => $access['access'],
            ));
        }
        else $this->error_page();
    }

    function show_documents()
    {
        $access = $this->get_controller("projects","users")->get_access($this->id);
        if ($project = $access['project'])
        {
            if ($project['owner']) crumbs("Личные","/projects/all/?filter=my");
            crumbs($project['name'],"/projects/~{$project['id']}/");
            crumbs("Wiki");

            if (isset($_POST['search']) && $_POST['search'] != '')
            {
                $search = explode(" ",$_POST['search']);
                foreach ($search as $s)
                {
                    $s = $this->db->quote("%{$s}%");
                    $search_ar[] = "d.name LIKE ".$s." OR d.description LIKE ".$s;
                }
                $search_text = "and (".implode("OR ",$search_ar).")";
            }

            $total = $this->db->num_rows("projects_documents as d where id_project={$this->db->quote($this->id)} {$search_text}");

            require_once(ROOT.'libraries/paginator/paginator.php');
            $paginator = new \Paginator($total, $_POST['page'], $this->limit);

            $query = $this->db->query("select d.id,d.name,d.created,d.author,u.first_name,u.last_name,u.nickname,g.color,g.name as group_name
                from projects_documents as d
                LEFT JOIN users as u ON d.author=u.id_user
                LEFT JOIN groups as g ON u.id_group=g.id
                where id_project={$this->db->quote($this->id)} {$search_text}
                order by created DESC
                LIMIT {$this->limit}
                OFFSET {$paginator->get_range('from')}
            ");
            while ($row = $query->fetch())
            {
                $row['fio'] = build_user_name($row['first_name'],$row['last_name']);
                $documents[] = $row;
            }

            $this->set_global('id_project',$project['id']);
            $data = array(
                'project' => $project,
//                'projects' => $this->get_controller("projects")->get_projects($project['id']),
                'documents_button' => true,
                'paginator' => $paginator,
                'access' => $access['access'],
                'documents' => $documents
            );

            if ($_POST)
            {
                if ($text = $this->layout_get('documents/documents_table.html',$data)) $result['success'] = $text;
                else $result['error'] = "Ничего не найдено";

                echo json_encode($result);
            }
            else $this->layout_show('documents/documents.html',$data);
        }
        else $this->error_page();
    }

    function get_documents($id)
    {
        $query = $this->db->prepare("select pd.*,u.id_user,u.first_name,u.last_name,u.nickname from projects_documents as pd
            LEFT JOIN users as u ON pd.author = u.id_user
            where pd.id=?");
        $query->execute(array($id));
        $documents = $query->fetch();
        $documents['fio'] = build_user_name($documents['first_name'],$documents['last_name']);

        return $documents;
    }

    function get_last_documents($project,$limit=5)
    {
        $limit = (int) $limit;
        $query = $this->db->prepare("select id,name,created from projects_documents
            where id_project=?
            order by created DESC
            LIMIT {$limit}
        ");

        $query->execute(array($project));
        return $query->fetchAll();
    }

    function save_documents()
    {
        if ($_POST['id'])
        {
            $documents = $this->get_documents($_POST['id']);
            $id_project = $documents['id_project'];
        }
        else $id_project = $_POST['project'];

        $access = $this->get_controller("projects","users")->get_access($id_project);

        if ($_POST['name'] == "") $res['error'][] = "Введите название";
        if ($_POST['description'] == "") $res['error'][] = "Введите текст документа";
        if (!$res['error'])
        {
            $log = $this->get_controller("projects","logs");
            if ($_POST['id'])
            {
                if ($access['access']['documents'])
                {
                    $query = $this->db->prepare("update projects_documents set name=?,description=?,created=? where id=?");
                    if ($query->execute(array($_POST['name'],$_POST['description'],time(),$_POST['id'])))
                    {
                        $res['success'] = $_POST['id'];
                        if ($documents['name'] != $_POST['name']) $log_text = ". Название изменено на \"{$_POST['name']}\"";
                        if ($log) $log->set_logs("wiki",$id_project,"<a href='/projects/documents/show/{$documents['id']}'>{$documents['name']}</a>{$log_text}","edit");
                    }
                    else $res['error'] = "Ошибка сохранения документа";
                }
                else $res['error'] = "У Вас недостаточно прав";
            }
            else
            {
                if ($access['access']['documents'])
                {
                    $query = $this->db->prepare("insert into projects_documents(name,description,created,author,id_project) values(?,?,?,?,?)");
                    if ($query->execute(array($_POST['name'],$_POST['description'],time(),$_SESSION['user']['id_user'],$id_project)))
                    {
                        $last_id = $this->db->lastInsertId();
                        $res['success'] = $last_id;
                        if ($log) $log->set_logs("wiki",$id_project,"<a href='/projects/documents/show/{$last_id}'>{$_POST['name']}</a>","add");
                    }
                    else $res['error'] = "Ошибка добавления документа";
                }
                else $res['error'] = "У Вас недостаточно прав";
            }
        }

        echo json_encode($res);
    }

    function delete_documents()
    {
        $documents = $this->get_documents($_POST['id']);
        $access = $this->get_controller("projects","users")->get_access($documents['id_project']);
        $log = $this->get_controller("projects","logs");

        if ($access['access']['documents'])
        {
            $query = $this->db->prepare("delete from projects_documents where id=?");
            if ($query->execute(array($_POST['id'])))
            {
                $res['success'] = $access['project']['id'];
                $log->set_logs("wiki",$access['project']['id'],"{$documents['name']}","delete");
            }
            else $res['error'] = "Ошибка базы данных";
        }
        else $res['error'] = "У Вас недостаточно прав";

        echo json_encode($res);
    }

    function get_documents_count($id_project)
    {
        return $this->db->num_rows("projects_documents where id_project={$this->db->quote($id_project)}");
    }
}