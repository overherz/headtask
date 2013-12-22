<?php

class imaginator {
    static private $rates = array(
        'tiny'=>array('width'=>50,'height'=>50,'quality'=>70),
        'small'=>array('width'=>100,'height'=>65,'quality'=>75),
        'middle'=>array('width'=>120,'height'=>110,'quality'=>75),
        'normal'=>array('width'=>250,'height'=>240,'quality'=>80),
        'banner'=>array('width'=>265,'height'=>530,'quality'=>85),
        'big_banner'=>array('width'=>650,'height'=>530,'quality'=>90),
        'big'=>array('width'=>1280,'height'=>1024,'quality'=>95),
    );
    private $types=array('image/jpeg','image/png');
    private $max_filesize=512000;
    private $headers;
    private $file;
    private $func;
    private $format_array = array('jpg','png');
    var $error;

    function __construct($path,$format=false){
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
        if(!$this->file['size'] || $this->file['size']>$this->max_filesize){
            $tmp=$this->max_filesize/1024;
            $this->error(sprintf('Недопустимый размер файла (меньше %s или более %s КБ)',"<b>1</b>","<b>{$tmp}</b>"));
            return false;
        }
        
        $this->file['path']=$path;
        $this->rates=imaginator::$rates;

        if (in_array($format,$this->format_array))
        {
            $this->file['extension'] = $format;
        }
        else
        {
            switch($this->file['mime']){
                case 'image/jpeg':
                    $this->file['extension']='jpg';
                    break;
                case 'image/png':
                    $this->file['extension']='png';
                    break;
            }
        }
    }

    function __destruct() {
        if($this->error)return false;
        if(!$this->headers) unlink($this->file['path']);
    }

    function get($rate='normal', $mod=''){
        if($this->error)return false;
        if(!$this->file['path']){
            $this->error('Не указан путь к изображению');
            return false;
        }
        if(!$this->rates[$rate]){
            $this->error(sprintf('Размеры для %s не существуют',"<b>{$rate}</b>"));
            return false;
        }
        
        $new=$this->rates[$rate];
        if ($this->file[1]<$new['height']) $new['height']=$this->file[1];
        $new['width']=$new['height']*$this->file[0]/$this->file[1];
        if($new['width']>$this->rates[$rate]['width']){
            $new['width']=$this->rates[$rate]['width'];
            $new['height']=round($new['width']*$this->file[1]/$this->file[0]);
        }
        $new['width']=round($new['width']);
        
        $name=sha1_file($this->file['path']).".{$this->file['extension']}";
        $path=ROOT."uploads/$mod/";
        $this->check_dir($path);
        if($rate!='normal')$path.="{$rate}/";
        $this->check_dir($path);
        if(is_file(ROOT.$path.$name)){
            return "/{$path}{$name}";
        } else return $this->create($path.$name, $new);
    }

    static function unlink_images($name,$mod='goods'){
        foreach(self::$rates as $rate=>$value){
            $path=ROOT."uploads/$mod/";
            if($rate!='normal')$path.="{$rate}/";
            $file=$path.$name;
            if(is_file($file)){
                unlink($file);
                $res++;
            }
        }
        return $res;
    }

    private function create($file, $new){

        $destination_filename = ROOT.$file;
        exec(escapeshellcmd("convert " . $this->file['path'] . " -resize
        " . $new['width'] . "x" . $new['height'] . " -quality ".$new['quality']." ".$this->file['extension'].":" .
        $destination_filename));

        if(!is_file(ROOT.$file)){
            $this->error(sprintf('Ошибка создания изображения из %s',$this->file['path']));
            return false;
        }
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
