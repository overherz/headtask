<?php
namespace admin\menu;

class menu extends \Admin {

    function default_method()
    {
        switch($_POST['act'])
        {
            case "save_menu":
                $this->save_menu();
                break;
            case "save":
                $this->save();
                break;
            case "delete":
                $this->delete();
                break;
            case "edit":
                $this->edit();
                break;
            case "get_application_ids":
                $this->get_application_ids();
                break;
            default: $this->show_default();
        }
    }

    function show_default()
    {
        $this->layout_show('admin/index.html',array('menu'=>$this->generate_menu()));
    }

    function generate_menu($id = null){
        $query = $this->db->query("select * from menu where target='top' order by position ASC");
        while ($row = $query->fetchObject()) $menu[] = $row;
        if($menu) $res = $this->generate_menu_foreach($menu);
        return $res;
    }

    function sort_menu($v1, $v2){
        if($v1->position < $v2->position) return -1;
        elseif($v1->position > $v2->position) return 1;
        else return 0;
    }

    function generate_menu_foreach($a, $res='', $second=false){
        foreach ($a as &$val){
            $res[$val->id]=$val;
            if($val->parent_id){
                if(isset($res[$val->parent_id])) {
                    $res[$val->parent_id]->category[$val->id]=$val;
                    uasort($res[$val->parent_id]->category,array($this,'sort_menu'));
                    $children[$val->id]='';
                } else $second=true;
            }
        }
        if($second) $res=$this->generate_menu_foreach($a, $res);
        if($children) foreach($children as $key=>$null){
            unset($res[$key]);
        }
        return $res;
    }

    function save_menu()
    {
        if (count($_POST['list']) > 0 && $_POST['position'] > 0)
        {
            $sql = array();
            $sql1 = array();
            foreach ($_POST['list'] as $k => $v)
            {
                if ($v == "root") $v = "0";
                $sql[] = "when {$k} then '{$v}'";
                $sql1[] = "when {$k} then '{$_POST['position'][$k]}'";
            }
            $query = $this->db->prepare("update menu set parent_id= case `id` ".implode(" ",$sql)." end,
                position=case `id` ".implode(" ",$sql1)." end
                where target='top'");

            if ($query->execute())
            {
                $res['success'] = true;
                $log = $this->get_controller("logs");
                if ($log) $log->save_into_log("admin","Меню",true,"Порядок меню был изменен",$_SESSION['admin']['id_user']);
            }
            else $res['error'] = "Ошибка сохранения в базу данных";
        }
        else $res['error'] = "Переданы неверные данные";
        echo json_encode($res);
    }

    function delete()
    {
        if ($_POST['id'] != "")
        {
            $this->db->beginTransaction();
            $childs = $this->childs($_POST['id'],true);
            if (count($childs) > 0)
            {
               $log = $this->get_controller("logs");
               $element = $this->get_element_menu($_POST['id']);

               $delete_ids = implode(",",$childs);
               $query = $this->db->prepare("delete from menu where id IN({$delete_ids})");
               if ($query->execute())
               {
                   if ($log) $log->save_into_log("admin","Меню",true,"Пункт меню \"{$element['name']}\" удален",$_SESSION['admin']['id_user']);
               }
               else $res['error'] = "Ошибка удаления из базы данных";
            }
            else $res['error'] = "Переданы неверные данные";

            if (!$res['error'])
            {
                $this->db->commit();
                $res['success'] = true;
            }
            else $this->db->rollBack();
        }
        else $res['error'] = "Переданы неверные данные";

        echo json_encode($res);
    }

    function get_application_ids($app=false,$value=false)
    {
        if (!$app) $app = $_POST['app'];
        if ($app != "")
        {
            if ($app == "index") $app = "pages";
            $query = $this->db->prepare("select * from `{$app}`");
            $query->execute();
            $ids = $query->fetchAll();
            $res['success'] = $this->layout_get('admin/elements/select_ids.html',array('ids' => $ids,'value' => $value));
        }
        else $res['null'] = true;

        if (isset($_POST['app'])) echo json_encode($res);
        else return $res['success'];
    }

    function save()
    {
        $parent = intval($_POST['parent']);

        if ($_POST['name'] == "") $res['error'] = "Укажите название";
        if ($_POST['url'] == "" || $_POST['application'] == "") $res['error'] = "Укажите ссылку или выберите приложение";

        if (!$res['error'])
        {
            $max_position = 0;
            $query = $this->db->query("select * from menu where target='top' order by position");

            while ($row = $query->fetchObject())
            {
                if ($max_position < $row->position) $max_position = $row->position;
            }
            $max_position++;

            if ($_POST['type'] == "application")
            {
                if ($_POST['application'] == "index") $path = "/";
                else $path = $_POST['value'] ? $_POST['application']."/".$_POST['value'] : $_POST['application'];
            }
            else $path = $_POST['path'];

            if ($_POST['application'] == "pages")
            {
                $query = $this->db->prepare("select path from pages where id=?");
                $query->execute(array($_POST['value']));
                $result = $query->fetch();
                $db_path = $result['path'];
            }
            elseif ($_POST['application'] != "index" && $_POST['type'] == "application") $db_path = "/{$path}/";
            else $db_path = $path;

            $this->db->beginTransaction();

            if ($_POST['id'] != "")
            {
                $query = $this->db->prepare("update menu set name=?,url=?,path=?,application=?,value=?,invisible=?,clickable=?,type=?,new_window=? where id=?");
                if (!$query->execute(array($_POST['name'],$_POST['url'],$db_path,$_POST['application'],$_POST['value'],$_POST['invisible'],$_POST['clickable'],$_POST['type'],$_POST['new_window'],$_POST['id']))) $res['error'] = "Ошибка базы данных";
            }
            else
            {
                $query = $this->db->prepare("insert into menu(parent_id,name,url,position,path,application,value,invisible,clickable,type,new_window,target) values(?,?,?,?,?,?,?,?,?,?,?,?)");
                if(!$query->execute(array($parent,$_POST['name'],$_POST['url'],$max_position,$db_path,$_POST['application'],$_POST['value'],$_POST['invisible'],$_POST['clickable'],$_POST['type'],$_POST['new_window'],'top'))) $res['error'] = "Ошибка базы данных";
            }

            if ($res['error']) $this->db->rollBack();
            else
            {
                $this->db->commit();
                $res['success'] = true;
                $log = $this->get_controller("logs");
                if ($log)
                {
                    if ($_POST['id'] != "")
                    {
                        $element = $this->get_element_menu($_POST['id']);
                        $log->save_into_log("admin","Меню",true,"Отредактирован пункт меню \"{$element['name']}\"",$_SESSION['admin']['id_user']);
                    }
                    else $log->save_into_log("admin","Меню",true,"Добавлен новый пункт меню \"{$_POST['name']}\"",$_SESSION['admin']['id_user']);
                }
            }
        }
        echo json_encode($res);
    }

    function edit()
    {
        $parent = intval($_POST['parent']);

        if ($parent > 0 || isset($_POST['new_menu']))
        {
            if ($_POST['new_menu'] == "false")
            {
                $page = $this->db->query("select * from menu where id='{$parent}'")->fetch();
                if ($page) $values = $this->get_application_ids($page['application'],$page['value']);
                else $res['error'] = "Переданы неверные данные";
            }
            $res['success'] = $this->layout_get('admin/form.html',array('applications' => $this->get_applications(),'parent' => $parent,'page' => $page,'values' => $values));
        }
        else $res['error'] = "Переданы неверные данные";

        echo json_encode($res);
    }

    function get_element_menu($id)
    {
        $query = $this->db->prepare("select * from menu where id=?");
        $query->execute(array($id));
        $element = $query->fetch();

        return $element;
    }

    function childs($id, $with_self=false, $a='', &$res=array()){
        if(!$a){
            $query = $this->db->query("select * from menu order by position");
            while ($row = $query->fetchObject()) $a[] = $row;
        }

        if($a){
            if($with_self && !in_array($id,$res)) $res[]=$id;
            foreach ($a as $val){
                if($val->parent_id==$id){
                    $res[]=$val->id;
                    $this->childs($val->id, $with_self, $a, $res);
                }
            }
            return $res;
        }
    }

    function parents($id, $with_self=false, $a='', &$res=array()){
        if(!$a){
            $query = $this->db->query("select * from menu order by position");
            while ($row = $query->fetchObject()) $a[] = $row;
        }
        if($a){
            if($with_self && !in_array($id,$res)) $res[]=$id;
            foreach ($a as $val){
                if($val->id==$id && $val->parent_id){
                    $res[]=$val->parent_id;
                    $this->parents($val->parent_id, $with_self, $a, $res);
                }
            }
            return $res;
        }
    }
}

