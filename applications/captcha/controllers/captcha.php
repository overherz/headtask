<?php
namespace captcha;

class captcha extends \Controller {

    private $key = "Yh65PUazgRB01@FE6c9HWumCK70nAXxk";
    private $aes;

    function default_method()
    {
        if ($_GET['image'] != "")
        {
            require_once(ROOT.'/libraries/AES_class.php');
            $this->aes = new \AESCrypt($this->key);

            $decrypt = explode("-",$this->aes->decrypt($_GET['image']));
            $name = $decrypt[0];
            $file = ROOT."/source/images/captcha/".$name;
            readfile($file);
        }
    }

    function get_captcha($count=3)
    {
        require_once(ROOT.'/libraries/AES_class.php');
        $this->aes = new \AESCrypt($this->key);

        $select = rand(1,$count);
        $i = 1;

        $captcha_html = "<table cellspacing='0' cellpadding='0' style='width:300px !important;'><td colspan='{$count}' id='captcha_name' style='padding-bottom:5px;white-space: nowrap;'>Выберите \"%NAME%\"</td><tr>";
        $radio = "";

        $result = $this->db->query("select * from captcha ORDER BY RAND() LIMIT {$count}");

        while($row = $result->fetch())
        {
            $row['image'] .= "-".time();
            $row['image'] = $this->aes->encrypt($row['image']);

            if ($i == $select)
            {
                $captcha_name = $row['name'];
                $captcha_id = rand(1,10000);
                $_SESSION['captcha'][$captcha_id] = $i;
            }
            $captcha_html .= "<td align='center' style='vertical-align:top;padding: 0px;'><label for='capt{$i}'><img src='/captcha/?image={$row['image']}' style='margin-right:5px;border:none;cursor:pointer;width: 30px;'></label></td>";
            $radio .= "<td align='center' width='1'><input type='radio' id ='capt{$i}' name='captcha' value='{$i}' class='radio' style='border:none;'></td>";
            $i++;
        }

        $captcha_html = str_replace("%NAME%", $captcha_name, $captcha_html);
        $captcha_html .= "</tr><tr>".$radio."</tr></table>";
        $captcha_html = "<input type='hidden' name='id_captcha' value='{$captcha_id}'>".$captcha_html;

        return $captcha_html;
    }
}

