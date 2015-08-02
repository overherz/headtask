<?php
namespace uploader;

class detect_image extends \Controller {

    private $types = array(
        'image/jpeg',
        'image/png',
        'image/gif'
    );

    private $proxy = "";

    function default_method(){
        if ($_POST['data'] != "")
        {
            //$_POST['data'] = preg_replace('@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@', '<a href="$1">$1</a>' , $_POST['data']);
            $_POST['data'] = $this->link_it($_POST['data']);
            preg_match_all("/<[Aa][\s]{1}[^>]*[Hh][Rr][Ee][Ff][^=]*=['\"\s]?([^ \"'>\s#]+)[^>]*>/", $_POST['data'], $match);

            $size = sizeof($match);
            for($i = 1; $i < $size; $i++)
            {
                foreach ($match[$i] as $url)
                {
                    $urls[] = $url;
                }
            }
            if ($urls) $this->multi_curl($urls);
        }
        $res['success'] = $_POST['data'];

        echo json_encode($res);
    }

    function short_link($matches)
    {
        //
        return $matches[1] . 'foo';
    }

    function link_it($text)
    {
        $ret = ' ' . $text;
        $ret = preg_replace("#(^|[\n ])([\w]+?://[^ \"\n\r\t<]*)#is", "\\1<a href=\"\\2\">\\2</a>", $ret);
        $ret = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r<]*)#is", "\\1<a href=\"http://\\2\">\\2</a>", $ret);
        $ret = preg_replace("#(^|[\n ])([a-z0-9&\-_.]+?)@([\w\-]+\.([\w\-\.]+\.)*[\w]+)#i", "\\1<a href=\"mailto:\\2@\\3\">\\2@\\3</a>", $ret);
        $ret = substr($ret, 1);

        return $ret;
    }

    public function set_proxy($host_port)
    {
        $this->proxy = $host_port;
    }

    private function multi_curl($urls)
    {
        $curl_handlers = array();

        foreach ($urls as $url)
        {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_HEADER, 1);
            curl_setopt($curl, CURLOPT_NOBODY, 1);
            if (isset($this->proxy) && !$this->proxy == '')
            {
                curl_setopt($curl, CURLOPT_PROXY, $this->proxy);
            }
            $curl_handlers[] = $curl;
        }

        $multi_curl_handler = curl_multi_init();

        foreach($curl_handlers as $key => $curl)
        {
            curl_multi_add_handle($multi_curl_handler,$curl);
        }

        do
        {
            $multi_curl = curl_multi_exec($multi_curl_handler, $active);
        }
        while ($multi_curl == CURLM_CALL_MULTI_PERFORM  || $active);

        foreach($curl_handlers as $curl)
        {
            if(curl_errno($curl) == CURLE_OK)
            {
                $type = curl_getinfo($curl, CURLINFO_CONTENT_TYPE);

                if (in_array($type,$this->types))
                {
                    $url1 = curl_getinfo($curl, CURLINFO_EFFECTIVE_URL);
                    $needle_url = preg_quote($url1,'/');
                    $_POST['data'] = preg_replace("/<a href=\"".$needle_url."\">.*<\/a>/i","<img src='{$url1}'>",$_POST['data']);
                }
            }
        }
        curl_multi_close($multi_curl_handler);
        return true;
    }
}
