<?php
namespace admin\options;

class constructor extends \Admin {
    
    var $types = array(
        'radio',
        'select',
        'text',
        'textarea',
        'checkbox'
    );

    function default_method()
    {
        switch ($_POST['act'])
        {
            case "delete_option":
                $this->delete_option();
                break;
            case "save_options":
                $this->save_options();
                break;
            default: $this->show();
        }
    }
    
    function show()
    {
        if (defined('DEV_MODE') && DEV_MODE)
        {
            $query = $this->db->query("select * from group_options");
            while ($row = $query->fetch())
            {
                if ($row['id_parent']) $options[$row['id_parent']]['sub'][$row['id']] = $row;
                else $options[$row['id']] = $row;
            }

            if ($this->id)
            {
                $query = $this->db->prepare("select * from options where id=? LIMIT 1");
                $query->execute(array($this->id));
                if ($option = $query->fetch())
                {
                    if ($option['type'] == "multy_select") 
                    {
                        $option['type'] = "select";
                        $option['multy_select'] = true;
                    }
                    if ($option['type'] == "select" || $option['type'] == "radio") 
                    {
                        $option['options'] = (array) json_decode($option['options']);
                        $option['value'] = explode(",",$option['value']);
                    }                                        
                }
            }
            $this->layout_show('admin/constructor.html',array(
                'options' => $options,
                'types' => $this->types,
                'option' => $option
            ));                 
        } 
        else $this->layout_show('admin/constructor.html',array('develop' => true));
    }
    
    function delete_option()
    {
        $id = intval($_POST['id']);
        if ($id > 0)
        {
            $query = $this->db->prepare("select * from options where id=?");
            $query->execute(array($id));
            if ($option = $query->fetch())
            {
                if ($option['no_delete']) $res['error'] = "Данную настройку запрещено удалять";
                else
                {
                    $query = $this->db->prepare("delete from options where id=?");
                    if ($query->execute(array($id))) $res['success'] = true;
                    else $res['error'] = "Произошла ошибка при попытке удаления";                                    
                }
            }
            else $res['error'] = "Данные на найдены";
        }
        else $res['error'] = "Передан неверный id";
        
        echo json_encode($res);
    }
        
    function save_options()
    {
        if ($_POST['name'] == "") $res['error'] = "Укажите название";
        if ($_POST['key'] == "") $res['error'] = "Укажите название ключа";
        if ($_POST['group'] < 1) $res['error'] = "Группа неверна";
        if ($_POST['value'] == "null") $res['error'] = "Укажите значение";

        if (!$res['error'])
        {        
            $id = intval($_POST['id']);
            if (in_array($_POST['type'], $this->types)) $type = $_POST['type'];
            if ($type == "select" && $_POST['multiple'] != "false") $type = "multy_select";
            $id_group = intval($_POST['group']);
            if (is_array($_POST['value'])) $_POST['value'] = implode(",",$_POST['value']);
            if ($_POST['options'] != "")
            {
                $ar_op = explode(",",$_POST['options']);
                foreach ($ar_op as &$v) 
                {
                    $v = explode(":::",$v);
                    $op[$v[0]] = $v[1];
                }
                $options = json_encode($op);
            }        

            if ($id > 0) 
            {
                $query = $this->db->prepare("update options set key_name=?,name=?,type=?,options=?,value=?,description=?,id_group=? where id=?");
                if (!$query->execute(array($_POST['key'],$_POST['name'],$type,$options,$_POST['value'],$_POST['description'],$id_group,$id))) $res['error'] = "Произошла ошибка при сохранении '{$_POST['name']}'";
                else $res['success'] = $id;
            }
            else 
            {
                $query = $this->db->prepare("insert into options(key_name,name,type,options,value,description,id_group) values(?,?,?,?,?,?,?)");
                if (!$query->execute(array($_POST['key'],$_POST['name'],$type,$options,$_POST['value'],$_POST['description'],$id_group))) $res['error'] = "Произошла ошибка при добавлении '{$_POST['name']}'";
                else $res['success'] = $this->db->lastInsertId();
            }
            
            if ($res['error'])
            {
                $query = $this->db->prepare("select * from options where key_name=? LIMIT 1");
                $query->execute(array($_POST['key']));
                if ($query->fetch()) $res['error'] .= " Такой ключ уже существует";                
            }
        }        
        echo json_encode($res);
    }
}
