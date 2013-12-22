<?php
namespace admin\groups;

class groups extends \Admin {

    function default_method()
    {
        switch($_POST['act'])
        {
            case "save":
                $this->save();
                break;
            case "add_group":
                $this->add_group();
                break;
            case "delete":
                $this->delete();
                break;
            case "edit":
                $this->edit();
                break;
            default: $this->default_show();
        }
    }

    function default_show()
    {
        $groups = $this->db->query("select g.*,count(u.id_user) as count from groups as g LEFT JOIN users as u ON g.id=u.id_group group by g.id")->fetchAll();

        if ($_GET['ajax'])
        {
            $res['success'] = $this->layout_get('admin/groups.html',array('groups' => $groups));
            echo json_encode($res);
        }
        else $this->layout_show('admin/index.html',array('groups' => $groups));
    }

    function add_group()
    {
        $res['success'] = $this->layout_get('admin/form.html');
        echo json_encode($res);
    }

    function edit()
    {
        if ($_POST['id'] != "")
        {
            if ($group = $this->get_group($_POST['id']))
            {
                if ($group['access'] != "") $group['access'] = json_decode($group['access']);
                if ($group['access_site'] != "") $group['access_site'] = json_decode($group['access_site']);
                $res['success'] = $this->layout_get('admin/form.html',array("group" => $group,'mode' => 'edit'));
            }
        }
        else $res['error'] = "Переданые неверные данные";

        echo json_encode($res);
    }

    function save()
    {
        if ($_POST['name'] == '') $res['error'] = "Название не может быть пустым";

        if (!$res['error'])
        {
            $log = $this->get_controller("logs");
            $group = $this->get_group($_POST['id']);
            if ($group['name'] != $_POST['name'] && $_POST['id'] != "") $message = ". Название группы изменено на \"{$_POST['name']}\"";
            if ($_SESSION['admin']['id_group'] == 1 && $_POST['id'] != 1)
            {
                $access = json_encode($_POST['access']);
                $access_site = json_encode($_POST['access_site']);
                if ($_POST['id'] != "")
                {
                    $query = $this->db->prepare("UPDATE groups set name=?,access=?,access_admin=?,access_site=?,color=? where id=?");
                    if (!$query->execute(array($_POST['name'],$access,$_POST['access_admin'],$access_site,$_POST['color'],$_POST['id']))) $res['error'] = "Ошибка базы данных";
                    elseif ($log) $log->save_into_log("admin","Группы пользователей",true,"Отредактирована группа \"{$group['name']}\"".$message,$_SESSION['admin']['id_user']);
                }
                else
                {
                    $query = $this->db->prepare("INSERT INTO groups(name,access,access_admin,access_site,color) VALUES(?,?,?,?,?)");
                    if (!$query->execute(array($_POST['name'],$access,$_POST['access_admin'],$access_site,$_POST['color']))) $res['error'] = "Ошибка базы данных";
                    elseif ($log) $log->save_into_log("admin","Группы пользователей",true,"Добавлена группа \"{$_POST['name']}\"",$_SESSION['admin']['id_user']);
                }
            }
            else
            {
                if ($_POST['id'] != "")
                {
                    $query = $this->db->prepare("UPDATE groups set name=?,access_site=?,color=? where id=?");
                    if (!$query->execute(array($_POST['name'],$access_site,$_POST['color'],$_POST['id']))) $res['error'] = "Ошибка базы данных";
                    elseif ($log) $log->save_into_log("admin","Группы пользователей",true,"Отредактирована группа \"{$group['name']}\"".$message,$_SESSION['admin']['id_user']);
                }
                else
                {
                    $query = $this->db->prepare("INSERT INTO groups(name,access_site,color=?) VALUES(?,?,?)");
                    if (!$query->execute(array($_POST['name'],$access_site,$_POST['color']))) $res['error'] = "Ошибка базы данных";
                    elseif ($log) $log->save_into_log("admin","Группы пользователей",true,"Добавлена группа \"{$_POST['name']}\"",$_SESSION['admin']['id_user']);
                }
            }
            if (!$res['error']) $res['success'] = true;
        }

        echo json_encode($res);
    }

    function delete()
    {
        if ($_POST['id'] != "")
        {
            $log = $this->get_controller("logs");
            $group = $this->get_group($_POST['id']);
            $query = $this->db->prepare("delete from groups where id=?");
            if ($query->execute(array($_POST['id'])))
            {
                $res['success'] = true;
                if ($log) $log->save_into_log("admin","Группы пользователей",true,"Удалена группа \"{$group['name']}\"",$_SESSION['admin']['id_user']);
            }
            else $res['error'] = "Ошибка удаления";
        }
        else $res['error'] = "Передан неверный id";

        echo json_encode($res);
    }

    function get_group($id)
    {
        $query = $this->db->prepare("select * from groups where id=?");
        $query->execute(array($id));
        $group = $query->fetch();

        return $group;
    }
}

