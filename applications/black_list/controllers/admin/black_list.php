<?php
namespace admin\black_list;

class black_list extends \Admin {

    function default_method()
    {
        $this->layout_show('admin/index.html');
    }

    function check_ban($ip=false)
    {
        $this->delete_ban();
        if (!$ip) $ip = $_SERVER['REMOTE_ADDR'];
        $query = $this->db->prepare("select * from black_list where ip=? LIMIT 1");
        $query->execute(array($ip));
        return $query->fetch();
    }

    function add_ban($ip=false,$time=false)
    {
        if (!$ip) $ip = $_SERVER['REMOTE_ADDR'];
        if (!$time) $time = 60*5;
        if (!$this->check_ban($ip))
        {
            $query = $this->db->prepare("insert into black_list(ip,time) values(?,?)");
            return $query->execute(array($ip,time()+$time));
        }
    }

    function delete_ban($ip=false)
    {
        if (!$ip)
        {
            $time = time();
            $query = $this->db->prepare("delete from black_list where time <= ?");
            return $query->execute(array($time));
        }
        else
        {
            $query = $this->db->prepare("delete from black_list where ip=? LIMIT 1");
            return $query->execute(array($ip));
        }
    }

    function check_for_ban()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $query = $this->db->prepare("select id from logs where type='login' and ip=? and date >= ? and status='0'");
        $query->execute(array($ip,time()-60*5));
        $count = count($query->fetchAll());
        if ($count >= 5) return $this->add_ban($ip);
    }
}

