<?php
namespace users;

class video extends \Admin {

    var $limit = 9;

    function default_method()
    {
        switch($_POST['act'])
        {
            case "add_video":
                $this->add_video();
                break;
            case "get_video":
                $this->get_video();
                break;
            case "delete_video":
                $this->delete_video();
                break;
            default: $this->show();
        }
    }

    function show()
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
                crumbs("Видеозаписи","/users/video/{$user['id_user']}/");
            }
        }
        else $id = $_SESSION['user']['id_user'];

        $count = $this->db->num_rows("users_video where id_user={$this->db->quote($id)}");

        require_once(ROOT.'libraries/paginator/paginator.php');
        $paginator = new \Paginator($count, $_GET['page'], $this->limit);

        $query = $this->db->prepare("select * from users_video
                where id_user=?
                order by id DESC
                LIMIT {$this->limit}
                OFFSET {$paginator->get_range('from')}
        ");
        $query->execute(array($id));
        $files = $query->fetchAll();

        $data = array(
            'files' => $files,
            'total' => $count,
            'paginator' => $paginator,
            'images' => true
        );

        if (!$this->id) $this->check_access();

        if (!$this->id || $this->id == $_SESSION['user']['id_user'])
        {
            $data['own'] = true;
            $this->layout_show('video.html',$data);
        }
        else
        {
            $data['user'] = $user;
            $this->layout_show('video.html',$data);
        }
    }

    function get_video()
    {
        $file['link'] = $_POST['link'];
        $res['success'] = $this->layout_get("video_track.html",array('file' => $file));

        echo json_encode($res);
    }

    function add_video()
    {
        $this->check_access();
        if ($_POST['link'] == "") $res['error'] = "Введите ссылку";

        preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $_POST['link'], $matches);
        if ($matches[0] == "") $res['error'] = "Вы ввели неверную ссылку";
        else
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'http://gdata.youtube.com/feeds/api/videos/'.$matches[0]);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            $response = curl_exec($ch);
            curl_close($ch);

            if ($response)
            {
                $xml   = new \SimpleXMLElement($response);
                $name = (string) $xml->title;
            }
            else $name = false;
        }

        if (!$res['error'])
        {
            $query = $this->db->prepare("insert into users_video (id_user,name,link) values(?,?,?)");
            if (!$query->execute(array($_SESSION['user']['id_user'],$name,$matches[0]))) $res['error'] = "Ошибка база данных";
            else
            {
               // $file = array('id' => $this->db->lastInsertId(),'name' => $name,'link' => $matches[0]);
               // $res['success'] = $this->layout_get("video_track.html",array('file' => $file,'own' => true));
                $res['success'] = true;
            }
        }

        echo json_encode($res);
    }

    function delete_video()
    {
        $this->check_access();
        if ($_POST['id'] != "")
        {
            $query = $this->db->prepare("delete from users_video where id=? and id_user=? LIMIT 1");
            if ($query->execute(array($_POST['id'],$_SESSION['user']['id_user']))) $res['success'] = true;
            else $res['error'] = "Произошла ошибка";
        }
        else $res['error'] = "Передан неверный id";

        echo json_encode($res);
    }
}

