<?php
require_once(ROOT.'libraries/Twig/Autoloader.php');

class layout {

    static $func_from_text = true;

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
        if ($text != "" && \layout::$func_from_text)
        {
            preg_match_all("/\[\[(.*)\]\]/",$text, $data);
            if (count($data) > 0 && $data[1])
            {
                foreach ($data[1] as $d)
                {
                    $call = explode("__",$d);
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
                }
            }
        }
        return $text;
    }

    static private function run($path)
    {
        $settings = array();
        $settings['cache'] = ROOT.'data'.DS.'layouts_cache';
        $settings['autoescape'] = true;
        $settings['auto_reload'] = true;

        Twig_Autoloader::register();
        $loader=new Twig_Loader_Filesystem(ROOT);

        $twig=new Twig_Environment($loader,$settings);

        // self functions
        $twig->addFilter('lang', new Twig_Filter_Function('lang'));
        $twig->addFilter('cut', new Twig_Filter_Function('cut'));
        $twig->addFilter('real_path', new Twig_Filter_Function('real_path'));
        $twig->addFilter('source_path', new Twig_Filter_Function('source_path'));
        $twig->addFilter('long_word', new Twig_Filter_Function('long_word',array('is_escaper' => true,'is_safe' => array('all'))));

        $twig->addExtension(new Twig_Extension_Optimizer());
       // $twig->addExtension(new Twig_Extension_I18n());

        try {
            return $twig->loadTemplate($path);
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
?>
