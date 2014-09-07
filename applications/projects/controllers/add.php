<?php
namespace projects;

class add extends \Controller {
    
    function default_method()
    {
        switch($_POST['act'])
        {
            case "save_project":
                $this->save_project();
                break;
            default:
                $this->default_for_this();
        }
    }

    function default_for_this()
    {
        $access = $this->get_controller("projects","users")->get_access();

        if ($access['access']['add_project'] || $access['access']['add_own_project'])
        {
            crumbs("Создание проекта");
            $this->layout_show('add.html',array(
                //'projects' => $this->get_controller("projects")->get_projects(),
                'add' => true,
                'access' => $access['access']
            ));
        }
        else $this->error_page("denied");
    }

    function save_project()
    {
        $access = $this->get_controller("projects","users")->get_access($_POST['id']);

        $this->db->beginTransaction();
        if ($_POST['name'] == "") $res['error'] = "Введите название";
        if (!$res['error'])
        {
            $log = $this->get_controller("projects","logs");
            if ($_POST['id'])
            {
                if ($access['access']['edit_project'])
                {
                    $query = $this->db->prepare("update projects set name=?,description=?,url=?,archive=? where id=?");
                    if ($query->execute(array($_POST['name'],$_POST['description'],$_POST['url'],$_POST['archive'],$_POST['id'])))
                    {
                        $res['success'] = $_POST['id'];
                        if ($access['project']['name'] != $_POST['name']) $log_text = ". Название изменено на {$_POST['name']}";
                        if ($log) $log->set_logs("project",$access['project']['id'],"Изменен{$log_text}","edit");
                    }
                    else $res['error'] = "Ошибка сохранения проекта";
                }
                else $res['error'] = "У вас недостаточно прав";
            }
            else
            {
                if ($access['access']['add_project'] || $access['access']['add_own_project'])
                {
                    $query = $this->db->prepare("insert into projects(name,description,url,archive,owner) values(?,?,?,?,?)");
                    if ($_POST['owner'] || !$access['access']['add_project']) $owner = $_SESSION['user']['id_user'];

                    if ($query->execute(array($_POST['name'],$_POST['description'],$_POST['url'],$_POST['archive'],$owner)))
                    {
                        $last_id = $this->db->lastInsertId();
                        $res['success'] = $last_id;
                        if ($log) $log->set_logs("project",$last_id,"Создан","add");
                    }
                    else $res['error'] = "Ошибка создания проекта";

                    $query = $this->db->prepare("insert into projects_users(id_user,id_project,role) values (?,?,?)");
                    if (!$query->execute(array($_SESSION['user']['id_user'],$last_id,"manager"))) $res['error'] = "Ошибка создания проекта";
                }
                else $res['error'] = "У вас недостаточно прав";
            }
        }
        if (!$res['error']) $this->db->commit();
        else
        {
            unset($res['success']);
            $this->db->rollBack();
        }

        echo json_encode($res);
    }
}
