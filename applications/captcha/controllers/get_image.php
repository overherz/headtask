<?php
namespace captcha;

class get_image extends \Controller {

    private $key = "Yh65PUazgRB01@FE6c9HWumCK70nAXxk";
    private $aes;

    function default_method()
    {
        if ($this->id)
        {
            require_once(ROOT.'/libraries/AES_class.php');
            $this->aes = new \AESCrypt($this->key);

            $this->id = str_replace("slash","/",$this->id);
            $this->id = str_replace("plus","+",$this->id);
            $this->id = str_replace("equal","=",$this->id);

            $decrypt = explode("-",$this->aes->decrypt($this->id));
            $name = $decrypt[0];
            $file = ROOT."/source/images/captcha/".$name;
            readfile($file);
        }
    }
}