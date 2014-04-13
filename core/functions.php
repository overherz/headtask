<?php
function real_path($file,$sub=false)
{
    $subfolder = mb_substr($file,0,2)."/".mb_substr($file,2,2);

    if (!$sub)
    {
        $path = $subfolder."/".$file;
        return $path;
    }
    else return $subfolder;
}

function lang($string,$vars=false)
{
    $temp_vars = array();
    if ($vars && !is_array($vars)) $temp_vars[0] = $vars;
    else if ($vars && is_array($vars)) $temp_vars = $vars;

    if (key_exists($string, $GLOBALS['lang']))
    {
        if (is_array($GLOBALS['lang'][$string]))
        {
            if (!$temp_vars[0]) $n = 2;
            else $n = plural_form($temp_vars[0]);
            array_unshift($temp_vars, $GLOBALS['lang'][$string][$n]);
        }
        else array_unshift($temp_vars, $GLOBALS['lang'][$string]);

        return call_user_func_array("sprintf",$temp_vars);
    }
    else return sprintf($GLOBALS['lang']['dictionary_not_found'], $string);
}

function plural_form($n) {
    $n = abs($n);
    return $n%10==1&&$n%100!=11?0:($n%10>=2&&$n%10<=4&&($n%100<10||$n%100>=20)?1:2);
}

function long_word($string,$size=25)
{
    //$pattern = "/([^\s]{25})[^\s]+/";
    $string = htmlspecialchars($string, ENT_QUOTES | ENT_SUBSTITUTE);
    $string=iconv("utf-8","windows-1251",$string);
    $string = preg_replace('/([^\s]{25})[^\s]+/', '<span title="$0">$1...</span>', $string);


    //$string = wordwrap($string, $size, '&shy;', true);
    return iconv("windows-1251","utf-8",$string);
}

function get_setting($key,$default=false)
{
    if ($GLOBALS['settings'] && key_exists($key, $GLOBALS['settings'])) return $GLOBALS['settings'][$key]['value'];
    else return $default;

}

function pr($a)
{
    if (is_array($a)) {
        echo "<pre style='background:#fff;padding-top: 50px;'>".print_r($a,true)."</pre>";
    }
    else if (is_object($a))
    {
        $methods = get_class_methods($a);
        $a = (array) $a;
        $a = $a + array('methods' => $methods);
        echo "<pre style='background:#fff;padding-top: 50px;'>".print_r($a,true)."</pre>";
    }
    else echo "<pre style='background:#fff;padding-top: 50px;'>{$a}</pre>";
}

function send_mail($from, $to, $subject, $message, $alias)
{
    $headers="MIME-Version: 1.0\r\n";
    $headers.="Content-type: text/html; charset=utf-8\r\n";
    $alias = mb_encode_mimeheader($alias, "UTF-8");
    $subject = mb_encode_mimeheader($subject, "UTF-8");
    if($from) {
        $headers.="From: {$alias} <{$from}>\r\n";
        $headers.="Return-path: <{$from}>\r\n";
    }
    if (mail($to, $subject, $message, $headers, "-f{$from}")) return true;
}

function debug_mail($text=false)
{
    if(defined('ERROR_TO_MAIL') && ERROR_TO_MAIL)
    {
        $res = "<b>Ошибка на странице:</b> ".WEBROOT.mb_substr($_SERVER['REQUEST_URI'],1)."<br>";
        $res .= $text."<br>";
        if($_SERVER['REMOTE_ADDR']) $res.="<b>IP:</b> ".$_SERVER['REMOTE_ADDR']."<br>";
        $user = $_SESSION['user']?$_SESSION['user']['email'] : $_SERVER['PHP_AUTH_USER'];
        if($user) $res .= "<b>Пользователь:</b> ".$user."<br>";
        if($_SERVER['HTTP_USER_AGENT']) $res.="<b>Агент:</b> ".$_SERVER['HTTP_USER_AGENT']."<br>";
        if($_SERVER['HTTP_REFERER']) {
            $url=parse_url($_SERVER['HTTP_REFERER']);
            $res.="<b>Переход с:</b> <a href='".$_SERVER['HTTP_REFERER']."'>".$url['host']."</a><br><br>";
        }
        if($_SERVER['REQUEST_TIME']) $res.="<b>Зафиксировано:</b> ".date("d.m.Y, H:i:s",$_SERVER['REQUEST_TIME'])."<br><br><b>";

        $res .= get_resources(false,true);

        if($_REQUEST) {
            $res.="<br><br><b><b>REQUEST:</b> <br>";
            foreach ($_REQUEST as $key=>$value) $res.="[{$key}] = {$value}<br>";
            $res.="<br><br>";

        }
        send_mail(ADMIN_MAIL, ADMIN_MAIL, $_SERVER["SERVER_NAME"], $res, ADMIN_MAIL);
    }
}

//обрезание текста до нужного количества символов
function cut($text,$size=256)
{
    $text=htmlspecialchars_decode($text);
    $text=strip_tags(str_replace(array("\n","\t","\r"),"",$text));
    $length=mb_strlen($text);
    if ($length<=$size) return $text;
    else return trim(mb_substr($text,0,$size-3)).'...';
}

function make_path($path)
{
    $ar_replace = array("/","\\");
    $path = str_replace($ar_replace, DS, $path);

    return ROOT.$path;
}

function get_pass($pass,$num=false)
{
    if ($pass == '') return false;
    if (!$num) $num = 16;

    $new = array(
    'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','1','2','3','4','5','6','7','8','9','0','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','!','@','#','$','%','^','&','*','1','2','3','4','5','6','7','8','9','0'
    );
    $anti = array();
    shuffle($new);
    for ($i = 0; $i < $num; $i++) {
            $anti[] = $new[$i];
    }
    $salt = implode($anti);
    $new_pass = md5(md5($pass).md5($salt));
    $uniq_key = md5($new_pass.$salt.time());
    return array('salt' => $salt,'password' => $new_pass,'uniq_key' => $uniq_key);
}

function curl_get_query($url)
{
     $ch = curl_init();
     curl_setopt ($ch, CURLOPT_URL, $url);
     curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
     curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($ch,CURLOPT_TIMEOUT,5);
     $result = curl_exec ($ch);
     curl_close($ch);
     return $result;
}

function get_resources($ajax=false,$return=false)
{
    $count_error = 0;
    $array = $ajax ? $_SESSION['dev'] : $GLOBALS['dev'];

    if (count($array['queries']) > 0 )
    {
        foreach ($array['queries'] as &$g_v)
        {
            $g_v = color_query($g_v);
            if ($g_v['error'][2] != "") $count_error++;
        }
    }

    $count_queries = count($array['queries']);
    $data = array(
        'errors' => $array['errors'],
        'queries' => $array['queries'],
        'time' => substr(($array['end']-$array['start'])*1000,0,6),
        'memory' => substr(($array['memend']-$array['memstart'])/1024/1024,0,6),
        'memory_peak' => substr($array['memory_peak']/1024/1024,0,6),
        'count_queries' => $count_queries,
        'count_error' => $count_error + count($array['errors'])
    );

    if ($return)
    {
        $data['to_email'] = true;
        return layout::layout_get("/core/dev_panel/dev_panel.html",$data);
    }
    else if ($ajax)
    {
        $data['html'] = layout::layout_get("/core/dev_panel/queries.html",array('queries' => $array['queries']));
        unset($_SESSION['dev']);
        echo json_encode($data);
        exit();
    }
    else echo layout::layout_get("/core/dev_panel/dev_panel.html",$data);
}

function color_query($g_v)
{
    $br = "<br class='dev_br'>";

    $g_v = str_ireplace("<","&lt;",$g_v);
    $g_v = str_ireplace(">","&gt;",$g_v);
    $g_v = str_ireplace("ON DUPLICATE KEY UPDATE ","<b style='color:blue !important;'>DUPLICATE KEY UPDATE</b> ",$g_v);
    $g_v = str_ireplace("UPDATE ","<b style='color:blue !important;'>UPDATE</b> ",$g_v);
    $g_v = str_ireplace("SELECT ","<b style='color:green !important;'>SELECT</b> ",$g_v);
    $g_v = str_ireplace("DELETE ","<b style='color:red !important;'>DELETE</b> ",$g_v);
    $g_v = str_ireplace("INSERT ","<b style='color:#ff6600 !important;'>INSERT</b> ",$g_v);
    $g_v = str_ireplace("FROM ","{$br}<b style='color:#660066 !important;'>FROM</b> ",$g_v);
    $g_v = str_ireplace("WHERE ","{$br}<b style='color:#660066 !important;'>WHERE</b> ",$g_v);
    $g_v = str_ireplace("LEFT JOIN ","{$br}<b style='color:#660066 !important;'>LEFT JOIN</b> ",$g_v);
    $g_v = str_ireplace("RIGHT JOIN ","{$br}<b style='color:#660066 !important;'>RIGHT JOIN</b> ",$g_v);
    $g_v = str_ireplace("OUTER JOIN ","{$br}<b style='color:#660066 !important;'>OUTER JOIN</b> ",$g_v);

    return $g_v;
}


function check_mail($mail)
{
    if (preg_match(iconv("utf-8","windows-1251",'/^[а-яa-z0-9]{1}[а-яa-z0-9_\-\.]{1,30}@([а-яa-z0-9\-]{1,30}\.{0,1}[а-яa-z0-9\-]{1,5}){1,3}\.[а-яa-z]{2,5}$/i'),mb_strtolower(iconv("utf-8","windows-1251",$mail)))) return true;
}

function shutdown()
{
    $isError = false;
    if ($error = error_get_last())
    {
        switch($error['type'])
        {
            case E_ERROR:
            case E_CORE_ERROR:
            case E_COMPILE_ERROR:
            case E_USER_ERROR:
            case E_PARSE:
                $isError = true;
                break;
        }
    }

    if ($isError)
    {
        if ($GLOBALS['cli_task_id'])
        {
            \Controller::get_controller("tasks","error")->set_error($error['message']."\n file: ".$error['file']."\n line:  ".$error['line'],$GLOBALS['cli_task_id']);
        }
        else debug($error,true,true);
    }
}


function warning_handler($errno, $errstr, $errfile, $errline)
{
    if (!(error_reporting() & $errno)) {
        return;
    }

    debug(array(
        'message' => $errstr,
        'file' => $errfile,
        'line' => $errline
    ),false,false);

    return true;
}

function debug($error,$send_mail,$fatal)
{
    if ($fatal) set_end_statistic();
    $GLOBALS['dev']['errors'][] = array('err' => $error['message'],'file' => $error['file'],'line' => $error['line'],'type' => $fatal);

    if (php_sapi_name() == "cli" && strpos($GLOBALS['argv'][0],"applications/tasks"))
    {
        \Controller::get_controller("tasks")->set_error($error['message'],$GLOBALS['argv'][1]);
    }
    if ($send_mail) debug_mail();

    if (defined('ADMIN') && ADMIN && $_COOKIE['redirect'])
    {
        setcookie("redirect", "", time() - 3600,"/");
    }
    if (!array_key_exists("ajax",$_GET) && php_sapi_name() != "cli")
    {
        if ($fatal) \Controller::error_page();
    }
    else $_SESSION['dev'] = $GLOBALS['dev'];
}

function crumbs($name,$url=false,$clear=false,$before=false)
{
    $data = array('name' => $name,'url' => $url);
    if (!$clear) $cr = \Controller::get_global("crumbs");

    if (!$before) $cr[] = $data;
    else array_unshift($cr,$data);

    \Controller::set_global('crumbs',$cr);
}

function capitalize($str) {
    $str = mb_strtoupper(mb_substr($str, 0,1)) . mb_substr($str, 1);
    return $str;
}

function check_date($date)
{
    list($dd,$mm,$yy)=explode(".",$date);
    if (is_numeric($yy) && is_numeric($mm) && is_numeric($dd))
    {
        if (!checkdate($mm,$dd,$yy)) return false;
    }
    else return false;

    return true;
}

function convert_date($date,$db_format=false)
{
    if ($date != "")
    {
        if ($db_format) $d = implode('-', array_reverse(explode('.', $date)));
        else $d = implode('.', array_reverse(explode('-', $date)));
        return $d;
    }
}

function request_url()
{
    $result = ''; // Пока результат пуст
    $default_port = 80; // Порт по-умолчанию

    // А не в защищенном-ли мы соединении?
    if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS']=='on')) {
        // В защищенном! Добавим протокол...
        $result .= 'https://';
        // ...и переназначим значение порта по-умолчанию
        $default_port = 443;
    } else {
        // Обычное соединение, обычный протокол
        $result .= 'http://';
    }
    // Имя сервера, напр. site.com или www.site.com
    $result .= $_SERVER['SERVER_NAME'];

    // А порт у нас по-умолчанию?
    if ($_SERVER['SERVER_PORT'] != $default_port) {
        // Если нет, то добавим порт в URL
        $result .= ':'.$_SERVER['SERVER_PORT'];
    }
    // Последняя часть запроса (путь и GET-параметры).
    $result .= $_SERVER['REQUEST_URI'];
    // Уфф, вроде получилось!
    return $result;
}

function set_start_statistic()
{
    $GLOBALS['dev']['memstart'] = memory_get_usage();
    $GLOBALS['dev']['start'] = microtime(true);
}

function set_end_statistic()
{
    $GLOBALS['dev']['memend'] = memory_get_usage();
    $GLOBALS['dev']['end'] = microtime(true);
    $GLOBALS['dev']['memory_peak'] = memory_get_peak_usage();
}

function translit($str,$space=true,$to_lower=true,$bracket=true)
{
    $rus = array('ё','ж','ц','ч','ш','щ','ю','я','Ё','Ж','Ц','Ч','Ш','Щ','Ю','Я');
    $lat = array('yo','zh','tc','ch','sh','sh','yu','ya','YO','ZH','TC','CH','SH','SH','YU','YA');

    if ($space)
    {
        $rus[] = " ";
        $lat[] = "-";
    }

    if ($bracket)
    {
        $rus[] = "(";
        $rus[] = ")";
        $lat[] = "";
        $lat[] = "";
    }

    $rusChars = "АБВГДЕЗИЙКЛМНОПРСТУФХЪЫЬЭабвгдезийклмнопрстуфхъыьэ";
    $latChars = "ABVGDEZIJKLMNOPRSTUFH_I_Eabvgdezijklmnoprstufh_i_e";
    $strLen = mb_strlen( $rusChars );

    for( $i = 0 ; $i < $strLen; $i++ )
    {
        $rus[] = mb_substr( $rusChars, $i, 1 );
        $lat[] = mb_substr( $latChars, $i, 1 );
    }

    if ($to_lower)
    {
        return strtolower(str_replace($rus, $lat, $str));
    }
    else return str_replace($rus, $lat, $str);
}

function safe_name($str, $delimiter = '-', $lowercase = false)
{
    // Redefine vars
    $str       = (string) $str;
    $delimiter = (string) $delimiter;
    $lowercase = (bool) $lowercase;
    $delimiter = (string) $delimiter;

    // Remove tags
    $str = filter_var($str, FILTER_SANITIZE_STRING);

    // Decode all entities to their simpler forms
    $str = html_entity_decode($str, ENT_QUOTES, 'UTF-8');

    // Reserved characters (RFC 3986)
    $reserved_characters = array(
        '/', '?', ':', '@', '#', '[', ']',
        '!', '$', '&', '\'', '(', ')', '*',
        '+', ',', ';', '='
    );

    $str = str_replace($reserved_characters, ' ', $str);
    $str = translit($str);

    // Remove characters
    $str = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $str );
    $str = preg_replace("/[\/_|+ -]+/", $delimiter, $str );
    $str = trim($str, $delimiter);

    if ($lowercase === true) $str = strtolower($str);
    return $str;
}

function do_flush()
{
    static $gzip_handler = null;
    if ($gzip_handler === null)
    {
        $gzip_handler = false;
        $output_handlers = ob_list_handlers();
        if (is_array($output_handlers))
        {
            foreach ($output_handlers AS $handler)
            {
                if ($handler == 'ob_gzhandler')
                {
                    $gzip_handler = true;
                    break;
                }
            }
        }
    }

    if ($gzip_handler)
    {
        // forcing a flush with this is very bad
        return;
    }

    if (ob_get_length() !== false)
    {
        @ob_flush();
    }
    flush();
}