<?php
namespace admin\pages;

class pages extends \Admin {

    var $limit = 20;

    function default_method()
    {
        switch($_POST['act'])
        {
            case "save":
                $this->save();
                break;
            case "delete":
                $this->delete();
                break;
            case "edit":
                $this->edit();
                break;
            case "add_page":
                $this->add_page();
                break;
            case "show_versions":
                $this->show_versions();
                break;
            case "set_version":
                $this->set_version();
                break;
            case "delete_old_version":
                $this->delete_old_version();
                break;
            default: $this->show();
        }
    }

    function show()
    {
        if (!isset($_POST['on_page'])) $on_page = $this->limit;
        else $on_page = $_POST['on_page'];

        if (isset($_POST['search']) && $_POST['search'] != '')
        {
            $s = $this->db->quote("%{$_POST['search']}%");
            $sql[] = "(text LIKE {$s} OR name LIKE {$s})";
        }
        $sql[] = "main IS NOT NULL";
        if ($sql) $sql_text = "where ".implode(" AND ",$sql);

        $total= $this->db->query("select count(id) as count from pages {$sql}")->fetch();
        $total = $total['count'];

        require_once(ROOT.'libraries/paginator/paginator.php');
        $paginator = new \Paginator($total, $_POST['page'], $on_page);
        if ($paginator->pages < $_POST['page']) $paginator = new \Paginator($total, $paginator->pages, $on_page);

        $query = $this->db->query("select p.*,pt.created,pt.main,pt.text,pt.id as id_text,(select count(id) from pages_text where id_page=p.id) as count from pages as p
            LEFT JOIN pages_text as pt ON pt.id_page=p.id
            {$sql_text} group by p.id ORDER BY path ASC,level ASC,name ASC,main DESC LIMIT {$on_page} OFFSET {$paginator->get_range('from')}");
        while ($row = $query->fetch())
        {
            $row['text'] = cut($row['text'],50);
            $pages[$row['id']] = $row;
        }

        $form = array(
            'on_page' => array('label' => 'Показывать по','type' => 'select', 'options' => array('5' => '5','10' => '10','15' => '15','20' => '20'), 'selected' => $on_page),
        );

        $data = array('pages'=>$pages, 'total'=>$total,'paginator' => $paginator,'form' => $form);
        \layout::$func_from_text = false;
        if (!isset($_POST['page']))
        {
            $this->layout_show('admin/pages.html',$data);
        }
        else
        {
            $res['success'] = $this->layout_get('admin/pages_table.html',$data);
            echo json_encode($res);
        }
    }

    function add_page()
    {
        $res['success'] = $this->layout_get('admin/form.html',array('pages_cat' => $this->get_nested_pages(),'templates' => $this->get_templates()));
        echo json_encode($res);
    }

    function edit()
    {
        if ($_POST['id'] != "")
        {
            $ids = explode("-",$_POST['id']);
            if ($page = $this->get_full_page($ids[0],$ids[1]))
            {
                \layout::$func_from_text = false;
                $res['success'] = $this->layout_get('admin/form.html',array('page' => $page,'show' => true,'pages_cat' => $this->get_nested_pages(),'templates' => $this->get_templates()));
            }
            else $res['error'] = "Данных не найдено";
        }
        else $res['error'] = "Передан неверный id";

        echo json_encode($res);
    }

    function save()
    {
        if ($_POST['name'] == "") $res['error'] = "Укажите название";
        if ($_POST['url'] == "") $_POST['url'] = translit($_POST['name']);
        else $_POST['url'] = translit($_POST['url']);
        if ($_POST['text'] == "") $res['error'] = "Текст не может быть пустым";

        if ($_POST['url'] != "" && !preg_match('/^[a-zA-Z0-9_\-]+$/', $_POST['url'])) $res['error'] = "Обнаружены запрещенные символы";

        $this->db->beginTransaction();
        if (!$res['error'])
        {
            $log = $this->get_controller("logs");
            if ($log && $_POST['id'] != "")
            {
                $page = $this->get_page($_POST['id']);
                if ($page['name'] != $_POST['name']) $message = ". Название изменено на \"{$_POST['name']}\"";
            }

            $_POST['text'] = preg_replace("/[[(.*)]&shy;]/","[[$1]]",$_POST['text']);
            $data = array($_POST['name'],$_POST['url'],$_POST['title'],$_POST['keywords'],$_POST['description'],$_POST['parent_id'],$_POST['template']);

            if ($_POST['id'] != "")
            {
                $query = $this->db->prepare("update pages set name=?,url=?,title=?,keywords=?,description=?,parent_id=?,template=? where id=?");
                $data[] = $_POST['id'];

                $get_old = $this->db->prepare("select url,parent_id from pages where id=?");
                $get_old->execute(array($_POST['id']));
                $old = $get_old->fetch();
            }
            else
            {
                $query = $this->db->prepare("insert into pages(name,url,title,keywords,description,parent_id,template) values(?,?,?,?,?,?,?)");
            }

            $query2 = $this->db->prepare("insert into pages_text(text,created,main,id_page) values(?,?,?,?)");
            $data2 = array($_POST['text'],time(),true);

            $query3 = $this->db->prepare("update pages_text set main = NULL where id_page=?");

            if (!$res['error'])
            if ($query->execute($data))
            {
                if ($_POST['id'] == "") $db_id = $this->db->lastInsertId();
                else $db_id = $_POST['id'];
                $data2[] = $db_id;

                if ($query3->execute(array($_POST['id'])) && $query2->execute($data2))
                {
                    if ($log)
                    {
                        if ($_POST['id'] != "")
                        {
                            $log->save_into_log("admin","Статические страницы",true,"Отредактирована страница \"{$page['name']}\"".$message,$_SESSION['admin']['id_user']);
                        }
                        else $log->save_into_log("admin","Статические страницы",true,"Добавлена страница \"{$_POST['name']}\"",$_SESSION['admin']['id_user']);
                    }
                }
                else $res['error'] = "Не удалось сохранить страницу";
            }
            else $res['error'] = "Не удалось сохранить страницу";

            if ($old['parent_id'] != $_POST['parent_id'] || $old['url'] != $_POST['url'])
            {
                $a_query = $this->db->query("select id,parent_id,name,path,url from pages order by parent_id");
                while ($row = $a_query->fetchObject())
                {
                    $a[] = $row;
                    $urls[$row->id] = $row->url;
                }

                $parents = $this->parents($db_id,false,$a);
                $childs = $this->childs($db_id,false,$a);

                $paths = array();
                if ($parents)
                {
                    $parents = array_reverse($parents);
                    foreach ($parents as $j => $m)
                    {
                        $paths[] = $urls[$m];
                    }
                    $count_paths_p = count($paths);
                    if ($count_paths_p > 0) $path = "/".implode("/",$paths);
                }
                $path = $path."/".$_POST['url']."/";

                if ($childs)
                {
                    foreach ($childs as $j => $m)
                    {
                        $paths = array();
                        $count_paths = 0;
                        $parents = $this->parents($m,true,$a);
                        if ($parents)
                        {
                            $parents = array_reverse($parents);
                            foreach ($parents as $l => $n)
                            {
                                $paths[] = $urls[$n];
                            }
                            $count_paths = count($paths);
                            if ($count_paths > 0) $path_child = "/".implode("/",$paths)."/";
                        }

                        $sql[] = "when {$m} then '{$path_child}'";
                        $sql1[] = "when {$m} then '".($count_paths-1)."'";
                        $update_menu[] = array('path' => $path_child,'value' => $m);
                    }
                    if (!$this->db->query("update pages set path= case `id` ".implode(" ",$sql)." end,
                        level= case `id` ".implode(" ",$sql1)." end
                        where id IN(".implode(",",$childs).")")) $res['error'] = "Ошибка базы данных";
                }

                $query4 = $this->db->prepare("update menu set path=? where application='pages' and value=?");
                $update_menu[] = array('path' => $path,'value' => $db_id);
                foreach ($update_menu as $v)
                {
                    if (!$query4->execute(array($v['path'],$v['value']))) $res['error'] = "Ошибка базы данных";
                }

                if ($path)
                {
                    $dublicate = $this->db->prepare("select id from pages where path=? and id !=?");
                    $dublicate->execute(array($path,$db_id));
                    if ($dublicate->fetch()) $res['error'] = "Страница с таким адресом уже существует";
                    else
                    {
                        $query5 = $this->db->prepare("update pages set path=?,level=? where id=?");
                        if (!$query5->execute(array($path,$count_paths_p,$db_id))) $res['error'] = "Ошибка базы данных";
                    }
                }
            }
        }

        if (!$res['error'])
        {
            $this->db->commit();
            $res['success'] = true;
        }
        else $this->db->rollBack();

        echo json_encode($res);
    }

    function delete()
    {
        if ($_POST['id'] != "")
        {
            $this->db->beginTransaction();
            $ids = explode("-",$_POST['id']);
            if (count($ids) > 1)
            {
                $_POST['id'] = $ids[0];
                $version = true;
                $page = $this->get_full_page($_POST['id'],$ids[1],false);
                $query = $this->db->prepare("delete from pages_text where id=? LIMIT 1");
                if (!$query->execute(array($ids[1]))) $res['error'] = "Произошла ошибка";
                $count = $this->db->num_rows("pages_text where id_page=".$this->db->quote($ids[0]));

                if ($page['main'])
                {
                    $query = $this->db->prepare("select id from pages_text where id_page=? order by created DESC LIMIT 1");
                    $query->execute(array($_POST['id']));
                    if ($main = $query->fetch())
                    {
                        $query = $this->db->prepare("update pages_text set main='1' where id=?");
                        if (!$query->execute(array($main['id']))) $res['error'] = "Произошла ошибка";
                    }
                }
            }
            else $page = $this->get_page($_POST['id']);

            $log = $this->get_controller("logs");

            if (!$version || $count < 1)
            {
                $childs = $this->childs($_POST['id'],true);
                $c_ids = implode(",",$childs);
                $query = $this->db->prepare("delete from pages where id IN({$c_ids})");
                if ($query->execute())
                {
                    if ($log && !$version) $log->save_into_log("admin","Статические страницы",true,"Удалена страница \"{$page['name']}\"",$_SESSION['admin']['id_user']);
                }
                else $res['error'] = "Произошла ошибка";
            }

            if (!$res['error'])
            {
                if ($main) $res['success']['main'] = $main['id'];
                else $res['success'] = true;
                $this->db->commit();
            }
            else $this->db->rollBack();
        }
        else $res['error'] = "Передан неверный id";

        echo json_encode($res);
    }

    function delete_old_version()
    {
        if ($_POST['id_page'] != "")
        {
            $query = $this->db->prepare("delete from pages_text where id_page=? and main IS NULL");
            if ($query->execute(array($_POST['id_page']))) $res['success'] = true;
            else $res['error'] = "Возникла ошибка";
        }
        else $res['error'] = "Передан неверный id";

        echo json_encode($res);
    }

    function get_page($id)
    {
        $query = $this->db->prepare("select name from pages where id=?");
        $query->execute(array($id));
        $page = $query->fetch();

        return $page;
    }

    function get_full_page($id,$id_text,$text=true)
    {
        if ($text) $text_select = ",pt.text";
        $query = $this->db->prepare("select p.*,pt.created,pt.main{$text_select},pt.id as id_text from pages as p
                LEFT JOIN pages_text as pt ON pt.id_page=p.id
                where p.id=? and pt.id=? LIMIT 1");
        $query->execute(array($id,$id_text));

        return $query->fetch();
    }

    function show_versions()
    {
        $query = $this->db->prepare("select p.*,pt.created,pt.main,pt.text,pt.id as id_text from pages as p
            LEFT JOIN pages_text as pt ON pt.id_page=p.id
            where p.id=? ORDER BY created DESC");
        $query->execute(array($_POST['id_page']));
        while ($row = $query->fetch())
        {
            $row['text'] = cut($row['text'],50);
            $pages[$row['id']."_".$row['id_text']] = $row;
            if (!$page_name) $page_name = $row['name'];
        }

        $res['success'] = $this->layout_get('admin/pages_table.html',array('pages' => $pages,'versions' => true,'page_name' => $page_name,'id_page' => $_POST['id_page']));
        echo json_encode($res);
    }

    function set_version()
    {
        if ($_POST['id'] != "")
        {
            $this->db->beginTransaction();
            $ids = explode("-",$_POST['id']);
            if (count($ids) == 2)
            {
                $query = $this->db->prepare("update pages_text set main = NULL where id_page=?");
                if (!$query->execute(array($ids[0]))) $res['error'] = "Произошла ошибка";

                $query = $this->db->prepare("update pages_text set main='1' where id_page=? and id=? LIMIT 1");
                if(!$query->execute(array($ids[0],$ids[1]))) $res['error'] = "Произошла ошибка";

                if (!$res['error'])
                {
                    $this->db->commit();
                    $res['success']['main'] = $ids[1];
                }
                else $this->db->rollBack();
            }
            else $res['error'] = "Переданы неверные данные";
        }
        else $res['error'] = "Переданы неверные данные";

        echo json_encode($res);
    }

    function get_nested_pages()
    {
        $query = $this->db->query("select id,parent_id,name from pages");
        while ($row = $query->fetch()) $pages[$row['id']] = $row;
        if($pages)
        {
            return $this->generate_foreach($pages);
        }
    }

    function generate_foreach(array $listIdParent)
    {
        $to_delete = array();
        foreach ($listIdParent as $id => $node)
        {
            if ($node['parent_id'])
            {
                $listIdParent[$node['parent_id']]['sub'][$id] = &$listIdParent[$id];
                $to_delete[] = $id;
            }
        }

        $final = $listIdParent;

        foreach ($to_delete as $v) unset($final[$v]);
        return $final;
    }

    function parents($id, $with_self=false, $a='', &$res=array()){
        if(!$a){
            $query = $this->db->query("select id,parent_id,name,path from pages order by parent_id");
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

    function childs($id, $with_self=false, $a='', &$res=array()){
        if(!$a){
            $query = $this->db->query("select id,parent_id,name,path from pages order by parent_id");
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

    function get_templates()
    {
        $folder = ROOT."applications/pages/layouts/templates/";
        if ($templates = glob($folder."*.html"))
        {
            foreach ($templates as $t)
            {
                $name = basename($t);
                $pos = strrpos($name, '.');
                if ($pos !== false) $name = substr($name, 0, $pos);
                $templates_name[] = $name;
            }
        }

        return $templates_name;
    }
}

