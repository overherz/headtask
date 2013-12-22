<?php
namespace users;

class audio extends \Admin {

    var $limit = 50;

    function default_method()
    {
        switch($_POST['act'])
        {
            case "delete_audio":
                $this->delete_audio();
                break;
            default: $this->show();
        }
    }

    function show()
    {
        if ($_POST && $_FILES['Filedata'])
        {
            $this->check_access();
            $source = $_FILES['Filedata']['tmp_name'];
            $finfo = new \finfo(FILEINFO_MIME);
            $type_info = $finfo->file($source);
            $type = explode(";",$type_info);
            $type = $type[0];

            $query = $this->db->prepare("insert into users_audio(id_user,artist,name,file) values(?,?,?,?)");

            if ($type == 'audio/mpeg')
            {
                $count = $this->db->num_rows("users_audio where id_user={$this->db->quote($_SESSION['user']['id_user'])}");
                if ($count < $this->limit)
                {
                    $ext = pathinfo($_FILES['Filedata']['name'], PATHINFO_EXTENSION);
                    $name=sha1_file($source).time().".".$ext;

                    require_once(ROOT.'libraries/getid3/getid3.php');
                    $getid3 = new \getID3();
                    $getid3->encoding_id3v1 = 'UTF-8';
                    $getid3->encoding = 'UTF-8';
                    $info = $getid3->Analyze($source);

                    $mp3_artist =  $info['tags']['id3v2']['artist'][0] ? $info['tags']['id3v2']['artist'][0] : iconv("Windows-1251","utf-8",$info['tags']['id3v1']['artist'][0]);;
                    $mp3_name = $info['tags']['id3v2']['title'][0] ? $info['tags']['id3v2']['title'][0] : iconv("Windows-1251","utf-8",$info['tags']['id3v1']['title'][0]);

                    if(!is_dir(ROOT."uploads/audio")){
                        if (!mkdir(ROOT."uploads/audio")) $res['error'] = "Ошибка создания директории";
                    }

                    $real_path = explode("/",real_path($name,true));
                    $folder = "uploads/audio/".$real_path[0]."/";

                    if(!is_dir(ROOT.$folder)){
                        if (!mkdir(ROOT.$folder)) $res['error'] = "Ошибка создания директории";
                    }

                    $folder .= $real_path[1]."/";

                    if(!is_dir(ROOT.$folder)){
                        if (!mkdir(ROOT.$folder)) $res['error'] = "Ошибка создания директории";
                    }


                    $path = $folder.$name;
                    if (!move_uploaded_file($source, ROOT.$path)) $res['error'] = 'Файл не был перемещен';
                    else
                    {
                        if (!$query->execute(array($_SESSION['user']['id_user'],$mp3_artist,$mp3_name,$name))) $res['error'] = "Ошибка базы данных";
                        else
                        {
                            $file = array('id' => $this->db->lastInsertId(),'name' => $mp3_name,'artist' => $mp3_artist,'file' => $name,'id_user' => $_SESSION['user']['id_user']);
                            $res['success'] = $this->layout_get("audio_track.html",array('file' => $file,'own' => true));
                        }
                    }
                }
                else
                {
                    $res['error']['text'] = "Достигнут предел количества файлов";
                    $res['error']['max'] = true;
                }
            }
            else $res['error'] = "Неверный формат файла ".$type;
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
                    crumbs("Аудиозаписи","/users/audio/{$user['id_user']}/");
                }
            }
            else
            {
                $this->check_access();
                $id = $_SESSION['user']['id_user'];
            }

            $query = $this->db->prepare("select * from users_audio where id_user=? order by id DESC");
            $query->execute(array($id));
            $files = $query->fetchAll();
            $count = count($files);

            if (!$this->id || $this->id == $_SESSION['user']['id_user']) $this->layout_show('audio.html',array(
                'files' => $files,
                'session_name' => session_name(),
                'session_id' => session_id(),
                'own' => true,
                'limit' => $count < $this->limit ? false : true
            ));
            else $this->layout_show('audio.html',array('files' => $files,'user' => $user));
        }
    }

    function delete_audio()
    {
        $this->check_access();
        if ($_POST['id'] != "")
        {
            $query = $this->db->prepare("select * from users_audio where id=? and id_user=?");
            $query->execute(array($_POST['id'],$_SESSION['user']['id_user']));
            $audio = $query->fetch();

            $query = $this->db->prepare("delete from users_audio where id=? and id_user=? LIMIT 1");
            if ($query->execute(array($_POST['id'],$_SESSION['user']['id_user'])))
            {
                $count = $this->db->num_rows("users_audio where id_user={$this->db->quote($_SESSION['user']['id_user'])}");
                if ($count < $this->limit) $res['success']['show'] = true;
                if ($count == 0) $res['success']['zero'] = true;
                $res['success']['operation'] = true;
                $folder = "uploads/audio";
                $path = $folder."/".real_path($audio['file']);
                unlink ($path);
            }
            else $res['error'] = "Произошла ошибка";
        }
        else $res['error'] = "Передан неверный id";

        echo json_encode($res);
    }
}

