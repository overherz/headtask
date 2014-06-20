<?php
namespace logs;

class logs extends \Controller {

    function default_method()
    {

    }

    function save_into_log($type,$title,$status,$message=false,$user_id=null,$optional=false)
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $date = strtotime("now");
        if ($_POST['password'] != "") $_POST['password'] = "***";
        if ($_GET['password'] != "") $_GET['password'] = "***";
        $post = serialize($_POST);
        $get = serialize($_GET);

        $query = $this->db->prepare("insert into logs(user,type,status,ip,title,message,post,get,date,optional) values(?,?,?,?,?,?,?,?,?,?)");
        if ($query->execute(array($user_id,$type,$status,$ip,$title,$message,$post,$get,$date,$optional))) return true;
    }

    function get_last_logs($limit=false,$types=false)
    {
        if (!$limit) $limit = 20;
        if ($types)
        {
            if (is_array($types) && count($types) > 0)
            {
                foreach ($types as &$type)
                {
                    $type = $this->db->quote($type);
                }
                $type_text = "where l.type IN (".implode(",",$types).")";
            }
            else $type_text = "where l.type=".$this->db->quote($types);
        }
        $query = $this->db->query("select l.*,u.first_name,u.last_name from logs as l
            LEFT JOIN users as u ON u.id_user = l.user
            {$type_text}
            order by date DESC LIMIT {$limit}");
        while ($row = $query->fetch())
        {
            $row['fio'] = build_user_name($row['first_name'],$row['last_name']);
            $logs[] = $row;
        }
        return $logs;
    }
}

