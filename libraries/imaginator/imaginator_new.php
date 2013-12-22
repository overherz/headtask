<?php

class imaginator {
    private $rates = array();
    private $types=array('image/jpeg','image/png');
    private $max_filesize=512000;
    private $headers;
    private $file;
    private $func;
    private $name;
    private $mod;
    public $images = array();
    var $error;

    function __construct($path,$mod){
        if(!$path) {
            $this->error('Path not found');
            return false;
        }
        //проверяем соответсвие заданным типам
        $this->file=@getimagesize($path);
        if(!$this->file){
            $this->error(sprintf('%s - not image',$path));
            return false;
        };
        if(!in_array($this->file['mime'],$this->types)) {
            $this->error(sprintf('%s - forbidden type',"<b>{$this->file['mime']}</b>"));
            return false;
        }

        //проверяем соответствие размеру
        if(!@$this->file['size']=filesize($path)){
            $this->file['size']=$this->filesize($path);
        }
        if(!$this->file['size'] || $this->file['size']>$this->max_filesize){
            $tmp=$this->max_filesize/1024;
            $this->error(sprintf('Недопустимый размер файла (меньше %s или более %s КБ)',"<b>1</b>","<b>{$tmp}</b>"));
            return false;
        }

        $this->file['path'] = $path;
        $this->mod = $mod;

        switch($this->file['mime']){
            case 'image/jpeg':
                $this->file['extension']='jpg';
                break;
            case 'image/png':
                $this->file['extension']='png';
                break;
        }

        $this->name = sha1_file($this->file['path']).time().".{$this->file['extension']}";
    }

    function __destruct() {
        if($this->error)return false;
        if(!$this->headers)
        {
            if (substr($file['path'],0,5) == "/tmp/")  unlink($this->file['path']);
        }
    }

    function add_size($name,$width,$height,$quality,$crop=false)
    {
        if (in_array($name,$this->rates)) $this->error = "Такой размер уже существует";
        else $this->rates[$name] = array('width' => $width,'height' => $height,'quality' => $quality,'crop' => $crop);

        return $this;
    }

    function get(){
        if($this->error)return false;
        if(!$this->file['path']){
            $this->error('Не указан путь к изображению');
            return false;
        }
        if(count($this->rates) < 1){
            $this->error('Размеры не заданы');
            return false;
        }

        foreach ($this->rates as $rate_name => $rate)
        {
            $new = $rate;
            if ($this->file[1]<$new['height']) $new['height']=$this->file[1];
            $new['width']=$new['height']*$this->file[0]/$this->file[1];
            if($new['width']>=$rate['width']){
                $new['width']=$rate['width'];
                $new['height']=round($new['width']*$this->file[1]/$this->file[0]);
            }
            $new['width']=round($new['width']);

            $name = $this->name;
            $path="uploads/$this->mod/";
            $this->check_dir($path);
            $path.="{$rate_name}/";
            $this->check_dir($path);

            if(is_file(ROOT.$path.$name) && !is_array($rate['crop'])) $this->images[$rate_name] = "/{$path}{$name}";
            else if (!$this->images[$rate_name] = $this->create($path.$name,$new,$rate['crop'])) $this->unlink_images($this->name, $this->mod);
        }

        return $this;
    }

    function get_crop($image,array $crop,$delete = false)
    {
        if (!is_array($crop) || count($crop) < 5)
        {
            $this->error = "Не переданы координаты";
            return false;
        }

        if (!is_file($image) && is_file(ROOT.$image))
        {
            $this->error = "Укажите исходное изображение";
            return false;
        }
pr($image);
        $crop_image = $this->create_crop($image,$new,$crop);
        if ($delete)
        {
            unlink(ROOT.$image);
            unlink($image);
        }
        return $crop_image;
    }

    private function create_crop($file,$new,$crop,$crop_image,$temp)
    {
        $this->create_image_from_type();

        if ($crop && !$crop_image)
        {
            $im=imagecreatetruecolor($crop[2] - $crop[0],$crop[3] - $crop[1]);
            imagecopyresampled($im,$this->file['source'],0,0,$crop[0],$crop[1],$crop[2] - $crop[0],$crop[3] - $crop[1],$crop[2] - $crop[0],$crop[3] - $crop[1]);
            $temp['width'] = $crop[2] - $crop[0];
            $temp['height'] = $crop[3] - $crop[1];

            //return self::create_crop($file, $new,$crop,$im,$temp);
        }
        //else if ($crop) imagecopyresampled($im,$crop_image,0,0,0,0,400,400,$temp['width'],$temp['height']);

        $func=$this->func;
        if($func=='imagejpeg') $func($im,ROOT.$file,$new['quality']);
        $func($im,ROOT.$file);

        imagedestroy($im);
        return "/{$file}";

    }

    private function create_image_from_type()
    {
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
    }

    private function create($file, $new){

        if (!$im) $im=imagecreatetruecolor($new['width'],$new['height']);

        $this->create_image_from_type();

        if(!$this->file['source']) {
            $this->error(sprintf('Ошибка создания изображения из %s',$this->file['path']));
            return false;
        }

        imagecopyresampled($im,$this->file['source'],0,0,0,0,$new['width'],$new['height'],$this->file[0],$this->file[1]);

        $func=$this->func;
        if($func=='imagejpeg') $func($im,ROOT.$file,$new['quality']);
        else $func($im,ROOT.$file);

        imagedestroy($im);
        return "/{$file}";
    }

    static function unlink_images($name,$mod){
        $path=ROOT."uploads/{$mod}/";
        $handle=opendir($path);

        while(false!==($folder=readdir($handle))){
            if($folder != '.' && $folder != '..' && $folder != ".svn") {
                $file = $path.$folder."/".$name;

                if(is_file($file)){
                    unlink($file);
                    $res++;
                }
            }
        }
        return $res;
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
        debug($text);
    }
}

/*
 * Пример использования:
 * $i=new imaginator('http://www.ebftour.ru/images/load/Image/olen(1).jpg');
 * $a=$i->get('normal','goods');
 * где $a - ссылка на загруженный файл
*/
?>
