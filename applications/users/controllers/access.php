<?php
namespace users;
class access extends \Controller {

    var $user;
    var $paid_services = array();
    var $all_paid_services = array();
    var $community_access = array(
        'add_article' => false, // добавление статьи/новости
        'show_access_level' => false, // показывать уровни доступа в статьях и новостях
        'send_invites' => false, // разрешение на отпраку приглашений
        'join' => false, // разрешение на вступление в сообщество
        'edit' => false, // разрешение на редактирование сообщества
        'add_oovoo' => false, // разрешение на добавление ooVoo
        'control_users' => false,
    );

    var $zone_access = array(
        'add_article' => false, // добавление статьи/новости
        'show_access_level' => false, // показывать уровни доступа в статьях и новостях
        'send_invites' => false, // разрешение на отпраку приглашений
        'join' => false, // разрешение на вступление в сообщество
        'edit' => false, // разрешение на редактирование сообщества
        'add_oovoo' => false, // разрешение на добавление ooVoo
        'control_users' => false,
        'control_files' => false
    );

    var $article_access = array(
        'edit_article' => false, // редактировоание статьи/новости
        'delete_article' => false, // удаление статьи/новости
        'comment' => false, // комментирование статьи/новости
        'delete_comment' => false, // удаление комментариев
    );

    var $access_to_role = array(
        'admin' => array('root_admin','admin'),
        'party_man' => array('root_admin','admin','party_man'),
        'member' => array('root_admin','admin','party_man','user'),
        'all' => array('root_admin','admin','party_man','user',false),
        'no' => array()
    );

    function get_access_from_role($role=false,$quotes=false)
    {
        foreach ($this->access_to_role as $k => $v)
        {
            if (in_array($role,$v)) $a[] = $quotes ? "'{$k}'" : $k;
        }

        return $a;
    }


    function get_access($type,$data)
    {
        if ($type == "article")
        {
            $article = $data;
            if (is_numeric($article)) $article = $this->get_controller("articles")->get_article($article);
            if ($article['id_community'] && count($this->paid_services) == 0) $this->get_access_paid_services($article['id_community']);
            if ($article['id_community'] && !$this->user) $this->user = $this->get_controller("communities")->get_user($article['id_community'],$_SESSION['user']['id_user']);
            if ($article['id_business_zone'] && !$this->user) $this->user = $this->get_controller("business_zones")->get_user($article['id_business_zone'],$_SESSION['user']['id_user']);

            if ($this->user['status'] == "confirm") $member = true;
            else if ($this->user) $this->user['role'] = false;

            if ($article['id_community'] || $article['id_business_zone'])
            {
                if (($article['author'] == $_SESSION['user']['id_user'] && $member) ||
                        $_SESSION['user']['id_group'] == 1 ||
                        $_SESSION['user']['access']['edit_article'] ||
                        in_array($this->user['role'],array('root_admin','admin'))) $this->article_access['edit_article'] = true;

                if ($_SESSION['user']['id_group'] == 1 ||
                        $_SESSION['user']['access']['delete_article'] ||
                        in_array($this->user['role'],array('root_admin','admin'))) $this->article_access['delete_article'] = true;

                if (!in_array($this->user['role'],$this->access_to_role[$article['access_display']])) return $this->error_page('denied');
                if (in_array($this->user['role'],$this->access_to_role[$article['access_comment']])) $this->article_access['comment'] = true;

                if (in_array($this->user['role'],array('root_admin','admin'))) $this->article_access['delete_comment'] = true;
            }
            else if (is_array($article))
            {
                if ($article['author'] == $_SESSION['user']['id_user'] ||
                        $_SESSION['user']['id_group'] == 1 ||
                        $_SESSION['user']['access']['edit_article']) $this->article_access['edit_article'] = true;

                if ($_SESSION['user']['id_group'] == 1 ||
                        $_SESSION['user']['access']['delete_article']) $this->article_access['delete_article'] = true;

                if ($article['access_display'] == "no") return $this->error_page('denied');
                if ($_SESSION['user']['id_group'] == 1 || $_SESSION['user']['access']['write_comment']) $this->article_access['comment'] = true;
                if ($_SESSION['user']['id_group'] == 1 || $_SESSION['user']['access']['delete_comment']) $this->article_access['delete_comment'] = true;
            }

            return array('article' => $article,'user' => $this->user,'access' => $this->article_access,'paid_services' => $this->paid_services);
        }

        if ($type == "community")
        {
            $community = $data;
            if (is_numeric($community)) $community = $this->get_controller("communities")->get_community($community);
            if ($community && count($this->paid_services) == 0) $this->get_access_paid_services($community['id']);
            if (!$this->user && $community['id']) $this->user = $this->get_controller("communities")->get_user($community['id'],$_SESSION['user']['id_user']);

            if ($this->user['status'] == "confirm") $member = true;
            else if ($this->user) $this->user['role'] = false;

            if ($member || !$community)
            {
                $this->community_access['add_article'] = true;
                $show_add['id'] = $community['id'] ? $community['id'] : "null";
                $show_add['type'] = "communities";
                if (in_array($this->user['role'],array('admin','root_admin'))) $show_add['admin'] = true;
                $this->set_global("show_add_article", $show_add);
            }

            if ($community['type'] == "party")
            {
                $this->community_access['show_access_level'] = true;
                if ($this->user['role'] == "root_admin") $this->community_access['add_oovoo'] = true;
                if (!$this->paid_services['create_party'] || (!$this->paid_services['create_party']['active'] && !$this->paid_services['party']))
                {
                    $p_name = $this->paid_services['create_party']['name'] ? $this->paid_services['create_party']['name'] : $this->all_paid_services['create_party']['name'];
                    if (!$this->paid_services['party'] && $this->paid_services['create_party']) $ab = true;
                    return $this->error_page('no_paid',array('name' => $p_name,'ab' => $ab));
                }
            }

            if (in_array($community['type'],array('open','party')) && !$member) $this->community_access['join'] = true;
            if ($member)
            {
                if (in_array($community['type'],array('open','party')) ||
                in_array($this->user['role'],array('admin','root_admin'))) $this->community_access['send_invites'] = true;
            }
            if ($this->user['role'] == "root_admin") $this->community_access['edit'] = true;

            if ($community['founder'] != $_SESSION['user']['id_user'])
                if ($community['type'] == "close_hide" && $this->user['status'] != "confirm" && $_SESSION['user']['id_group'] != 1) return $this->error_page('denied');

            if (in_array($this->user['role'],array('admin','root_admin'))) $this->community_access['control_users'] = true;

            return array("community" => $community,"user" => $this->user,'access' => $this->community_access,'paid_services' => $this->paid_services);
        }

        if ($type == "business_zone")
        {
            $zone = $data;
            if (is_numeric($zone)) $zone = $this->get_controller("business_zones")->get_zone($zone);
            if ($zone['management']) $zone['management'] = json_decode($zone['management']);
            //if ($zone && count($this->paid_services) == 0) $this->get_access_paid_services($zone['id']);
            if (!$this->user && $zone['id']) $this->user = $this->get_controller("business_zones")->get_user($zone['id'],$_SESSION['user']['id_user']);

            if ($this->user['status'] == "confirm") $member = true;
            else if ($this->user) $this->user['role'] = false;

            if (in_array($this->user['role'],array('admin','root_admin','worker')) || !$zone)
            {
                $this->zone_access['add_article'] = true;
                $show_add['id'] = $zone['id'] ? $zone['id'] : "null";
                $show_add['type'] = "business_zones";
                if (in_array($this->user['role'],array('admin','root_admin'))) $show_add['admin'] = true;
                $this->set_global("show_add_article", $show_add);
            }

            if (in_array($zone['type'],array('open','party')) && !$member) $this->zone_access['join'] = true;
            if ($member)
            {
                if (in_array($zone['type'],array('open','party')) ||
                in_array($this->user['role'],array('admin','root_admin'))) $this->zone_access['send_invites'] = true;
            }
            if ($this->user['role'] == "root_admin") $this->zone_access['edit'] = true;

            if ($zone['founder'] != $_SESSION['user']['id_user'])
                if ($zone['type'] == "close_hide" && $this->user['status'] != "confirm" && $_SESSION['user']['id_group'] != 1) return $this->error_page('denied');

            if (in_array($this->user['role'],array('admin','root_admin')))
            {
                $this->zone_access['control_users'] = true;
                $this->zone_access['control_files'] = true;
            }

            return array("business_zone" => $zone,"user" => $this->user,'access' => $this->zone_access,'paid_services' => $this->paid_services);
        }
    }

    function get_access_paid_services($community)
    {
        $now = time();
        $query = $this->db->prepare("select sc.*,ps.key,ps.name,ps.single_use from paid_services_to_communities as sc
            LEFT JOIN paid_services as ps ON sc.id_paid_service=ps.id
            WHERE sc.id_community=? AND ((sc.lifetime_start <= ? AND sc.lifetime_end >= ?) OR ps.single_use=1)
        ");
        $query->execute(array($community,$now,$now));
        while ($row = $query->fetch())
        {
            if ($row['single_use'])
            {
                if ($row['lifetime_start'] <= $now && $row['lifetime_end'] >= $now) $active = true;
                else $active = false;
            }
            else $active = true;

            $this->paid_services[$row['key']] = array('name' => $row['name'],'active' => $active);
        }

        if (count($this->paid_services) == 0) $this->get_paid_services();
    }

    function get_paid_services()
    {
        $query = $this->db->query("select * from paid_services");
        while ($row = $query->fetch()) $this->all_paid_services[$row['key']] = $row;
    }
}

