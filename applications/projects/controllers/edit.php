<?php
namespace projects;

class edit extends \Controller {

    function default_method()
    {
        switch($_POST['act'])
        {
            case "get_category_form":
                $this->get_category_form();
                break;
            case "edit_category":
                $this->edit_category();
                break;
            case "save_category":
                $this->save_category();
                break;
            case "delete_category":
                $this->delete_category();
                break;
            default:
                $this->edit_show();
        }
    }
    
    function edit_show()
    {
        $access = $this->get_controller("projects","users")->get_access($this->id);
        if ($access['access']['edit_project'])
        {
            $p_cr = $this->get_controller("projects");
            if ($project = $p_cr->get_project($this->id))
            {
                $access = $this->get_controller("projects","users")->get_access($this->id);
                if ($project['owner']) crumbs("Личные проекты","/projects/",true);
                crumbs($project['name'],"/projects/~{$project['id']}");
                crumbs("Редактирование проекта");
                $this->layout_show('add.html',array(
                    'projects' => $p_cr->get_projects($project['id']),
                    'project' => $project,
                    'access' => $access['access'],
                    'edit_button' => true,
                    'categories' => $this->get_categories($project['id'])
                ));
            }
            else $this->error_page();
        }
        else $this->error_page("denied");
    }

    function get_category_form()
    {
        $res['success'] = $this->layout_get("category_form.html",array('id_project' => $_POST['id_project']));
        echo json_encode($res);
    }

    function get_categories($id_project)
    {
        $query = $this->db->prepare("select * from projects_tasks_categories where $id_project=?");
        $query->execute(array($id_project));
        return $query->fetchAll();
    }

    function edit_category()
    {
        if ($category = $this->get_category($_POST['id']))
        {
            $res['success'] = $this->layout_get("category_form.html",array('id_project' => $category['id_project'],'category' => $category));
        }
        else $res['error'] = "Категория не найдена";

        echo json_encode($res);
    }

    function get_category($id_category)
    {
        $query = $this->db->prepare("select * from projects_tasks_categories where id=?");
        $query->execute(array($id_category));
        return $query->fetch();
    }

    function save_category()
    {
        if ($_POST['id'])
        {
            $category = $this->get_category($_POST['id']);
            $access = $this->get_controller("projects","users")->get_access($category['id_project']);
            $id_project = $category['id_project'];
        }
        else
        {
            $access = $this->get_controller("projects","users")->get_access($_POST['id_project']);
            $id_project = $_POST['id_project'];
        }

        if ($access['access']['edit_project'])
        {
            if ($_POST['name'] == "") $res['error'] = "Укажите название";

            if (!$res['error'])
            {
                $check_duplicate = $this->db->prepare("select * from projects_tasks_categories where id_project=? and name=? and id !=?");
                $check_duplicate->execute(array($id_project,$_POST['name'],$category['id']));
                if ($check_duplicate->fetch()) $res['error'] = "Такая категория уже есть";
                else
                {
                    if ($category)
                    {
                        $query = $this->db->prepare("update projects_tasks_categories set name=?,color=?,color_text=? where id=?");
                        if ($query->execute(array($_POST['name'],$_POST['color'],$_POST['color_text'],$category['id']))) $res['success'] = true;
                        else $res['error'] = "Ошибка базы данных";
                    }
                    else
                    {
                        $query = $this->db->prepare("insert into projects_tasks_categories(name,color,color_text,id_project) values(?,?,?,?)");
                        if ($query->execute(array($_POST['name'],$_POST['color'],$_POST['color_text'],$id_project))) $res['success'] = true;
                        else $res['error'] = "Ошибка базы данных";
                    }

                    if ($res['success']) $res['success'] = $this->layout_get("category_table.html", array('categories' => $this->get_categories($id_project)));
                }
            }
        }
        else $res['error'] = "У Вас недостаточно прав";

        echo json_encode($res);
    }

    function delete_category()
    {
        $category = $this->get_category($_POST['id']);
        $access = $this->get_controller("projects","users")->get_access($category['id_project']);

        if ($access['access']['edit_project'])
        {
            $query = $this->db->prepare("delete from projects_tasks_categories where id=? LIMIT 1");
            if ($query->execute(array($category['id']))) $res['success'] = $this->layout_get("category_table.html", array('categories' => $this->get_categories($category['id_project'])));
            else $res['error'] = "Ошибка базы данных";
        }
        else $res['error'] = "У Вас недостаточно прав";

        echo json_encode($res);
    }
}
