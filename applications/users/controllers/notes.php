<?php
namespace users;

class notes extends \Controller {

    var $limit = 15;
    var $time_limit = 30; //sec
    
    function default_method()
    {
        switch($_POST['act'])
        {
            case "save_note":
                $this->save_note();
                break;
            case "delete_note":
                $this->delete_note();
                break;
            case "add_comment":
                $this->add_comment();
                break;
            case "delete_comment":
                $this->delete_comment();
                break;
            default: $this->all();
        }
    }
    
    function all()
    {
        $this->check_access();
        if ($this->id == "edit_note")
        {
            if ($this->_0)
            {
                $query = $this->db->prepare("select * from users_notes where id=? and id_user=?");
                $query->execute(array($this->_0,$_SESSION['user']['id_user']));
                if (!$note = $query->fetch()) $this->error_page();

                crumbs($note['name'],"/users/notes/show_note/".$note['id']);
                crumbs("Редактирование заметки");
                $this->layout_show("add_note.html",array('note' => $note));
            }
            else
            {
                crumbs("Добавление заметки");
                $this->layout_show("add_note.html");
            }
        }
        else if ($this->id == "show_note")
        {
            $query = $this->db->prepare("select * from users_notes where id=?");
            $query->execute(array($this->_0));
            if (!$note = $query->fetch()) $this->error_page();

            $id = $note['id_user'];
            if ($id != $_SESSION['user']['id_user'])
            {
                $user_cr = $this->get_controller("users");
                $user_cr->check_access_to_profile($id);
                if (!$user = $user_cr->get_user($id)) $this->error_page();

                crumbs("Люди","/users/",true);
                crumbs($user['fio'],"/users/~{$user['id_user']}/");
                crumbs("Заметки","/users/notes/{$user['id_user']}/");
            }
            else $own = true;

            crumbs($note['name']);
            $comments = $this->generate_comments($this->_0);

            $this->layout_show("note.html",array('note' => $note,'own' => $own,'comments' => $comments));
        }
        else
        {
            if ($this->id)
            {
                $id = $this->id;
                if ($id != $_SESSION['user']['id_user'])
                {
                    $user_cr = $this->get_controller("users");
                    $user_cr->check_access_to_profile($id);
                    if (!$user = $user_cr->get_user($this->id)) $this->error_page();

                    crumbs("Люди","/users/",true);
                    crumbs($user['fio'],"/users/~{$user['id_user']}/");
                    crumbs("Заметки","/users/notes/{$user['id_user']}/");
                }
                else $own = true;
            }
            else
            {
                $id = $_SESSION['user']['id_user'];
                $own = true;
            }

            if (isset($_GET['q']) && $_GET['q'] != '')
            {
                $search = explode(" ",$_GET['q']);
                foreach ($search as $s)
                {
                    $s = $this->db->quote("%{$s}%");
                    $search_ar[] = "name LIKE ".$s;
                }
                $where[] = "(".implode("OR ",$search_ar).")";
            }
            $where[] = "id_user=".$this->db->quote($id);
            if (count($where) > 0) $where = "WHERE ".implode(" AND ",$where);

            $total = $this->db->num_rows("users_notes {$where}");

            require_once(ROOT.'libraries/paginator/paginator.php');
            $paginator = new \Paginator($total, $_GET['page'], $this->limit);

            $query = $this->db->prepare("select * from users_notes
                {$where}
                order by created DESC
                LIMIT {$this->limit}
                OFFSET {$paginator->get_range('from')}
            ");
            $query->execute(array($id));
            $notes = $query->fetchAll();

            $this->layout_show("notes.html",array(
                'notes' => $notes,
                'own' => $own,
                'paginator' => $paginator,
                'search' => $_GET['q'],
                'total'=> $total,
            ));
        }
    }

    function save_note()
    {
        $_POST['name'] = trim(strip_tags($_POST['name']));
        require_once(ROOT.'libraries/simple_html_dom.php');
        $html = str_get_html($_POST['text']);
        if ($html)
        {
            foreach($html->find('script') as $element)
            {
                $element->outertext = (string)$element->innertext;
            }
            $_POST['text'] = $html->save();
        }

        if ($_POST['name'] == "") $res['error'][] = "Введите название";
        if ($_POST['text'] == "") $res['error'][] = "Введите текст";

        if ($_POST['mode'] == 'preview')
        {
            if (!$res['success'] = $this->layout_get('elements/note_preview.html', array('note' => $_POST))) $res['error'] = "Ошибка при формировании предпросмотра";
        }
        else if (!$res['error'])
        {
            if ($_POST['id'])
            {
                $query = $this->db->prepare("update users_notes set name=?,text=? where id=? and id_user=?");
                if (!$query->execute(array($_POST['name'],$_POST['text'],$_POST['id'],$_SESSION['user']['id_user']))) $res['error'][] = "Ошибка базы данных";
                else $res['success'] = $_POST['id'];
            }
            else
            {
                $query = $this->db->prepare("insert into users_notes(id_user,name,text,created) values(?,?,?,?)");
                if (!$query->execute(array($_SESSION['user']['id_user'],$_POST['name'],$_POST['text'],time()))) $res['error'][] = "Ошибка базы данных";
                else $res['success'] = $this->db->lastInsertId();
            }
        }

        echo json_encode($res);
    }

    function delete_note()
    {
        $this->check_access();
        $query = $this->db->prepare("delete from users_notes where id=? and id_user=? LIMIT 1");
        if ($query->execute(array($_POST['id'],$_SESSION['user']['id_user']))) $res['success'] = true;
        else $res['error'] = "Ошибка базы данных";

        echo json_encode($res);
    }

    function generate_comments($id)
    {
        $comments = array();
        $query = $this->db->prepare("SELECT c.*,u.nickname,u.fio,u.avatar,u.id_group,gr.name as group_name
                from comments_to_notes as c
                LEFT JOIN users as u ON u.id_user=c.id_user
                LEFT JOIN groups as gr ON gr.id=u.id_group
                where c.id_note=?
                order by c.id ASC
        ");
        $query->execute(array($id));

        while ($row = $query->fetchObject()) $comments[] = $row;
        if($comments) $res = $this->generate_comments_foreach($comments);

        return $res;
    }

    function sort_comments($v1, $v2)
    {
        if($v1->id < $v2->id) return -1;
        elseif($v1->id > $v2->id) return 1;
        else return 0;
    }

    function generate_comments_foreach($a, $res='', $second=false)
    {
        foreach ($a as &$val)
        {
            $res[$val->id]=$val;
            if($val->parent_id)
            {
                if(isset($res[$val->parent_id]))
                {
                    $res[$val->parent_id]->category[$val->id]=$val;
                    uasort($res[$val->parent_id]->category,array($this,'sort_comments'));
                    $children[$val->id]='';
                }
                else $second=true;
            }
        }
        if($second) $res=$this->generate_comments_foreach($a, $res);
        if($children) foreach($children as $key=>$null){
            unset($res[$key]);
        }
        return $res;
    }

    function add_comment()
    {
        $this->check_access();

        $parent = intval($_POST['parent']);
        if ($parent < 1) $parent = null;
        $comment = trim(strip_tags($_POST['comment']));
        $created = strtotime("now");
        $created_test = $created-$this->time_limit;
        $note = intval($_POST['id_note']);

        if ($comment == "") $res['error'] = "Комментарий не может быть пустым";
        if ($_SESSION['last_comment'] > $created_test && $_SESSION['user']['id_group'] != 1) $res['error'] = "Комментарий можно добавлять каждые {$this->time_limit} секунд";

        if ($parent)
        {
            $query = $this->db->prepare("select id from comments_to_notes where id=?");
            $query->execute(array($parent));
            if (!$query->fetch()) $res['error'] = "Комментарий выше был удален";
        }

        if (!$res['error'])
        {
            $query = $this->db->prepare("insert into comments_to_notes(text,parent_id,id_note,id_user,created) values(?,?,?,?,?)");
            if ($query->execute(array($comment,$parent,$note,$_SESSION['user']['id_user'],$created)))
            {
                $insert_id = $this->db->lastInsertId();
                $_SESSION['last_comment'] = $created;
                $query = $this->db->prepare("select c.*,u.nickname,u.fio,u.avatar,u.id_group,gr.name as group_name,n.id_user as note_id_user
                    from comments_to_notes as c
                    LEFT JOIN users as u ON u.id_user=c.id_user
                    LEFT JOIN groups as gr ON gr.id=u.id_group
                    LEFT JOIN users_notes as n ON n.id=c.id_note
                    where c.id = ? LIMIT 1
                ");
                $query->execute(array($insert_id));
                $com = $query->fetch();
                if ($com['note_id_user'] == $_SESSION['user']['id_user']) $own = true;


                /*
                $last_visit = strtotime("now");
                $query = $this->db->prepare("insert into articles_last_visit(id_user,id_article,last_visit) values(?,?,?) ON DUPLICATE KEY UPDATE last_visit=?");
                $query->execute(array($_SESSION['user']['id_user'],$note,$last_visit,$last_visit));
                */

                $res['success'] = $this->layout_get('elements/row.html',array('com' => $com,'ajax' => true,'own' => $own));
            }
            else $res['error'] = "Ошибка базы данных";
        }

        echo json_encode($res);
    }

    function delete_comment()
    {
        $this->check_access();
        $query = $this->db->prepare("select id_note,n.id_user as note_id_user
            from comments_to_notes as co
            LEFT JOIN users_notes as n ON n.id=co.id_note
            where co.id=? LIMIT 1");
        $query->execute(array($_POST['id']));
        $comment = $query->fetch();

        if ($comment['note_id_user'] != $_SESSION['user']['id_user']) $res['error'] = "У Вас недостаточно прав";

        if (!$res['error'])
        {
            $query = $this->db->prepare("delete from comments_to_notes where id=? LIMIT 1");
            if (!$query->execute(array($_POST['id']))) $res['error'] = "Ошибка базы данных";
            else $res['success'] = true;
        }

        echo json_encode($res);
    }
}
