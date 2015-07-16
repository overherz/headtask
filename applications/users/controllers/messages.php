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
            $query = $this->db->prepare("select id_dialog from dialogs_users where id_user=?");
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

                $query = $this->db->query("select m.id_user,m.message,m.id_dialog,m.created from messages as m
                  inner join
                  (select created,id_dialog,id_user,message, max(id) as maxid from messages group by id_dialog) as b ON m.id = b.maxid");
                while ($row = $query->fetch())
                {
                    $dialogs[$row['id_dialog']]['message'] = $row;
                    $dialogs[$row['id_dialog']]['message']['message'] = cut($row['message'],220);
                }

                $query = $this->db->query("select id_dialog,u.id_user,u.first_name,u.last_name,u.avatar,u.gender
                    from dialogs_users as du
                    LEFT JOIN users as u ON du.id_user=u.id_user
                    where id_dialog IN({$ids})");
                while ($row = $query->fetch())
                {
                    $dialogs[$row['id_dialog']]['users'][$row['id_user']] = $row;
                    $dialogs[$row['id_dialog']]['users'][$row['id_user']]['fio'] = build_user_name($row['first_name'],$row['last_name']);
                }
            }

            $this->layout_show("messages.html",array('dialogs' => $dialogs));
        }
        else
        {
            $id = intval($this->id);
            if ($id > 0)
            {
                $query = $this->db->prepare("select m.*,u.first_name,u.last_name,u.gender,u.id_user,u.avatar from messages as m
                    LEFT JOIN users as u ON u.id_user=m.id_user
                    where m.id_dialog=? order by m.created DESC LIMIT 20");
                $query->execute(array($this->id));
                $messages = array_reverse($query->fetchAll());

                /*
                $query = $this->db->prepare("SELECT count(m.id) as count from messages as m
                    where m.owner='{$_SESSION['user']['id_user']}' and ((m.to_user=? and m.id_user=?) or (m.to_user=? and m.id_user=?))
                    order by m.created DESC");
                $query->execute(array($_SESSION['user']['id_user'],$id,$id,$_SESSION['user']['id_user']));
                $count = $query->fetch();
                $query = $this->db->prepare("SELECT first_name,last_name,avatar,gender from users where id_user = ? limit 1");
                $query->execute(array($id));
                $opavatar = $query->fetch();
                $opavatar['fio'] = build_user_name($opavatar['first_name'],$opavatar['last_name']);
                */

                //clear count of new messages from this opponent
//                $query = $this->db->prepare("update messages set be_read='1' where to_user=? and id_user=? and owner=?");
  //              $query->execute(array($_SESSION['user']['id_user'],$this->id,$_SESSION['user']['id_user']));
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

