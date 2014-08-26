<?php
namespace tasks;

use global_module\get_options;

require_once(__DIR__ .'../../../../core/initdata.php');

class tasks extends \Controller {

    private $php_path = "D:\OpenServer\modules\php\PHP-5.4.20\php.exe -c D:\OpenServer\userdata\php_for_cli.ini";

    function __construct($key,$act=false)
    {
        parent::__construct("tasks","tasks");
        $this->get_options();
        pr(get_setting('cron_key'));

        if ($key == get_setting('cron_key'))
        {
            $query = $this->db->query("select * from tasks");
            while ($row = $query->fetch())
            {
                $time_stamp = time();

                if ($time_stamp >= $row['next_start'] && !$this->is_process_running($row['pid']))
                {
                    $script = ROOT."applications".DS."tasks".DS."controllers".DS.$row['controller'].".php";
                    if (!file_exists($script)) continue;
                    else
                    {
                        $php_path = $this->getPHPExecutableFromPath();
                        $command = $php_path." ".$script." {$row['id']} ".get_setting('cron_key')." {$this->get_dev_null()}";
                        if ($this->get_os() == "windows")
                        {
                            pclose(popen("start /B cmd /C \"{$command} >NUL 2>NUL\"", 'r'));
                        }
                        else exec($command);
                    }
                }
            }
        }
    }

    function is_process_running($get_pid)
    {
        if ($get_pid == "-1") return false;
        $os = $this->get_os();
        if ($os == "linux")
        {
            exec("ps $get_pid", $ProcessState);
            return(count($ProcessState) >= 2);
        }
        else if ($os == "windows")
        {
            $processes = explode( "\n", shell_exec( "tasklist.exe" ));
            foreach( $processes as $process )
            {
                $matches = false;
                preg_match( "/(.*?)\s+(\d+).*$/", $process, $matches );
                $pid = $matches[ 2 ];
                if ($pid == $get_pid) return true;
            }
        }
    }

    function set_status($id,$status,$period=false,$pid=false)
    {
        if ($status == "stand")
        {
            $query = $this->db->prepare("update tasks set completed=?,pid=? where id=? LIMIT 1");
            $query->execute(array(time(),-1,$id));
        }
        else if ($status == "run")
        {
            require_once(ROOT.'libraries/cron.phar');
            $cron = \Cron\CronExpression::factory($period);
            $next_start = strtotime($cron->getNextRunDate()->format('H:i:s d-m-Y'));

            $query = $this->db->prepare("update tasks set last_start=?,next_start=?,error_message=null,pid=? where id=? LIMIT 1");
            $query->execute(array(time(),$next_start,$pid,$id));
        }
    }

    function get_task($id)
    {
        $query = $this->db->prepare("select * from tasks where id=?");
        $query->execute(array($id));

        return $query->fetch();
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
        return $this->php_path;
    }

    function get_dev_null()
    {
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') $dev_null = "";
        else $dev_null = "> /dev/null 2>&1 &";

        return $dev_null;
    }

    function get_os()
    {
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') return "windows";
        else return "linux";
    }

    function get_options()
    {
        require_once(__DIR__ .'../../../../globals/get_options.php');
        $g = new get_options(true);
        $g->run_module();

    }
}

new tasks($argv[1],$argv[2],$argv[3]);

