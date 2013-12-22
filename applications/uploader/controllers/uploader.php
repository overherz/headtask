<?php
namespace uploader;

class uploader extends \Controller {

    function default_method(){
        require_once(ROOT.'libraries/imaginator/imaginator.php');        
        $i = new \imaginator($_FILES['upload']['tmp_name']);        
        $url=$i->get('big','images');
        echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction({$_GET['CKEditorFuncNum']}, '{$url}', '{$i->error}');</script>";
    }
}
