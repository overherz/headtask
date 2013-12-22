<?php
class Controller {

    protected $layout;
    protected $application;
    protected $controller;
    protected $db;
    static protected $redirect = false;
    protected $old_router;

    function __construct($app,$controller,$id=false, $more=false,$real_application=false)
    {
        $this->db = MyPDO::connect();
        if($id) $this->id = $id;
        $this->set_layout_path("applications".DS.$real_application.DS."layouts".DS);
        $this->set_application($app);
        $this->set_controller($controller);

        if($more)
        {
            ksort($more);
            $more = array_values($more);
            foreach($more as $key => $value)
            {
                if($value)
                {
                    $key = '_'.$key;
                    $this->$key = $value;
                }
            }
        }
    }

    function __destruct() {
        if (self::$redirect && !$_GET['ajax']) echo "<meta http-equiv='refresh' content='".self::$redirect['delay']."; url=".self::$redirect['url']."'>";
    }

    public function __toString() {
        pr(get_object_vars($this));
        return "";
    }

    function set_layout_path($path){
        $this->layout = $path;
    }

    function set_application($application){
        $this->application = $application;
    }

    function set_controller($controller){
        $this->controller = $controller;
    }

    static function get_controller($application, $controller=null, $admin_mode=false, $id=false, $more=null)
    {
        $path = ROOT."applications".DS.$application.DS;
        if(file_exists("{$path}/config.php") && is_file("{$path}/config.php")) include ("{$path}/config.php");

        if (!$controller)
        {
            $controller = $application;
        }

        if($admin_mode)
        {
            if ($router_admin[$controller])
            {
                $old_router = array('application' => $application,'controller' => $controller);
                $application = $router_admin[$controller]['application'];
                $controller = $router_admin[$controller]['controller'];
                $path = ROOT."applications".DS.$application.DS;
            }
            $path .= "controllers".DS."admin".DS.$controller.".php";
        }
        else
        {
            if ($router[$controller])
            {
                $old_router = array('application' => $application,'controller' => $controller);
                $application = $router[$controller]['application'];
                $controller = $router[$controller]['controller'];
                $path = ROOT."applications".DS.$application.DS;
            }
            $path.= "controllers".DS.$controller.".php";
        }

        $class = $application."\\".$controller;
        if ($admin_mode) $class = "admin\\".$class;

        if(file_exists($path) && is_file($path))
        {
            include_once($path);

            if ($old_router)
            {
                $real_application = $application;
                $application = $old_router['application'];
                $controller = $old_router['controller'];
            }
            else $real_application = $application;

            return new $class($application,$controller,$id,$more,$real_application);
        }
        else
        {
            $error = array(
                'message' => "Class {$class} not found",
                'file' => __FILE__,
                'line' => __LINE__
            );
            debug($error,false,true);
        }
    }

    function layout_show($layout,$values=null)
    {
        if ($GLOBALS['globals']) $values['globals'] = $GLOBALS['globals'];
        $values['app'] = new \app_paths();
        if ($GLOBALS['settings']) $values['settings'] = $GLOBALS['settings'];
        if ($_POST) $values['post_data'] = $_POST;
        if ($_GET) $values['get_data'] = $_GET;
        layout::layout_show($this->layout.$layout,$values);
    }

    function layout_get($layout,$values=null)
    {
        if ($GLOBALS['globals']) $values['globals'] = $GLOBALS['globals'];
        $values['app'] = new \app_paths();
        if ($GLOBALS['settings']) $values['settings'] = $GLOBALS['settings'];
        if ($_POST) $values['post_data'] = $_POST;
        if ($_GET) $values['get_data'] = $_GET;
        return layout::layout_get($this->layout.$layout,$values);
    }

    static function error_page($num=404, $values=array())
    {
        switch ($num)
        {
            case '404':
                header("HTTP/1.1 404 Not Found");
                break;
        }
        if ($GLOBALS['globals']) $values['globals'] = $GLOBALS['globals'];
        $values['app'] = new \app_paths();
        if ($_SERVER['HTTP_REFERER'] != "") $values['referer'] = $_SERVER['HTTP_REFERER'];
        $values['url'] = request_url();
        layout::layout_show("/error/{$num}.html",$values);
        if(defined('DEV_MODE') && DEV_MODE) {
            get_resources($GLOBALS['start'],$GLOBALS['memstart']);
        }
        exit();
    }

    static function redirect($url='', $delay=0)
    {
        $delay = (int) $delay;
        if(!$delay && !headers_sent()) {
            header('Location: '.$url);
            exit();
        }
        else Controller::$redirect = array('delay' => $delay,'url' => $url);
    }

    static function set_global($key, $val)
    {
        $GLOBALS['globals'][$key] = $val;
        return true;
    }

    static function get_global($key)
    {
        return $GLOBALS['globals'][$key];
    }
}

class Admin extends Controller {
    var $path;

    function set_menu()
    {
        require(ROOT."applications/config.php");
        $handle=opendir(ROOT.'applications/');
        $menu = array();
        while(false!==($mod=readdir($handle)))
        {
            $submenu = array();
            $name = "";
            $path=ROOT."applications/{$mod}/config.php";
            if (is_file($path) && include($path))
            {
                if ($submenu)
                foreach ($submenu as $h => $t)
                {
                    foreach ($t as $k => $g)
                    {
                        if ($k != $mod) $s['url'] = $mod."/".$k;
                        else $s['url'] = $k;

                        $s['name'] = $g;
                        $s['category'] = $name;
                        $s['count'] = count($t);
                        $s['application'] = $mod;
                        $s['sort'] = $s['count'] > 1 ? $name.$g : $g;
                        $menu[$h]['submenu'][] = $s;
                        $applications[$mod] += 1;
                    }
                    
                    if (count($menu[$h]['submenu']) > 1)
                    {
                        uasort($menu[$h]['submenu'],function($a,$b){
                            return strnatcmp(mb_strtolower($a['sort'], 'UTF-8'), mb_strtolower($b['sort'], 'UTF-8'));
                        });                        
                    }
                }
            }
        }

        foreach ($menu as $k => $v)
        {
            if ($menu_names[$k] != "") $menu[$k]['name'] = $menu_names[$k];
            else $menu[$k]['name'] = $k;

            if ($this->controller != $this->application) $this->path = $this->application."/".$this->controller;
            else $this->path = $this->controller;

            if (count ($v['submenu']) > 0);
            foreach ($v['submenu'] as $z => $j)
            {
                if (is_array($_SESSION['admin']['access']) && in_array($j['url'], $_SESSION['admin']['access']))
                {
                    unset($menu[$k]['submenu'][$z]);
                    if (count($menu[$k]['submenu']) > 0)
                    {
                        $applications[$j['application']]--;
                        foreach ($menu[$k]['submenu'] as &$count)
                        {
                            if ($count['application'] == $j['application']) $count['count'] = $applications[$j['application']];
                        }
                    }
                    else unset($menu[$k]);
                    continue;
                }

                if (!$menu[$k]['url']) $menu[$k]['url'] = $j['url'];

                if ($this->path == $j['url'])
                {
                    parent::set_global("submenu", $this->path);
                    parent::set_global("menu", $k);
                    $menu_from_url = true;
                }
                else if ($this->application == $j['url'] && !$menu_from_url)
                {
                    parent::set_global("submenu", $this->application);
                    parent::set_global("menu", $k);
                }
            }
        }

        uasort($menu,function($a,$b){
            return strnatcmp(mb_strtolower($a['name'], 'UTF-8'), mb_strtolower($b['name'], 'UTF-8'));
        });

        parent::set_global("root_menu", $menu);
    }

    function test_access()
    {
        if ($_SESSION['admin'] && ($this->application != "index" || ($this->application == "index" && $this->controller != "index" && $this->controller != "logout")))
        {
            setcookie('redirect', $_SERVER['REDIRECT_URL'], time()+60*60*24*7,"/");
        }
        $session_name = session_name();
        if ($_GET[$session_name])
        {
            if (session_id() && $_GET[$session_name] != session_id()) session_destroy();
            $_COOKIE[$session_name] = $_GET[$session_name];
            session_id($_GET[$session_name]);
            session_start();                    
        }
        
        if ($_SESSION['admin']['id_group'])
        {
            $result = $this->db->query("select u.id_group,u.fio,g.name,g.access,g.access_admin,g.color from users as u LEFT JOIN groups as g ON u.id_group=g.id where u.id_user='{$_SESSION['admin']['id_user']}' LIMIT 1")->fetch();
            if (!$result['access_admin']) unset($_SESSION['admin']);
            else {
                $_SESSION['admin']['fio'] = $result['fio'];
                $_SESSION['admin']['access'] = json_decode($result['access']);
                $_SESSION['admin']['group_name'] = $result['name'];
                $_SESSION['admin']['group_color'] = $result['color'];
            }
        }
        $this->set_menu();

        if (!$_SESSION['admin'] && ($this->application != "index" || ($this->application == "index" && $this->controller != "index")))
        {
            setcookie('redirect', $_SERVER['REQUEST_URI'], time()+60*60*24*7,"/");
            if ($_GET['ajax'] == "on")
            {
                echo json_encode("AdminloginException");
                exit();
            }
            else parent::redirect('/admin/');
        }
        else if (is_array($_SESSION['admin']['access']) && in_array($this->path,$_SESSION['admin']['access']))
        {
            if ($_GET['ajax'] == "on")
            {
                echo json_encode("AdminloginException");
                exit();
            }
            else parent::error_page("admin_denied");
        }
    }

    function get_applications()
    {
        $func = function($value) {
            return str_replace(".php","",$value);
        };

        $folder = ROOT.'applications/';
        if ($files = scandir($folder))
        {
            foreach ($files as $f)
            {
                $name = "";
                if (is_dir($folder.$f) && $f != "." && $f != "..")
                {
                    $file = "{$folder}/{$f}/config.php";
                    if (file_exists($file))
                    {
                        include($file);
                        if ($f != "page")
                        {
                            if ($name != "") $mods[$f]['name'] = $name;
                            $mods[$f]['subapp'] = glob($folder.$f."/controllers/*.php");
                            $mods[$f]['subapp'] = array_map('basename', $mods[$f]['subapp']);
                            $mods[$f]['subapp'] = array_map($func, $mods[$f]['subapp']);
                        }
                    }
                }
            }
        }
        return $mods;
    }
}
?>
