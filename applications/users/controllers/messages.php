<?php
namespace users;

class messages extends \Controller {

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
            default: $this->show();
        }
    }

    function show()
    {
        $this->set_global("user_menu", "messages");

        if (!$this->id)
        {
            $query = $this->db->query("select messages.*
                from
                   messages join
                    (
                        select
                            if(id_user='{$_SESSION['user']['id_user']}',to_user,id_user) as user_id_other,
                            max(created) as date_time_max
                            from messages
                        where id_user='{$_SESSION['user']['id_user']}' or to_user='{$_SESSION['user']['id_user']}'
                        group by if(id_user='{$_SESSION['user']['id_user']}',to_user,id_user)
                    ) as t on if(id_user='{$_SESSION['user']['id_user']}',to_user,id_user)=user_id_other and created=date_time_max
                where owner='{$_SESSION['user']['id_user']}' and (id_user='{$_SESSION['user']['id_user']}' or to_user='{$_SESSION['user']['id_user']}')
                order by created DESC
            ");
            while ($row = $query->fetch())
            {
                $row['message'] = cut($row['message'],220);
                $dialogs[] = $row;
                $ids[] = $row['id_user'];
                $ids[] = $row['to_user'];
            }
            if ($ids)
            {
                $ids = array_unique($ids);
                $ids = implode(",",$ids);
                $query = $this->db->query("select id_user,first_name,last_name,avatar,gender from users where id_user IN({$ids})");
                while ($row = $query->fetch())
                {
                    $users[$row['id_user']] = $row;
                    $users[$row['id_user']]['fio'] = build_user_name($row['first_name'],$row['last_name']);
                }
            }
            $this->layout_show("messages.html",array('dialogs' => $dialogs,'users' => $users));
        }
        else
        {
            $id = intval($this->id);
            if ($id > 0)
            {
                $query = $this->db->prepare("select m.*,u.first_name,u.last_name,u.gender,u.id_user,u.avatar from messages as m
                    LEFT JOIN users as u ON u.id_user=m.id_user
                    where m.owner='{$_SESSION['user']['id_user']}' and ((m.to_user=? and m.id_user=?) or (m.to_user=? and m.id_user=?)) order by m.created DESC LIMIT 20");
                $query->execute(array($_SESSION['user']['id_user'],$id,$id,$_SESSION['user']['id_user']));
                $messages = array_reverse($query->fetchAll());

                $query = $this->db->prepare("SELECT count(m.id) as count from messages as m
                    where m.owner='{$_SESSION['user']['id_user']}' and ((m.to_user=? and m.id_user=?) or (m.to_user=? and m.id_user=?))
                    order by m.created DESC");
                $query->execute(array($_SESSION['user']['id_user'],$id,$id,$_SESSION['user']['id_user']));
                $count = $query->fetch();
                $query = $this->db->prepare("SELECT first_name,last_name,avatar,gender from users where id_user = ? limit 1");
                $query->execute(array($id));
                $opavatar = $query->fetch();
                $opavatar['fio'] = build_user_name($opavatar['first_name'],$opavatar['last_name']);

              //  crumbs($opavatar['fio']);

                //clear count of new messages from this opponent
                $query = $this->db->prepare("update messages set be_read='1' where to_user=? and id_user=? and owner=?");
                $query->execute(array($_SESSION['user']['id_user'],$this->id,$_SESSION['user']['id_user']));
            }

            $data = array('messages' => $messages,'opponent' => $this->id,'count' => $count['count'], 'opavatar' => $opavatar);
            $this->layout_show('dialog.html',$data);
        }
    }

    function get_old_messages()
    {
        $last_message = intval($_POST['last']);
        $user = intval($_POST['user']);

        $query = $this->db->prepare("select * from messages as m
            LEFT JOIN users as u ON u.id_user=m.id_user
            where ((m.to_user=? and m.id_user=?) or (m.to_user=? and m.id_user=?)) and m.id < ? and owner=? order by m.created DESC LIMIT 20");
        $query->execute(array($_SESSION['user']['id_user'],$user,$user,$_SESSION['user']['id_user'],$last_message,$_SESSION['user']['id_user']));
        $messages = array_reverse($query->fetchAll());

        $res['success']['html'] = $this->layout_get("elements/dialog_message.html",array('messages' => $messages));
        $res['success']['count'] = count($messages);

        echo json_encode($res);
    }

    function delete_dialog()
    {
        $opponent = intval($_POST['opponent']);
        $query = $this->db->prepare("delete from messages where ((to_user=? and id_user=?) or (to_user=? and id_user=?)) and owner=?");
        if ($query->execute(array($_SESSION['user']['id_user'],$opponent,$opponent,$_SESSION['user']['id_user'],$_SESSION['user']['id_user']))) $res['success'] = true;
        else $res['error'] = "Произошла ошибка при попытке удаления диалога";

        echo json_encode($res);
    }

    function get_not_read_count()
    {
        $query = $this->db->prepare("select count(id) as count from messages where be_read != '1' and to_user=?");
        $query->execute(array($_SESSION['user']['id_user']));
        $count = $query->fetch();
        return $count['count'];
    }
}

