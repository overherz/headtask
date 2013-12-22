<?php
namespace tasks;

require_once(__DIR__ .'../../../../core/initdata.php');

class tasks extends \Controller {

    function __construct($key,$act=false)
    {
        parent::__construct("tasks","tasks");
        $this->get_options();
        if ($act == "clear" && $key == get_setting('cron_key'))
        {
            $this->db->query("update tasks set status='stand'");
        }
        else if ($key == get_setting('cron_key'))
        {
            $query = $this->db->query("select * from tasks");
            while ($row = $query->fetch())
            {
                $time_stamp = time();

                if ($time_stamp >= $row['next_start'] && $row['status'] == "stand")
                {
                    $script = ROOT."applications".DS."tasks".DS."controllers".DS.$row['controller'].".php";
                    if (!file_exists($script)) continue;
                    else
                    {
                        $command = $this->getPHPExecutableFromPath()." ".$script." {$row['id']} ".get_setting('cron_key')." > /dev/null 2>&1 &";
                        exec($command);
                    }
                }
            }
        }
    }

    function set_status($id,$status,$period=false)
    {
        if ($status == "stand")
        {
            $query = $this->db->prepare("update tasks set status=?,completed=? where id=? LIMIT 1");
            $query->execute(array($status,time(),$id));
        }
        else if ($status == "run")
        {
            require_once(ROOT.'libraries/cron.phar');
            $cron = \Cron\CronExpression::factory($period);
            $next_start = strtotime($cron->getNextRunDate()->format('H:i:s d-m-Y'));

            $query = $this->db->prepare("update tasks set status=?,last_start=?,next_start=?,error_message=null where id=? LIMIT 1");
            $query->execute(array($status,time(),$next_start,$id));
        }
    }

    function get_task($id)
    {
        $query = $this->db->prepare("select * from tasks where id=?");
        $query->execute(array($id));

        return $query->fetch();
    }

    function set_error($message,$id)
    {
        $query = $this->db->prepare("update tasks set status=?,error_message=? where id=? LIMIT 1");
        $query->execute(array('stand',$message,$id));
    }

    function getPHPExecutableFromPath() {
        $paths = explode(PATH_SEPARATOR, getenv('PATH'));
        foreach ($paths as $path) {
            // we need this for XAMPP (Windows)
            if (strstr($path, 'php.exe') && isset($_SERVER["WINDIR"]) && file_exists($path) && is_file($path)) {
                return $path;
            }
            else {
                $php_executable = $path . DIRECTORY_SEPARATOR . "php" . (isset($_SERVER["WINDIR"]) ? ".exe" : "");
                if (file_exists($php_executable) && is_file($php_executable)) {
                    return $php_executable;
                }
            }
        }
        return FALSE; // not found
    }

    function get_options()
    {
        require_once(__DIR__ .'../../../../globals/admin/get_options.php');
    }
}

new tasks($argv[1],$argv[2]);

