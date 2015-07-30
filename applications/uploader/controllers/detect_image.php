<?php
namespace uploader;

class detect_image extends \Controller {

    private $types = array(
        'image/jpeg',
        'image/png'
    );

    function default_method(){
        if ($_POST['data'] != "")
        {
            $_POST['data'] = preg_replace('@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@', '<a href="$1">$1</a>', $_POST['data']);
            preg_match_all("/<[Aa][\s]{1}[^>]*[Hh][Rr][Ee][Ff][^=]*=['\"\s]?([^ \"'>\s#]+)[^>]*>/", $_POST['data'], $match);

            $size = sizeof($match);
            for($i = 1; $i < $size; $i++)
            {
                foreach ($match[$i] as $url)
                {
                    $image_mime = @image_type_to_mime_type(exif_imagetype($url));
                    if (in_array($image_mime,$this->types))
                    {
                        $needle_url = preg_quote($url,'/');
                        $_POST['data'] = preg_replace("/<a href=\"".$needle_url."\">.*<\/a>/i","<img src='{$url}'>",$_POST['data']);
                    }
                }
            }
        }
        $res['success'] = $_POST['data'];

        echo json_encode($res);
    }
}
