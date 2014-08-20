<?php
namespace projects;

class files extends \Admin {

    var $limit = 10;

    function default_method()
    {
        switch($_POST['act'])
        {
            case "delete_file":
                $this->delete_file();
                break;
            case "get_form_upload":
                $this->get_form_upload();
                break;
            default: $this->show();
        }
    }

    function show()
    {
        if ($_POST && $_FILES['files'])
        {
            $access = $this->get_controller("projects","users")->get_access($_POST['project']);

            if ($access['access']['add_files'])
            {
                $source = $_FILES['files']['tmp_name'][0];
                $finfo = new \finfo(FILEINFO_MIME);
                $type_info = $finfo->file($source);
                $type = explode(";",$type_info);
                $type = $type[0];

                $query = $this->db->prepare("insert into projects_files(created,type,id_project,owner,file,name,size) values(?,?,?,?,?,?,?)");

                if (in_array($type,array('image/png','image/jpeg')))
                {
                    require_once(ROOT.'libraries/imaginator/imaginator.php');

                    $i = new \imaginator($_FILES['files']['tmp_name'][0]);
                    if ($path2 = $i->get('projects_small','projects') && $path3 = $i->get('projects_big','projects'))
                    {
                        $name = basename($path3);
                        $filesize = filesize(ROOT.$path3);
                        if (!$query->execute(array(time(),'image',$_POST['project'],$_SESSION['user']['id_user'],$name,$_FILES['files']['name'][0],$filesize))) $res['error'] = "Ошибка базы данных";
                        else $last = $this->db->lastInsertId();
                    }
                    else
                    {
                        $res['error'] = $i->error;
                        $i->unlink_images(basename($i->name),"projects");
                    }
                }
                else
                {
                    $ext = pathinfo($_FILES['files']['name'][0], PATHINFO_EXTENSION);
                    $name=sha1_file($source).time().".".$ext;

                    $folder = "uploads/projects/".real_path($name,true);

                    if(!is_dir(ROOT.$folder)){
                        if (!mkdir(ROOT.$folder,0777,true)) $res['error'] = "Ошибка создания директории";
                    }

                    $path = ROOT.$folder."/".$name;
                    if (!move_uploaded_file($source, $path)) $res['error'] = "Файл не был перемещен ".$path;
                    else
                    {
                        if (!$query->execute(array(time(),'other',$_POST['project'],$_SESSION['user']['id_user'],$name,$_FILES['files']['name'][0],$_FILES['files']['size'][0]))) $res['error'] = "Ошибка базы данных";
                        else $last = $this->db->lastInsertId();
                    }
                }

                if (!$res['error'])
                {
                    $query = $this->db->prepare("select p.*,u.first_name,u.last_name,u.nickname,g.color,g.name as group_name
                        from projects_files as p
                        LEFT JOIN users as u ON p.owner=u.id_user
                        LEFT JOIN groups as g ON u.id_group=g.id
                        where p.id=?");
                    $query->execute(array($last));
                    $file = $query->fetch();
                    $file['fio'] = build_user_name($file['first_name'],$file['last_name']);
                    $file['size'] = $this->format_file_size($file['size']);

                    $log = $this->get_controller("projects","logs");
                    if ($log)
                    {
                        if ($file['type'] == "image") $path_file = "/uploads/projects/projects_big/".real_path($file['file']);
                        else $path_file = "/uploads/projects/".real_path($file['file']);

                        $log->set_logs("file",$access['project']['id'],"Загружен <a href='{$path_file}'>{$file['name']}</a>");
                    }

                    $res['success'] = $this->layout_get("files/file.html",array('file' => $file,'access' => $access['access'],'to_task' => (bool) $_POST['to_task']));
                }
                else if ($i->name) \imaginator::unlink_images($i->name,"projects");
            }
            else $res['error'] = "У Вас недостаточно прав";

            echo json_encode($res);
        }
        else
        {
            $access = $this->get_controller("projects","users")->get_access($this->id);
            if (!$project = $access['project']) $this->error_page();

            if ($project['owner']) crumbs("Личные проекты","/projects/",true);
            crumbs($project['name'],"/projects/~{$project['id']}/");
            crumbs("Файлы");

            if (isset($_POST['search']) && $_POST['search'] != '')
            {
                $search = explode(" ",$_POST['search']);
                foreach ($search as $s)
                {
                    $s = $this->db->quote("%{$s}%");
                    $search_ar[] = "p.name LIKE ".$s;
                }
                $search_name = "and (".implode("OR ",$search_ar).")";
            }

            $total = $this->db->num_rows("projects_files as p where id_project={$this->db->quote($this->id)} {$search_name}");

            require_once(ROOT.'libraries/paginator/paginator.php');
            $paginator = new \Paginator($total, $_POST['page'], $this->limit);
            if ($paginator->pages < $_POST['page']) $paginator = new \Paginator($total, $paginator->pages, $this->limit);

            $query = $this->db->prepare("select p.*,u.first_name,u.last_name,u.nickname,g.color,g.name as group_name
                from projects_files as p
                LEFT JOIN users as u ON p.owner=u.id_user
                LEFT JOIN groups as g ON u.id_group=g.id
                where p.id_project=? {$search_name}
                order by p.created DESC
                LIMIT {$this->limit}
                OFFSET {$paginator->get_range('from')}
            ");
            $query->execute(array($this->id));
            while ($row = $query->fetch())
            {
                $row['fio'] = build_user_name($row['first_name'],$row['last_name']);
                $row['size'] = $this->format_file_size($row['size']);
                $files[] = $row;
            }

            $data = array(
                'files' => $files,
                'projects' => $this->get_controller("projects")->get_projects($project['id']),
                'project' => $project,
                'files_button' => true,
                'paginator' => $paginator,
                'access' => $access['access']
            );

            if ($_POST)
            {
                if ($text = $this->layout_get('files/files_table.html',$data)) $result['success'] = $text;
                else $result['error'] = "Ничего не найдено";

                echo json_encode($result);
            }
            else $this->layout_show('files/files.html',$data);
        }
    }

    function get_files_count($id_project)
    {
        $query = $this->db->prepare("select SUM(size) as sum_size,count(id) as count from projects_files where id_project=?");
        $query->execute(array($id_project));
        if ($stats = $query->fetch()) $stats['sum_size'] = $this->format_file_size($stats['sum_size']);
        return $stats;
    }

    function delete_file()
    {
        if ($_POST['id'] != "")
        {
            $query = $this->db->prepare("select * from projects_files where id=?");
            $query->execute(array($_POST['id']));
            $file = $query->fetch();

            $access = $this->get_controller("projects","users")->get_access($file['id_project']);

            if ($access['access']['delete_files'])
            {
                $query = $this->db->prepare("delete from projects_files where id=? LIMIT 1");
                if ($query->execute(array($_POST['id'])))
                {
                    if ($file['type'] == "other")
                    {
                        $folder = "uploads/projects";
                        $path = $folder."/".real_path($file['file']);
                        unlink ($path);
                    }
                    else if ($file['type'] == "image")
                    {
                        require_once(ROOT.'libraries/imaginator/imaginator.php');
                        \imaginator::unlink_images($file['file'],"projects");
                    }

                    $log = $this->get_controller("projects","logs");
                    if ($log) $log->set_logs("file",$access['project']['id'],"Удален {$file['name']}");

                    $res['success'] = true;
                }
                else $res['error'] = "Произошла ошибка";
            }
            else $res['error'] = "У Вас недостаточно прав";
        }
        else $res['error'] = "Передан неверный id";

        echo json_encode($res);
    }

    function get_form_upload()
    {
        $res['success'] = $this->layout_get("files/upload_form.html");

        echo json_encode($res);
    }

    function format_file_size($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
    }
}