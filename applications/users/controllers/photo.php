<?php
namespace users;

class photo extends \Admin {

    var $limit = 20;

    function default_method()
    {
        switch($_POST['act'])
        {
            case "delete_photo":
                $this->delete_photo();
                break;
            default: $this->show();
        }
    }

    function show()
    {
        if ($_POST && $_FILES['Filedata'])
        {
            $this->check_access();
            $count = $this->db->num_rows("users_photo where id_user={$this->db->quote($_SESSION['user']['id_user'])}");

            if ($count < $this->limit)
            {
                require_once(ROOT.'libraries/imaginator/imaginator.php');
                $query = $this->db->prepare("insert into users_photo(id_user,file) values(?,?)");

                $i = new \imaginator($_FILES['Filedata']['tmp_name']);
                if ($path3 = $i->get('photo_big','photo'))
                {
                    $ii = new \imaginator(ROOT.$path3);
                    $i_size = getimagesize(ROOT.$path3);
                    if ($i_size[0] >= $i_size[1]) $length_side = $i_size[1];
                    else $length_side = $i_size[0];
                    if ($length_side < $i_size[0]) $m_width = ($i_size[0] - $length_side) / 2 ;
                    if ($length_side < $i_size[1]) $m_height = ($i_size[1] - $length_side) / 2 ;

                    if ($path2 = $ii->get('photo_small','photo',array(0+$m_width,0+$m_height,$length_side+$m_width,$length_side+$m_height)))
                    {
                        $name = basename($path2);
                        if (!$query->execute(array($_SESSION['user']['id_user'],$name))) $res['error'] = "Ошибка базы данных";
                        else $last = $this->db->lastInsertId();
                    }
                    else $res['error'] = $ii->error;
                }
                else $res['error'] = $i->error;

                if (!$res['error'])
                {
                    $file = array('id' => $last,'file' => $name);
                    $res['success'] = $this->layout_get("photo_track.html",array('file' => $file,'own' => true));
                }
                else
                {
                    \imaginator::unlink_images($i->name,"photo");
                }
            }
            else
            {
                $res['error']['text'] = "Достигнут предел количества файлов";
                $res['error']['max'] = true;
            }

            echo json_encode($res);
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
                    crumbs("Фотографии","/users/photo/{$user['id_user']}/");
                }
            }
            else
            {
                $this->check_access();
                $id = $_SESSION['user']['id_user'];
            }

            $query = $this->db->prepare("select * from users_photo where id_user=? order by id DESC");
            $query->execute(array($id));
            $files = $query->fetchAll();
            $count = count($files);

            if (!$this->id || $this->id == $_SESSION['user']['id_user']) $this->layout_show('photo.html',array(
                'files' => $files,
                'session_name' => session_name(),
                'session_id' => session_id(),
                'own' => true,
                'limit' => $count < $this->limit ? false : true
            ));
            else $this->layout_show('photo.html',array('files' => $files,'user' => $user));
        }
    }

    function delete_photo()
    {
        $this->check_access();
        if ($_POST['id'] != "")
        {
            $query = $this->db->prepare("select * from users_photo where id=? and id_user=?");
            $query->execute(array($_POST['id'],$_SESSION['user']['id_user']));
            $photo = $query->fetch();

            $query = $this->db->prepare("delete from users_photo where id=? and id_user=? LIMIT 1");
            if ($query->execute(array($_POST['id'],$_SESSION['user']['id_user'])))
            {
                $count = $this->db->num_rows("users_photo where id_user={$this->db->quote($_SESSION['user']['id_user'])}");
                if ($count < $this->limit) $res['success']['show'] = true;
                if ($count == 0) $res['success']['zero'] = true;
                $res['success']['operation'] = true;

                require_once(ROOT.'libraries/imaginator/imaginator.php');
                \imaginator::unlink_images($photo['file'],"photo");
            }
            else $res['error'] = "Произошла ошибка";
        }
        else $res['error'] = "Передан неверный id";

        echo json_encode($res);
    }
}

