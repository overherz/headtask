<?php

class Router {

    static private $application;
    static private $controller;
    static private $id;
    static private $admin;
    static private $url;
    private $second;
    private $route = array();

    function __construct()
    {
        $url = $_SERVER['REQUEST_URI'];
        $url = self::url_parse($url);
        Router::$url = $url;

        $routeArray = explode('/', $url);
        $this->route = array();
        foreach ($routeArray as &$value) if (!empty($value)) $this->route[] = trim($value);

        if(defined('SUBDOMAINS') && SUBDOMAINS && $this->route[0] != 'admin')
        {
            $excluded_app = explode(",",SUBDOMAIN_APP_EXCLUDED);
            if ($this->route[0] == "") Controller::redirect("/".SUBDOMAIN_DEFAULT);
            if (!in_array($this->route[0],$excluded_app))
            {
                $subdomain = array_shift($this->route);
                define('SUBDOMAIN', $subdomain);
                define('WEBROOT',$_SERVER['HTTP_HOST']."/".$subdomain."/");
            }
            else define(strtoupper('webroot'),$_SERVER['HTTP_HOST']."/");
        }
        else define(strtoupper('webroot'),$_SERVER['HTTP_HOST']."/");

        if ($this->route[0] == 'admin') {
            self::$admin = true;
            array_shift($this->route);
            define('ADMIN',true);
        }

        if ($this->route[0])
        {
            if (substr($this->route[0],0,1) == "~")
            {
                self::$id = substr($this->route[0], 1);
                self::$application = "index";
            }
            else self::$application = $this->route[0];

            if ($this->route[1] && $this->route[2])
            {
                if (substr($this->route[1],0,1) == "~") self::$id = substr($this->route[1], 1);
                elseif (preg_match("/^[0-9]+$/",$this->route[1])) self::$id = $this->route[1];
                else {
                    self::$controller = $this->route[1];
                    self::$id = $this->route[2];
                    $this->second = $this->route[2];
                    unset($this->route[2]);
                }
            }
            else if ($this->route[1])
            {
                if (substr($this->route[1],0,1) == "~") self::$id = substr($this->route[1], 1);
                elseif (preg_match("/^[0-9]+$/",$this->route[1])) self::$id = $this->route[1];
                else self::$controller = $this->route[1];
            }
        }
        else self::$application = "index";

        if (!self::$controller) self::$controller = self::$application;

        if (substr(self::$id,0,1) == "~") self::$id = substr(self::$id, 1);

        unset($this->route[0]);
        unset($this->route[1]);
        $this->rules();

        self::run_globals();
        $this->get_application();
    }

    static function url_parse($url,$with_get=false)
    {
        $new_url = $url;
        if(strpos($url,'?')) $question = true;
        if ($question) $new_url = substr($url,0,strpos($url,'?'));
        if (substr($new_url, -1) != "/") $new_url .= "/";
        if ($with_get && $question) $new_url .= substr($url,strpos($url,'?'),mb_strlen($url));
        return $new_url;
    }

    private function rules()
    {
        if (!self::$admin)
        {
            $c = \MyPDO::connect();
            if (self::$url == "/") self::$url = "/index/";
            $query = $c->prepare("select id from pages where path=?");
            $query->execute(array(self::$url));
            $result = $query->fetch();

            if ($result['id'] != "")
            {
                self::$id = $result['id'];
                self::$application = "pages";
                self::$controller = "pages";
            }
        }
    }

    function get_application()
    {
        if ($cr = Controller::get_controller(self::$application, self::$controller, self::$admin, self::$id, $this->route))
        {
            if (self::$admin) $cr->test_access();
            $cr->default_method();
        }
    }

    static function run_globals()
    {
        if (self::$admin) $folder = ROOT.'globals'.DS.'admin'.DS;
        else $folder = ROOT.'globals'.DS;

        foreach (glob($folder."*.php") as $filename) include_once($filename);
    }

    static function application()
    {
        return Router::$application;
    }

    static function controller()
    {
        return Router::$controller;
    }

    static function id()
    {
        return Router::$id;
    }

    static function admin()
    {
        return Router::$admin;
    }

    static function url()
    {
        return Router::$url;
    }

    static function url_array()
    {
        if ($ar = explode("/",\Router::$url))
        {
            foreach ($ar as &$arr)
            {
                if ($arr != "") $return_arr[] = $arr;
            }
            return $return_arr;
        }
    }

    static function get_info()
    {
        pr("app - ".self::$application);
        pr("contr - ".self::$controller);
        pr("id - ".self::$id);
    }
}