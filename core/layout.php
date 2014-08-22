<?php
require_once(ROOT.'libraries/Twig/Autoloader.php');

class layout {

    static $func_from_text = true;
    static $twig = false;

    private static $settings = array();

    static private function pre_render($path)
    {
        if(file_exists(ROOT.$path) && is_file(ROOT.$path))
        {
            $t = self::run($path);
            return $t;
        }
        else throw new Exception("не найден шаблон ".$path);
    }

    static function layout_show($path, $vars=array())
    {
        if ($t = self::pre_render($path)) $t->display($vars);
    }

    static function layout_get($path, $vars=array())
    {
        if ($t = self::pre_render($path)) return $t->render($vars);
    }

    static function func_from_text($text)
    {
        if (\layout::$func_from_text && $text != "")
        {
            preg_match_all("/\[\[(.*)\]\]/",$text, $data);
            if (count($data) > 0 && $data[1])
            {
                foreach ($data[1] as $d)
                {
                    $call = explode("__",$d);
                    $block = explode(" ",$d);
                    if ($call[0] != "" && $call[1] != "")
                    {
                        include(ROOT."applications/{$call[0]}/config.php");
                        $vars = array_slice($call, 2);
                        $call_alias = $func_from_text[$call[1]];
                        if ($call_alias)
                        {
                            $call_controller = \Controller::get_controller($call_alias['application'],$call_alias['controller'],$call_alias['admin']);
                            $text = str_replace("[[{$d}]]", call_user_func_array(array($call_controller,$call_alias['function']), $vars), $text);
                        }
                    }

                    if ($block[0] == "block" && $block[1] != "")
                    {

                        if ($block_data = \Controller::get_controller("pages","blocks")->render_block($block[1]))
                        {
                            $text = str_replace("[[{$d}]]", $block_data, $text);
                        }
                    }
                }
            }
        }
        return $text;
    }

    static private function set_settings()
    {
        self::$settings = array(
            'cache' => ROOT.'data'.DS.'layouts_cache',
            'autoescape' => true,
            'auto_reload'=> true,
        );
    }

    static private function run($path)
    {
        if (!self::$twig)
        {
            self::set_settings();

            \Twig_Autoloader::register();
            $loader = new \Twig_Loader_Filesystem(ROOT);

            self::$twig = new \Twig_Environment($loader,self::$settings);

            // self functions
            self::$twig->addExtension(new Twig_Extension_StringLoader());
            self::$twig->addFilter('lang', new Twig_Filter_Function('lang'));
            self::$twig->addFilter('cut', new Twig_Filter_Function('cut'));
            self::$twig->addFilter('nl2p', new Twig_Filter_Function('nl2p',array('is_safe' => array('html'))));
            self::$twig->addFilter('real_path', new Twig_Filter_Function('real_path'));
            self::$twig->addFilter('source_path', new Twig_Filter_Function('source_path'));
            self::$twig->addFilter('long_word', new Twig_Filter_Function('long_word',array('is_escaper' => true,'is_safe' => array('all'))));

            self::$twig->addExtension(new Twig_Extension_Optimizer());
            // $twig->addExtension(new Twig_Extension_I18n());
        }

        try {
            return self::$twig->loadTemplate($path);
        }
        catch (Exception $e) {
            if(defined('DEV_MODE') && DEV_MODE) pr($e->getMessage());
            else pr("Возникла критическая ошибка");
        }
    }
}

class app_paths
{
    function path($app, $file)
    {
        if ($file)
        {
            $ext_ar = explode(".",$file);
            $ext = end($ext_ar);
            $path = false;
            $version = false;
            switch($ext)
            {
                case "css":
                    $path = "/applications/{$app}/source/css/";
                    $version = true;
                    break;
                case "js":
                    $path = "/applications/{$app}/source/js/";
                    $version = true;
                    break;
                case "bmp":
                case "gif":
                case "jpg":
                case "png":
                    $path = "/applications/{$app}/source/images/";
                    break;
                case "html":
                    $path = "/applications/{$app}/layouts/";
                    break;
            }

            $path = $path.$file;
            if ($version) $path .= "?v=".get_setting("source_version",1);

            return $path;

        }
    }
}