<?php
namespace admin\company;

class company extends \Admin {

    function default_method()
    {
        switch($_POST['act'])
        {
            case "save":
                $this->save();
                break;
            case "add_group":
                $this->add_group();
                break;
            case "delete":
                $this->delete();
                break;
            case "edit":
                $this->edit();
                break;
            default: $this->default_show();
        }
    }

    function default_show()
    {
        $groups = $this->db->query("select g.*,count(u.id_user) as count from company as g LEFT JOIN company_users as u ON g.id=u.id_company group by g.id")->fetchAll();

        if ($_GET['ajax'])
        {
            $res['success'] = $this->layout_get('admin/company.html',array('groups' => $groups));
            echo json_encode($res);
        }
        else $this->layout_show('admin/index.html',array('company' => $groups));
    }

    /*
    function delete()
    {
        if ($_POST['id'] != "")
        {
            $log = $this->get_controller("logs");
            $group = $this->get_group($_POST['id']);
            $query = $this->db->prepare("delete from groups where id=?");
            if ($query->execute(array($_POST['id'])))
            {
                $res['success'] = true;
                if ($log) $log->save_into_log("admin","Компании",true,"Удалена компания \"{$group['name']}\"",$_SESSION['admin']['id_user']);
            }
            else $res['error'] = "Ошибка удаления";
        }
        else $res['error'] = "Передан неверный id";

        echo json_encode($res);
    }
    */
}

