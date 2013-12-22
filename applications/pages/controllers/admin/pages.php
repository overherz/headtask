<?php
namespace admin\pages;

class pages extends \Admin {

    var $limit = 10;

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
            {$sql_text} group by p.id ORDER BY name ASC,main DESC LIMIT {$on_page} OFFSET {$paginator->get_range('from')}");
        while ($row = $query->fetch())
        {
            $row['text'] = cut($row['text'],50);
            $pages[$row['id']] = $row;
        }

        $form = array(
            'on_page' => array('label' => 'Показывать по','type' => 'select', 'options' => array('5' => '5','10' => '10','15' => '15','20' => '20'), 'selected' => $on_page),
        );

        $data = array('pages'=>$pages, 'total'=>$total,'paginator' => $paginator,'form' => $form);
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

    function edit()
    {
        if ($_POST['id'] != "")
        {
            $ids = explode("-",$_POST['id']);
            if ($page = $this->get_full_page($ids[0],$ids[1]))
            {
                \layout::$func_from_text = false;
                $res['success'] = $this->layout_get('admin/form.html',array('page' => $page,'show' => true));
            }
            else $res['error'] = "Данных не найдено";
        }
        else $res['error'] = "Передан неверный id";

        echo json_encode($res);
    }

    function save()
    {
        if ($_POST['name'] == "") $res['error'] = "Укажите название";
        if ($_POST['url'] == "") $res['error'] = "Укажите правильную ссылку";
        if ($_POST['text'] == "") $res['error'] = "Текст не может быть пустым";

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
            $data = array($_POST['name'],translit($_POST['url']),$_POST['title'],$_POST['keywords'],$_POST['description']);

            if ($_POST['id'] != "")
            {
                $query = $this->db->prepare("update pages set name=?,url=?,title=?,keywords=?,description=? where id=?");
                $data[] = $_POST['id'];
            }
            else
            {
                $query = $this->db->prepare("insert into pages(name,url,title,keywords,description) values(?,?,?,?,?)");
            }

            $query2 = $this->db->prepare("insert into pages_text(text,created,main,id_page) values(?,?,?,?)");
            $data2 = array($_POST['text'],time(),true);

            $query3 = $this->db->prepare("update pages_text set main = NULL where id_page=?");

            if ($query->execute($data))
            {
                if ($_POST['id'] == "") $data2[] = $this->db->lastInsertId();
                else $data2[] = $_POST['id'];

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
                $page = $this->get_full_page($_POST['id'],$ids[1]);
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

            $query = $this->db->prepare("delete from pages where id=? LIMIT 1");

            $log = $this->get_controller("logs");

            if (!$version || $count < 1)
            {
                if ($query->execute(array($_POST['id'])))
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

    function get_full_page($id,$id_text)
    {
        $query = $this->db->prepare("select p.*,pt.created,pt.main,pt.text,pt.id as id_text from pages as p
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
}

