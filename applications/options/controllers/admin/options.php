<?php
namespace admin\options;

class options extends \Admin {

    var $menu = array(
        array('name' => 'Все опции','url' => '/admin/options'),
        array('name' => 'Конструктор','url' => '/admin/options/constructor')
    );

    function default_method()
    {
        switch ($_POST['act'])
        {
            case "get_options":
                $this->get_options();
                break;
            case "save_options":
                $this->save_options();
                break;
            case "delete_group":
                $this->delete_group();
                break;
            case "edit_group":
                $this->edit_group();
                break;
            case "save_group":
                $this->save_group();
                break;
            case "save_subgroup":
                $this->save_subgroup();
                break;
            case "add_group":
                $this->add_group();
                break;
            case "add_subgroup":
                $this->add_subgroup();
                break;
            default: $this->show();
        }
    }

    function show()
    {
        $query = $this->db->query("select * from group_options");
        while ($row = $query->fetch())
        {
            if ($row['id_parent']) $options[$row['id_parent']]['sub'][$row['id']] = $row;
            else $options[$row['id']] = $row;
        }

        if ($_POST)
        {
            $res['success'] = $this->layout_get('admin/options_table.html',array('options' => $options,'dev_mode' => $this->check_dev_mode()));
            echo json_encode($res);
        }
        else $this->layout_show('admin/index.html',array('options' => $options,'dev_mode' => $this->check_dev_mode()));
    }

    function get_options()
    {
        $query = $this->db->prepare("select r.*,g.name as group_name,g.id_parent,g.id as id_group
            from options as r
            LEFT JOIN group_options as g ON r.id_group=g.id
            where r.id_group=? or g.id_parent=?
        ");
        $query->execute(array($_POST['id'],$_POST['id']));
        while ($row = $query->fetch())
        {
            $options[$row['id_group']]['sub'][$row['id']] = $row;
            $options[$row['id_group']]['id_parent'] = $row['id_parent'];
            $options[$row['id_group']]['group_name'] = $row['group_name'];
            if ($row['type'] == "select" || $row['type'] == "multy_select" || $row['type'] == "radio")
            {
                $options[$row['id_group']]['sub'][$row['id']]['options'] = (array) json_decode($row['options']);
                $options[$row['id_group']]['sub'][$row['id']]['value'] = explode(",",$row['value']);
            }
        }

        $res['success'] = $this->layout_get('/admin/options.html',array('options' => $options,'dev_mode' => $this->check_dev_mode()));

        echo json_encode($res);
    }

    function save_options()
    {
        if (is_array($_POST['value'])) $_POST['value'] = implode(",",$_POST['value']);

        $query = $this->db->prepare("update options set value=? where key_name=? LIMIT 1");
        if ($query->execute(array($_POST['value'],$_POST['key']))) $res['success'] = true;
        else $res['error'] = "Ошибка сохранения {$_POST['name']}";

        echo json_encode($res);
    }

    function delete_group()
    {
        if ($this->check_dev_mode())
        {
            if ($_POST['id'] != "")
            {
                $query = $this->db->prepare("delete from group_options where id=? or id_parent=?");
                if ($query->execute(array($_POST['id'],$_POST['id']))) $res['success'] = true;
                else $res['error'] = "Произошла ошибка при попытке удаления";
            }
            else $res['error'] = "Передан неверный id";
        }
        else $res['error'] = "Включите режим разработчика";

        echo json_encode($res);
    }

    function edit_group()
    {
        if ($this->check_dev_mode())
        {
            if ($_POST['id'] != "")
            {
                $query = $this->db->prepare("select * from group_options where id=?");
                $query->execute(array($_POST['id']));
                if ($group = $query->fetch()) $res['success'] = $this->layout_get("/admin/edit_group.html",array("group" => $group,'act' => 'edit'));
                else $res['error'] = "Произошла ошибка при получении данных";
            }
            else $res['error'] = "Передан неверный id";
        }
        else $res['error'] = "Включите режим разработчика";

        echo json_encode($res);
    }

    function save_group()
    {
        if ($this->check_dev_mode())
        {
            $id = intval($_POST['id']);
            if ($_POST['name'] == "") $res['error'] = "Введите название";

            if (!$res['error'])
            {
                if ($id > 0)
                {
                    $query = $this->db->prepare("update group_options set name=? where id=?");
                    if (!$query->execute(array($_POST['name'],$id))) $res['error'] = "При сохранении возникла ошибка";
                }
                else
                {
                    $query = $this->db->prepare("insert into group_options(name) values(?)");
                    if (!$query->execute(array($_POST['name']))) $res['error'] = "При добавлении возникла ошибка";
                    else
                    {
                        $id = $this->db->lastInsertId();
                        $op = array('id' => $id,'name' => $_POST['name']);
                        $html = $this->layout_get('/admin/elements/group.html',array('op' => $op));
                    }
                }

                if (!$res['error']) $res['success'] = array('name' => $_POST['name'],'id' => $id,'html' => $html);
            }
        }
        else $res['error'] = "Включите режим разработчика";

        echo json_encode($res);
    }

    function save_subgroup()
    {
        if ($this->check_dev_mode())
        {
            $id = intval($_POST['id']);
            if ($_POST['name'] == "") $res['error'] = "Введите название";

            if (!$res['error'])
            {
                if ($id > 0)
                {
                    $query = $this->db->prepare("update group_options set name=?,id_parent=? where id=?");
                    if (!$query->execute(array($_POST['name'],$_POST['category'],$id))) $res['error'] = "При сохранении возникла ошибка";
                }
                else
                {
                    $query = $this->db->prepare("insert into group_options(name,id_parent) values(?,?)");
                    if (!$query->execute(array($_POST['name'],$_POST['category']))) $res['error'] = "При добавлении возникла ошибка";
                }

                if (!$res['error']) $res['success'] = array('name' => $_POST['name'],'id' => $id);
            }
        }
        else $res['error'] = "Включите режим разработчика";

        echo json_encode($res);
    }

    function add_group()
    {
        if ($this->check_dev_mode()) $res['success'] = $this->layout_get("/admin/edit_group.html",array('act' => 'new'));
        else $res['error'] = "Включите режим разработчика";
        echo json_encode($res);
    }

    function add_subgroup()
    {
        if ($this->check_dev_mode())
        {
            if ($_POST['sub_id'] != "")
            {
                $query = $this->db->prepare("select * from group_options where id=?");
                $query->execute(array($_POST['sub_id']));
                $subcategory = $query->fetch();
            }
            else $subcategory['id_parent'] = $_POST['id'];

            $query = $this->db->query("select * from group_options where id_parent='0'");
            $cats = $query->fetchAll();

            $res['success'] = $this->layout_get("/admin/edit_subgroup.html",array('subcategory' => $subcategory,'cats' => $cats));
        }
        else $res['error'] = "Включите режим разработчика";
        echo json_encode($res);
    }

    function check_dev_mode()
    {
        if (defined('TRUE_DEV_MODE') && TRUE_DEV_MODE) return true;
    }
}

