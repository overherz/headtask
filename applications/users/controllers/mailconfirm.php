<?php
namespace users;

class mailconfirm extends \Controller {  
    
    function default_method()
    {
        if ($this->id) {
             $query = $this->db->prepare("select * from recovery where hash=? and type='change_mail' LIMIT 1");
             if ($query->execute(array($this->id))) {
                 $user = $query->fetch();
                 if ($user) 
                 {
                     $this->db->beginTransaction();
                     
                     if($this->db->query("delete from recovery where hash=".$this->db->quote($this->id)." and type='change_mail' LIMIT 1"))
                     {
                         $query = $this->db->prepare("select * from recovery where newmail=? and type='change_mail' LIMIT 1");
                         if ($query->execute(array($user['newmail']))) {
                             $another = $query->fetch();
  
                             if (!$another) {
                                 if($this->db->query("UPDATE users SET email = ".$this->db->quote($user['newmail'])." WHERE id_user = ".$this->db->quote($user['uid'])))
                                 {
                                     $msg = "Почтовый ящик изменен! Обратите внимание, на то, что при входе на сайт, необходимо указывать новый адрес электронной почты.";
                                     $success = true;
                                     $this->db->commit();
                                     setcookie('login', $user['newmail'], time()+60*60*24*7,"/");
                                     $_SESSION['user']['email'] = $user['newmail'];
                                 } else {
                                    $error = "Ошибка базы данных";
                                    $this->db->rollBack();
                                 }
                             } else {
                                 $msg = "Вам осталось подтвердить доступ к почтовому ящику {$another['email']}.";
                                 $success = true;
                                 $this->db->commit();
                             }
                         } else {
                             $error = "Ошибка базы данных";
                             $this->db->rollBack();
                         }
                         
                     } else {
                         $error = "Ошибка базы данных";
                         $this->db->rollBack();
                     }
                 }
             } else {
                 $success = false;
                 $error = "Ошибка базы данных";
             }
             $this->layout_show('elements/mailconfirm.html', array('success' => $success, 'error' => $error, 'msg'=>$msg));
        }
    }
}
