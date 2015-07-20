<?php
namespace users;

class messages extends \Controller {

    private $limit = 12;

    function default_method()
    {
        switch($_POST['act'])
        {
            case "get_form":
                echo json_encode(array('success' => $this->layout_get("elements/message_form.html",array('id'=> intval($_POST['id'])))));
                break;
            case "delete_dialog":
                $this->delete_dialog();
                break;
            case "get_old_messages":
                $this->get_old_messages();
                break;
            case "get_form_invite":
                $this->get_form_invite();
                break;
            case "save_dialog_users":
                $this->save_dialog_users();
                break;
            default: $this->show();
        }
    }

    function show()
    {
        $this->set_global("user_menu", "messages");

        if (!$this->id)
        {
            $query = $this->db->prepare("select id_dialog from dialogs_users where id_user=? and user_exit IS NULL");
            $query->execute(array($_SESSION['user']['id_user']));
            while ($row = $query->fetch())
            {
                $dialogs[$row['id_dialog']] = $row;
                $ids[] = $row['id_dialog'];
            }

            if ($ids)
            {
                $ids = array_unique($ids);
                $ids = implode(",",$ids);

                $query = $this->db->query("select m.id_user,m.message,md.id_dialog,m.created from messages as m
                  LEFT JOIN messages_dialogs as md ON md.id_message=m.id
                  inner join
                  (select m.created,m.id_user,m.message, max(m.id) as maxid from messages as m
                    LEFT JOIN messages_dialogs as md ON md.id_message=m.id
                    group by md.id_dialog
                  ) as b ON m.id = b.maxid
                  where md.id_dialog IN({$ids})");
                while ($row = $query->fetch())
                {
                    $dialogs[$row['id_dialog']]['message'] = $row;
                    $dialogs[$row['id_dialog']]['message']['message'] = cut($row['message'],220);
                }

                uasort($dialogs, array($this,"sort_dialogs"));

                $query = $this->db->query("select id_dialog,u.id_user,u.first_name,u.last_name,u.avatar,u.gender
                    from dialogs_users as du
                    LEFT JOIN users as u ON du.id_user=u.id_user
                    where id_dialog IN({$ids})");
                while ($row = $query->fetch())
                {
                    $dialogs[$row['id_dialog']]['users'][$row['id_user']] = $row;
                    $dialogs[$row['id_dialog']]['users'][$row['id_user']]['fio'] = build_user_name($row['first_name'],$row['last_name']);
                }
                $not_read = $this->get_not_read_count_group_dialog();
            }

            $this->layout_show("messages.html",array('dialogs' => $dialogs,'sum' => $not_read['sum'],'not_read' => $not_read['arr']));
        }
        else
        {
            $id = intval($this->id);
            if ($id > 0)
            {
                if ($this->user_dialog_exists($_SESSION['user']['id_user'],$this->id))
                {
                    $query = $this->db->prepare("select m.*,u.first_name,u.last_name,u.gender,u.id_user,u.avatar from messages as m
                    LEFT JOIN messages_dialogs as md ON md.id_message=m.id
                    LEFT JOIN users as u ON u.id_user=m.id_user
                    where md.id_dialog=? and md.id_user=? order by m.created DESC LIMIT 20");
                    $query->execute(array($this->id,$_SESSION['user']['id_user']));
                    while ($row = $query->fetch())
                    {
                        $messages[$row['id']] = $row;
                        $messages[$row['id']]['fio'] = build_user_name($row['first_name'],$row['last_name']);
                    }
                    if ($messages) $messages = array_reverse($messages);

                    $query = $this->db->prepare("select u.first_name,u.last_name,u.gender,u.id_user,u.avatar
                      from dialogs_users as du
                      LEFT JOIN users as u ON u.id_user=du.id_user
                      where id_dialog=?");
                    $query->execute(array($this->id));
                    $i = 1;
                    while ($row = $query->fetch())
                    {
                        $users[$row['id_user']] = $row;
                        $users[$row['id_user']]['fio'] = build_user_name($row['first_name'],$row['last_name']);
                        if ($_SESSION['user']['id_user'] != $row['id_user'] && $i < 5)
                        {
                            $crumbs[] = build_user_name($row['first_name'],$row['last_name']);
                            $i++;
                        }
                    }

                    $count_users = count($users);
                    if ($count_users > 4)
                    {
                        $count_users = count($users) - $i + 1;
                        if ($count_users > 0) $and_other = " и другими ({$count_users})";
                    }

                    crumbs("Диалог c ".implode(", ",$crumbs).$and_other);


                    $query = $this->db->prepare("SELECT count(m.id) as count from messages as m
                     LEFT JOIN messages_dialogs as md ON md.id_message=m.id
                     where md.id_dialog=? and md.id_user=?");
                    $query->execute(array($this->id,$_SESSION['user']['id_user']));
                    $count = $query->fetch();

                    $not_read = $this->get_not_read_count_dialog($this->id);

                    //clear count of new messages from this opponent
                    $query = $this->db->prepare("update messages_dialogs set user_read='1' where id_user=? and id_dialog=? and user_read IS NULL");
                    $query->execute(array($_SESSION['user']['id_user'],$this->id));
                }
                else $this->error_page('404');
            }

            $data = array('messages' => $messages,'id_dialog' => $this->id,'count' => $count['count'],'users' => $users,'not_read' => $not_read);
            $this->layout_show('dialog.html',$data);
        }
    }

    function get_old_messages()
    {
        $last_message = intval($_POST['last']);

        $query = $this->db->prepare("select * from messages as m
            LEFT JOIN messages_dialogs as md ON m.id=md.id_message
            LEFT JOIN users as u ON u.id_user=m.id_user
            where md.id_dialog=? and m.id < ? and m.id_user=? GROUP by m.id order by m.created DESC LIMIT 20");
        $query->execute(array($_POST['id_dialog'],$last_message,$_SESSION['user']['id_user']));
        $messages = array_reverse($query->fetchAll());

        $res['success']['html'] = $this->layout_get("elements/dialog_message.html",array('messages' => $messages));
        $res['success']['count'] = count($messages);

        echo json_encode($res);
    }

    function delete_dialog()
    {
        $this->db->beginTransaction();

        $query = $this->db->prepare("update dialogs_users set user_exit='1' where id_dialog=? and id_user=?");
        if (!$query->execute(array($_POST['id_dialog'],$_SESSION['user']['id_user'])))
            $res['error'] = "Произошла ошибка при попытке удалить диалог";

        $query = $this->db->prepare("delete from messages_dialogs where id_dialog=? and id_user=?");
        if (!$query->execute(array($_POST['id_dialog'],$_SESSION['user']['id_user'])))
            $res['error'] = "Произошла ошибка при попытке удалить диалог";

        if ($res['error']) $this->db->rollBack();
        else
        {
            $this->db->commit();
            $res['success'] = true;
        }

        echo json_encode($res);
    }

    function get_not_read_count()
    {
        $query = $this->db->prepare("select count(id_message) as count from messages_dialogs where id_user=? and user_read IS NULL");
        $query->execute(array($_SESSION['user']['id_user']));
        $count = $query->fetch();
        return $count['count'];
    }

    function get_not_read_count_dialog($id_dialog)
    {
        $query = $this->db->prepare("select count(id_message) as count from messages_dialogs where id_dialog=? and id_user=? and user_read IS NULL");
        $query->execute(array($id_dialog,$_SESSION['user']['id_user']));
        $count = $query->fetch();
        return $count['count'];
    }

    function get_not_read_count_group_dialog()
    {
        $query = $this->db->prepare("select count(id_message) as count,id_dialog from messages_dialogs where id_user=? and user_read IS NULL GROUP by id_dialog");
        $query->execute(array($_SESSION['user']['id_user']));
        $sum = 0;
        while($row = $query->fetch())
        {
            $d[$row['id_dialog']] = $row['count'];
            $sum += $row['count'];
        }
        return array('arr' => $d,'sum' => $sum);
    }

    function get_form_invite()
    {
        if (isset($_POST['search']) && $_POST['search'] != '')
        {
            $search = str_replace(" ","%",$_POST['search']);
            $s = $this->db->quote("%{$search}%");
            $where[] = "(u.first_name LIKE {$s} OR u.last_name LIKE {$s})";
        }

        $ids_from_post = count($_POST['ids']);

        if ($ids_from_post)
        {
            foreach($_POST['ids'] as $v)
            {
                $ids[] = intval($v);
            }
        }

        $query = $this->db->prepare("select u.first_name,u.last_name,u.gender,u.id_user,u.avatar from dialogs_users du
          LEFT JOIN users as u ON du.id_user=u.id_user
          where du.id_dialog=?
          ");
        $query->execute(array($_POST['id_dialog']));
        while ($row = $query->fetch())
        {
            $users_dialog[] = $row;
            $ids[] = $row['id_user'];
        }

        if (count($ids) > 0) $where[] = "cu.id_user NOT IN (".implode(",",$ids).")";
        if (count($where) > 0) $where = "and ".implode(" AND ",$where);
        else $where = "";

        $query = $this->db->prepare("select count(distinct cu.id_user) as count from company_users cu
          LEFT JOIN users as u ON cu.id_user=u.id_user
          where id_company IN (select id_company from company_users where id_user=?) {$where}
          ");
        $query->execute(array($_SESSION['user']['id_user']));
        $total = $query->fetch();

        require_once(ROOT.'libraries/paginator/paginator.php');
        $paginator = new \Paginator($total['count'], $_POST['page'], $this->limit);

        $query = $this->db->prepare("select u.first_name,u.last_name,u.gender,u.id_user,u.avatar from company_users cu
          LEFT JOIN users as u ON cu.id_user=u.id_user
          where id_company IN (select id_company from company_users where id_user=?) {$where}
          GROUP by u.id_user
          LIMIT {$this->limit}
          OFFSET {$paginator->get_range('from')}
          ");
        $query->execute(array($_SESSION['user']['id_user']));
        $users = $query->fetchAll();

        $data = array(
            'users' => $users,
            'users_dialog' => $users_dialog,
            'total' => $total,
            'paginator' => $paginator,
            'search' => $_POST['search'],
            'id_dialog' => intval($_POST['id_dialog']),
            'ids' => $ids
        );

        if (!$_POST['no_search_input'])
        {
            $res['success'] = $this->layout_get("elements/invite_dialog.html",$data);
        }
        else $res['success'] = $this->layout_get("elements/users_table_invite.html",$data);

        echo json_encode($res);
    }

    function save_dialog_users()
    {
        if ($this->user_dialog_exists($_SESSION['user']['id_user'],$_POST['id_dialog']))
        {
            $this->db->beginTransaction();
            $query = $this->db->prepare("insert into dialogs_users (id_user,id_dialog) values(?,?) ON DUPLICATE KEY UPDATE id_user=id_user,id_dialog=id_dialog");
            foreach ($_POST['users'] as $v)
            {
                if ($v != "")
                {
                    if (!$query->execute(array($v,$_POST['id_dialog']))) $res['error'] = "Ошибка базы данных";
                }
            }

            if ($res['error']) $this->db->rollBack();
            else
            {
                $this->db->commit();
                $res['success'] = true;
            }

        }
        else $res['error'] = 'Вы не участвуете в этом диалоге';

        echo json_encode($res);
    }

    function user_dialog_exists($id_user,$id_dialog)
    {
        $query = $this->db->prepare("select * from dialogs_users where id_user=? and id_dialog=? and user_exit IS NULL");
        $query->execute(array($id_user,$id_dialog));
        if ($query->fetch()) return true;
    }

    function sort_dialogs($a, $b)
    {
        return $b['message']['created'] - $a['message']['created'];
    }
}

