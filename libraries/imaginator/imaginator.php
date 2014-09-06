<?php

class imaginator {
    static private $rates = array(
        'ava_small' => array('width'=>96,'height'=>96,'quality'=>90),
        'tree' => array('width'=>300,'height'=>300,'quality'=>90),
        'ava_profile' => array('width'=>340,'height'=>340,'quality'=>90),
        'ava_comment' => array('width'=>25,'height'=>25,'quality'=>90),
        'ava_middle' => array('width'=>130,'height'=>130,'quality'=>90),
        'tiny'=>array('width'=>50,'height'=>50,'quality'=>85),
        'small'=>array('width'=>100,'height'=>65,'quality'=>90),
        'middle'=>array('width'=>120,'height'=>110,'quality'=>95),
        'normal'=>array('width'=>250,'height'=>240,'quality'=>97),
        'banner'=>array('width'=>265,'height'=>530,'quality'=>98),
        'big_banner'=>array('width'=>650,'height'=>530,'quality'=>99),
        'big'=>array('width'=>1280,'height'=>1024,'quality'=>100),
        'photo_small'=> array('width'=>170,'height'=>170,'quality'=>90),
        'photo_big'=> array('width'=>1920,'height'=>1080,'quality'=>90),
        'documents_small'=> array('width'=>110,'height'=>110,'quality'=>90),
        'documents_big'=> array('width'=>5920,'height'=>5080,'quality'=>90),
        'documents_gallery'=> array('width'=>180,'height'=>180,'quality'=>90),
        'documents_middle'=> array('width'=>500,'height'=>500,'quality'=>90),
        'projects_small'=> array('width'=>100,'height'=>100,'quality'=>90),
        'projects_big'=> array('width'=>5920,'height'=>5080,'quality'=>90),
        'news_big'=> array('width'=>1500,'height'=>1500,'quality'=>90),
        'news_gallery'=> array('width'=>180,'height'=>180,'quality'=>90),
        'news_middle'=> array('width'=>300,'height'=>300,'quality'=>90),
        'news_small'=> array('width'=>110,'height'=>110,'quality'=>90),
    );
    private $types=array('image/jpeg','image/png');
    private $max_filesize=512000;
    private $headers;
    private $file;
    private $func;
    private $crop = array();
    public $name;
    var $error;

    function __construct($path){
        if(!$path) {
            $this->error('Не указан путь к изображению');
            return false;
        }

        //проверяем соответсвие заданным типам
        $this->file=@getimagesize($path);
        if(!$this->file){
            $this->error(sprintf('Файл %s не является изображением',$path));
            return false;
        };
        if(!in_array($this->file['mime'],$this->types)) {
            $this->error(sprintf('%s не является допустимым типом',"<b>{$this->file['mime']}</b>"));
            return false;
        }

        //проверяем соответствие размеру
        if(!@$this->file['size']=filesize($path)){
            $this->file['size']=$this->filesize($path);
        }

        $this->file['path']=$path;

        switch($this->file['mime']){
            case 'image/jpeg':
                $this->file['extension']='jpg';
                break;
            case 'image/png':
                $this->file['extension']='png';
                break;
        }
    }

    function __destruct() {
        if($this->error)return false;
        if(!$this->headers)
        {
            if (substr($this->file['path'],0,5) == "/tmp/")
                if (file_exists($this->file['path'])) unlink($this->file['path']);
        }
    }

    function add_new_size(array $size)
    {
        if (in_array($size[0],imaginator::$rates)) $this->error = "Такой размер уже существует";
        else imaginator::$rates[$size[0]] = array('width' => $size[1],'height' => $size[2],'quality' => $size[3]);
    }

    function man()
    {
        echo "function add_new_size: array(name,width,height,quality (0-100))";
    }

    function get($rate, $mod,$crop=array()){
        if($this->error)return false;
        if(!$this->file['path']){
            $this->error('Не указан путь к изображению');
            return false;
        }
        if(!imaginator::$rates[$rate]){
            $this->error(sprintf('Размеры для %s не существуют',"<b>{$rate}</b>"));
            return false;
        }

        $new=imaginator::$rates[$rate];
        if ($crop) $this->name=basename($this->file['path']);
        else
        {
            if (!$this->name) $this->name=sha1_file($this->file['path']).time().".{$this->file['extension']}";

            if ($this->file[1]<$new['height']) $new['height']=$this->file[1];
            $new['width']=$new['height']*$this->file[0]/$this->file[1];
            if($new['width']>=imaginator::$rates[$rate]['width']){
                $new['width']=imaginator::$rates[$rate]['width'];
                $new['height']=round($new['width']*$this->file[1]/$this->file[0]);
            }
            $new['width']=round($new['width']);
        }

        $name = $this->name;
        $path="uploads/$mod/";
        $this->check_dir($path);
        $path.="{$rate}/";
        $this->check_dir($path);
        $real_path = explode("/",real_path($name,true));
        $path.=$real_path[0]."/";
        $this->check_dir($path);
        $path.=$real_path[1]."/";
        $this->check_dir($path);

        if(is_file(ROOT.$path.$name) && !$crop){
            return "/".$path.$name;
        } else return $this->create($path.$name,$new,$crop);
    }

    static function unlink_images($name,$mod){
        $path=ROOT."uploads/{$mod}/";
        $handle=opendir($path);

        while(false!==($folder=readdir($handle))){
            if($folder != '.' && $folder != '..' && $folder != ".svn") {
                $file = $path.$folder."/".real_path($name);

                if(is_file($file)){
                    unlink($file);
                    $res++;
                }
            }
        }
        return $res;
    }

    private function create($file, $new,$crop,$crop_image=false,$temp=false){
        if ($crop && !$crop_image) $im=imagecreatetruecolor($crop[2] - $crop[0],$crop[3] - $crop[1]);
        if (!$im) $im=imagecreatetruecolor($new['width'],$new['height']);
        if(!$this->file['source'] || !$this->func){
            switch($this->file['mime']){
                case 'image/jpeg':
                    $this->file['source']=imagecreatefromjpeg($this->file['path']);
                    $this->func='imagejpeg';
                    break;
                case 'image/png':
                    imagecolortransparent($im, imagecolorallocate($im, 0, 0, 0));
                    imagealphablending($im, false);
                    imagesavealpha($im, true);
                    $this->file['source']=imagecreatefrompng($this->file['path']);
                    $this->func='imagepng';
                    break;
            }
        }

        if(!$this->file['source']) {
            $this->error(sprintf('Ошибка создания изображения из %s',$this->file['path']));
            return false;
        }
        if ($crop && !$crop_image)
        {
            imagecopyresampled($im,$this->file['source'],0,0,$crop[0],$crop[1],$crop[2] - $crop[0],$crop[3] - $crop[1],$crop[2] - $crop[0],$crop[3] - $crop[1]);
            $temp['width'] = $crop[2] - $crop[0];
            $temp['height'] = $crop[3] - $crop[1];
            return self::create($file, $new,$crop,$im,$temp);
        }
        else if ($crop) imagecopyresampled($im,$crop_image,0,0,0,0,$new['width'],$new['height'],$temp['width'],$temp['height']);
        else imagecopyresampled($im,$this->file['source'],0,0,0,0,$new['width'],$new['height'],$this->file[0],$this->file[1]);

        $func=$this->func;
        if($func=='imagejpeg')$func($im,ROOT.$file,$new['quality']);
        else $func($im,ROOT.$file);
        imagedestroy($im);
        return "/{$file}";
    }

    private function check_dir($dir){
        if(!is_dir(ROOT.$dir)){
            mkdir(ROOT.$dir, 0777);
        }
    }

    private function filesize($url){
        if(!$this->headers)$this->update_headers($url);
        $regexp='/Content-Length:\s([0-9].+?)\s/';
        preg_match($regexp, $this->headers, $res);
        if(!$res[1]) $this->error(sprintf('Не удалось определить размер удаленного файла %s',"<b>{$url}</b>"));
        else return $res[1];
    }

    private function update_headers($url){
        $ch=curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $this->headers=curl_exec($ch);
        curl_close($ch);
    }

    private function error($text){
        $this->error=$text;
    }
}

/*
 * Пример использования:
 * $i=new imaginator('http://www.ebftour.ru/images/load/Image/olen(1).jpg');
 * $a=$i->get('normal','goods');
 * где $a - ссылка на загруженный файл
*/
?>
