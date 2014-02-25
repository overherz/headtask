<?php
namespace admin\tasks;

class tasks extends \Admin {

    var $limit = 20;

    function default_method()
    {
        switch($_POST['act'])
        {
            case "add":
                $this->add();
                break;
            case "save":
                $this->save();
                break;
            case "delete":
                $this->delete();
                break;
            case "edit":
                $this->edit();
                break;
            case "run":
                $this->run();
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
            $sql = "where name LIKE ".$s;
        }

        $total= $this->db->num_rows("tasks {$sql}");

        require_once(ROOT.'libraries/paginator/paginator.php');
        $paginator = new \Paginator($total, $_POST['page'], $on_page);
        if ($paginator->pages < $_POST['page']) $paginator = new \Paginator($total, $paginator->pages, $on_page);

        $query = $this->db->query("select * from tasks {$sql} ORDER BY name LIMIT {$on_page} OFFSET {$paginator->get_range('from')}");
        while ($row = $query->fetch())
        {
            $tasks[$row['id']] = $row;
        }

        $form = array(
            'on_page' => array('label' => 'Показывать по','type' => 'select', 'options' => array('10' => '10','20' => '20','30' => '30','50' => '50'), 'selected' => $on_page),
        );

        if (function_exists('posix_getpwuid')) $user_info=posix_getpwuid(posix_getuid());
        else $user_info['name'] = get_current_user();

        if(function_exists('exec')) $exec = true;

        $c_t = $this->get_controller("tasks");
        $cron_string[] = "*/1 * * * * {$user_info['name']} ".$c_t->getPHPExecutableFromPath()." ".dirname(__DIR__)."/tasks.php ".get_setting('cron_key')." {$c_t->get_dev_null()}";
        $cron_string[] = "@reboot {$user_info['name']} sleep 60 && ".$this->get_controller("tasks")->getPHPExecutableFromPath()." ".dirname(__DIR__)."/tasks.php ".get_setting('cron_key')." clear {$c_t->get_dev_null()}";

        $data = array('tasks'=>$tasks, 'total'=>$total,'paginator' => $paginator,'form' => $form,'cron_string' => $cron_string,'exec' => $exec);
        if (!isset($_POST['page']))
        {
            $this->layout_show('admin/tasks.html',$data);
        }
        else
        {
            $res['success'] = $this->layout_get('admin/tasks_table.html',$data);
            echo json_encode($res);
        }
    }

    function add()
    {
        $res['success'] = $this->layout_get('admin/form.html',array('tasks' => $this->get_tasks_list()));
        echo json_encode($res);
    }

    function get_tasks_list()
    {
        $folder = ROOT.'applications/tasks/controllers';
        $list = glob($folder."/*.php");
        foreach ($list as $l)
        {
            $name = basename($l);
            if ($name != "tasks.php") $select[] = str_replace(".php","",$name);
        }

        return $select;
    }

    function edit()
    {
        if ($_POST['id'] != "")
        {
            if ($task = $this->get_tasks($_POST['id']))
            {
                $res['success'] = $this->layout_get('admin/form.html',array('task' => $task,'tasks' => $this->get_tasks_list()));
            }
            else $res['error'] = "Данных не найдено";
        }
        else $res['error'] = "Передан неверный id";

        echo json_encode($res);
    }

    function save()
    {
        if ($_POST['name'] == "") $res['error'] = "Укажите название";
        if ($_POST['period'] == "") $res['error'] = "Укажите параметры запуска";

        require_once(ROOT.'libraries/cron.phar');
        try {
            $cron = \Cron\CronExpression::factory($_POST['period']);
            $next_start = strtotime($cron->getNextRunDate()->format('H:i:s d-m-Y'));
        } catch(\Exception $e) {
            $res['error'] = "Неверные параметры запуска";
        }

        if ($_POST['id'] != "")
        {
            $tasks = $this->get_tasks($_POST['id']);
        }

        if (!$res['error'])
        {
            $log = $this->get_controller("logs");
            if ($log && $_POST['id'] != "")
            {
                if ($tasks['name'] != $_POST['name']) $message = ". Название изменено на \"{$_POST['name']}\"";
            }

            $data = array($_POST['name'],$_POST['controller'],$_POST['period'],$next_start,$_POST['params'],$_POST['info']);

            if ($_POST['id'] != "")
            {
                $query = $this->db->prepare("update tasks set name=?,controller=?,period=?,next_start=?,params=?,info=? where id=?");
                $data[] = $_POST['id'];
            }
            else $query = $this->db->prepare("insert into tasks(name,controller,period,next_start,params,info) values(?,?,?,?,?,?)");

            if ($query->execute($data))
            {
                $res['success'] = true;
                if ($log)
                {
                    if ($_POST['id'] != "")
                    {
                        $log->save_into_log("admin","Задачи",true,"Отредактирована задача \"{$tasks['name']}\"".$message,$_SESSION['admin']['id_user']);
                    }
                    else $log->save_into_log("admin","Задачи",true,"Добавлена задача \"{$_POST['name']}\"",$_SESSION['admin']['id_user']);
                }
            }
            else $res['error'] = "Не удалось сохранить задачу";
        }
        echo json_encode($res);
    }

    function delete()
    {
        if ($_POST['id'] != "")
        {
            $log = $this->get_controller("logs");
            $tasks = $this->get_tasks($_POST['id']);

            $query = $this->db->prepare("delete from tasks where id=? LIMIT 1");
            if ($query->execute(array($_POST['id'])))
            {
                $res['success'] = true;
                if ($tasks['image'] != "")
                {
                    require_once(ROOT.'libraries/imaginator/imaginator.php');
                    \imaginator::unlink_images($tasks['image'],"tasks");
                }
                if ($log) $log->save_into_log("admin","Новости",true,"Удалена новость \"{$tasks['name']}\"",$_SESSION['admin']['id_user']);
            }
            else $res['error'] = "Ошибка базы данных";
        }
        else $res['error'] = "Передан неверный id";

        echo json_encode($res);
    }

    function get_tasks($id)
    {
        $query = $this->db->prepare("select * from tasks where id=?");
        $query->execute(array($id));
        $tasks = $query->fetch();

        return $tasks;
    }

    function run()
    {
        $query = $this->db->prepare("select * from tasks where id=?");
        $query->execute(array($_POST['id']));
        if ($row = $query->fetch())
        {
            if ($row['status'] == "stand")
            {
                $script = ROOT."applications".DS."tasks".DS."controllers".DS.$row['controller'].".php";
                if (!file_exists($script)) $res['error'] = "Скрипт не найден";
                else
                {
                    $c_t = $this->get_controller("tasks");
                    $command = $c_t->getPHPExecutableFromPath()." ".$script." {$row['id']} ".get_setting('cron_key')." {$c_t->get_dev_null()}";
                    exec($command,$output, $return);
                    if (!$return) $res['success'] = true;
                    else $res['error'] = "Возникла ошибка";
                }
            }
            else $res['error'] = "Задача уже запущена";
        }

        echo json_encode($res);
    }
}

