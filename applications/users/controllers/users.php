<?php
namespace users;

class users extends \Controller {

    private $limit = 12;

    public $tz = array(
        '-39600' => '[UTC−11:00] о. Мидуэй, Самоа',
        '-36000' => '[UTC−10:00] Гавайи',
        '-34200' => '[UTC−09:30] Маркизские острова',
        '-32400' => '[UTC−09:00] Аляска',
        '-28800' => '[UTC−08:00] Североамерик. тихоокеанское время (США и Канада) и Тихуана',
        '-25200' => '[UTC−07:00] Горное время (США), Мексика',
        '-21600' => '[UTC−06:00] Мексика, Центральная Америка, Центральное время (США и Канада)',
        '-18000' => '[UTC−05:00] Североамерик. восточное время, Южноамерик. тихоокеанское время',
        '-16200' => '[UTC−04:30] Венесуэла',
        '-14400' => '[UTC−04:00] Сантьяго, Атлантическое время (Канада)',
        '-10800' => '[UTC−03:00] Бразилия, Гренландия',
        '-7200'  => '[UTC−02:00] Среднеатлантическое время',
        '-3600'  => '[UTC−01:00] Азорские острова, острова Зелёного мыса',
        '0'      => '[UTC=00:00] Время по Гринвичу: Дублин, Лондон, Лиссабон, Эдинбург',
        '3600'   => '[UTC+01:00] Берлин, Мадрид, Париж, Рим, Западная Центральная Африка',
        '7200'   => '[UTC+02:00] Афины, Вильнюс, Киев, Минск, Рига, Таллин, Центральная Африка',
        '10800'  => '[UTC+03:00] Калининград, Минск, Восточноафриканское время',
        '14400'  => '[UTC+04:00] Москва, страны Закавказья, Объединённые Арабские Эмираты, Оман',
        '16200'  => '[UTC+04:30] Кабул',
        '18000'  => '[UTC+05:00] Западный Казахстан, Пакистан, Таджикистан, Туркмения, Узбекистан',
        '19800'  => '[UTC+05:30] Бомбей, Калькутта, Мадрас, Нью-Дели',
        '20700'  => '[UTC+05:45] Катманду',
        '21600'  => '[UTC+06:00] Екатеринбург, центр. и восточ. части Казахстана, Киргизия, Бангладеш',
        '23400'  => '[UTC+06:30] Рангун',
        '25200'  => '[UTC+07:00] Омск, Новосибирск, Кемерово, Юго-Восточная Азия (Бангкок, Джакарта, Ханой)',
        '28800'  => '[UTC+08:00] Красноярск, Улан-Батор, Куала-Лумпур, Гонконг, Китай, Сингапур, Тайвань',
        '31500'  => '[UTC+08:45] Юго-восточная Западная Австралия',
        '32400'  => '[UTC+09:00] Иркутское время, Корея, Япония',
        '34200'  => '[UTC+09:30] Центральноавстралийское время',
        '36000'  => '[UTC+10:00] Якутск, Восточноавстралийское время, Западно-тихоокеанское время',
        '37800'  => '[UTC+10:30] Лорд-Хау',
        '39600'  => '[UTC+11:00] Владивосток, Центрально-тихоокеанское время',
        '41400'  => '[UTC+11:30] Остров Норфолк',
        '43200'  => '[UTC+12:00] Магаданское время, Маршалловы Острова, Фиджи, Новая Зеландия',
        '46800'  => '[UTC+13:00] Острова Феникс, Тонга',
        '50400'  => '[UTC+14:00] Остров Лайн'
    );

    function default_method()
    {
        switch($_POST['act'])
        {
            case "get_authorization_form":
                $res['success'] = $this->layout_get("elements/authorization_form.html");
                echo json_encode($res);
                break;
            case "change_nick":
                $this->change_nick();
                break;
            case "get_user_tags":
                $this->get_user_tags();
                break;
            case "lost_pass":
                $this->lost_pass();
                break;
            case "get_lost_pass":
                $this->get_lost_pass();
                break;
            default: $this->default_show();
        }
    }

    function default_show($id = false)
    {
        if ($id) $this->id = $id;
        $this->limit = get_setting('users_count_on_page',$this->limit);

        if (!$this->id)
        {
            $where[] = "u.mailconfirm = '1'";
            if (isset($_POST['search']) && $_POST['search'] != '')
            {
                $search = str_replace(" ","%",$_POST['search']);
                $s = $this->db->quote("%{$search}%");
                $where[] = "(u.first_name LIKE {$s} OR u.last_name LIKE {$s} OR gr.name LIKE {$s})";
            }
            $where[] = "cu.id_company=".$_SESSION['user']['current_company'];

            if (count($where) > 0) $where = "WHERE ".implode(" AND ",$where);
            else $where = "";

            $total= $this->db->query("select distinct u.id_user
                    from users as u
                    LEFT JOIN groups as gr ON u.id_group=gr.id
                    LEFT JOIN company_users as cu ON u.id_user=cu.id_user
                    {$where}
                    ")->fetchAll();
            $total = count($total);

            require_once(ROOT.'libraries/paginator/paginator.php');
            $paginator = new \Paginator($total, $_POST['page'], $this->limit);
            $p = $this->db->prepare("select distinct u.first_name,u.last_name,u.email,u.avatar,u.gender,u.id_user,gr.id as id_group,gr.name as group_name,gr.color as color,u.last_user_action
                    from users as u
                    LEFT JOIN groups as gr ON u.id_group=gr.id
                    LEFT JOIN company_users as cu ON u.id_user=cu.id_user
                    {$where}
                    ORDER BY u.last_name ASC
                    LIMIT {$this->limit}
                    OFFSET {$paginator->get_range('from')}
            ");
            $p->execute();
            while ($row = $p->fetch()) {
                $ids[] = $row['id_user'];
                $row['fio'] = build_user_name($row['first_name'],$row['last_name'],true);
                $users[$row['id_user']] = $row;
            }

            if ($ids)
            {
                $ids = implode(",",$ids);
                $p2 = $this->db->query("select up.iduser,up.value, pr.name, pr.alias FROM userprofiles as up LEFT JOIN profile as pr ON up.idprof=pr.id WHERE up.iduser IN ({$ids}) AND pr.name IN ('skypename', 'mphone')");
                while ($row = $p2->fetch()) {
                    $users[$row['iduser']][$row['name']]=$row['value'];
                }
            }

            $data = array(
                'users' => $users,
                'total' => $total,
                'paginator' => $paginator,
                'search' => $_POST['search'],
                'invite' => $_SESSION['user']['id_group'] == 1 ? true : false,
            );

            if ($_POST)
            {
                $res['success'] = $this->layout_get("users_table.html",$data);
                echo json_encode($res);
            }
            else $this->layout_show('users.html',$data);
        }
        else
        {
            $id = intval($this->id);
            if($_SESSION['user']['id_user'] == $id) $this->set_global("user_menu", "profile");

            $result = $this->db->prepare("select u.first_name,u.last_name,u.gender,u.avatar,u.id_user,u.last_user_action,gr.id as id_group,gr.name as group_name,gr.color
                from users as u
                LEFT JOIN groups as gr ON u.id_group=gr.id
                WHERE id_user = ? and u.mailconfirm = '1' LIMIT 1
            ");
            $result->execute(array($id));
            if ($user = $result->fetch())
            {
                $user['fio'] = build_user_name($user['first_name'],$user['last_name']);
                $res2 = $this->db->prepare("select up.*, pr.* FROM userprofiles as up LEFT JOIN profile as pr ON up.idprof=pr.id WHERE up.iduser = ? and pr.share = '1'");
                $res2->execute(array($id));
                while ($row = $res2->fetch())
                {
                    $user['profile'][$row['name']]=$row;
                }

                $this->layout_show('user.html', array(
                    'user'=>$user,
                    'user_tasks' => $this->get_controller("projects","user_tasks")->default_method($id)
                ));
            }
            else return $this->error_page();
        }
    }

    function inCL($id_owner, $id_contact)
    {
        $id_owner = intval($id_owner);
        $id_contact = intval($id_contact);
        if ($id_owner != $id_contact)
            $found_relation = $this->db->query("SELECT id_owner FROM contact_list where id_owner = ".$this->db->quote($id_owner)." AND id_contact = ".$this->db->quote($id_contact))->fetch();
            else $found_relation = false;
        return $found_relation;
    }

    function get_user_notes($id=false,$limit=false)
    {
        if (!$id) $id = $_SESSION['user']['id_user'];
        if ($limit) $end_query = "LIMIT {$limit}";

        $query = $this->db->prepare("select id,name,created from users_notes where id_user=? order by created DESC {$end_query}");
        $query->execute(array($id));
        $notes = $query->fetchAll();

        return $notes;
    }

    function get_user_tags($id=false,$limit=false,$no_ajax=false, $withCount=false)
    {
        if (!$id) $id = $_SESSION['user']['id_user'];
        if ($limit) $end_query = "tu.count DESC LIMIT {$limit}";
        else $end_query = "t.name";

        $query = $this->db->prepare("select t.*, tu.count
            from tags_to_users as tu
            LEFT JOIN tags as t ON t.id=tu.id_tag
            where tu.id_user = ?
            order by {$end_query}
        ");
        $query->execute(array($id));
        if ($withCount)
        {
            while($row = $query->fetch()) $tags[$row['id']] = $row;
        }
        else
        {
            while($row = $query->fetch()) $tags[$row['id']] = $row['name'];
        }
        if ($_GET['ajax'] && !$no_ajax)
        {
            $res['success'] = $this->layout_get("elements/tags.html",array('tags' => $tags,'popup' => true));
            echo json_encode($res);
        }
        else return $tags;
    }

    function get_user_tags_count($id=false)
    {
        if (!$id) $id = $_SESSION['user']['id_user'];
        $id = (int) $id;

        $count = $this->db->num_rows("tags_to_users where id_user = '{$id}'");
        return $count;
    }

    function get_users_from_group($group,$limit)
    {
        if ($group)
        {
            $group = (int) $group;
            $query = $this->db->query("select id_user,first_name,last_name,avatar from users where id_group='{$group}' ORDER BY id_user DESC LIMIT {$limit}");
            while ($row = $query->fetch())
            {
                $users[$row['id_user']] = $row;
                $ids[] = $row['id_user'];
            }
            if ($ids)
            {
                $ids = implode(",",$ids);
                $query = $this->db->query("select up.iduser,p.name,up.value from userprofiles as up
                    LEFT JOIN profile as p ON p.id=up.idprof
                    WHERE up.iduser IN ({$ids})
                ");
                while ($row = $query->fetch()) $users[$row['iduser']]['profile'][$row['name']] = $row['value'];
            }
        }
        return $users;
    }

    function get_user($id)
    {
        $query = $this->db->prepare("select * from users where id_user=?");
        $query->execute(array($id));
        $user = $query->fetch();

        return $user;
    }

    function get_user_from_email($email)
    {
        $query = $this->db->prepare("select * from users where email=?");
        $query->execute(array($email));
        $user = $query->fetch();

        return $user;
    }

    function get_user_timezone($offset="14400")
    {
        $o = $offset;
        $n = \DateTimeZone::listAbbreviations();
        //pr($n);
        date_default_timezone_set('UTC');
        $now = time() + $o;
        $date = date("d.m.y H:i",$now);

        foreach($n as $k)
        {
            foreach ($k as $a)
            {
                if (strlen($a['timezone_id']) > 0) {
                    if (@date_default_timezone_set($a['timezone_id']))
                    {
                        $new_date = date("d.m.y H:i");
                        if ($date === $new_date)
                        {
                            $time_zone = $a['timezone_id'];
                            //echo "<div>{$o} - {$time_zone} | <span style='color:red;'>{$date}</span> = {$new_date}</div>";
                            return $time_zone;
                        }
                    }
                }

            }
        }
    }

    function check_access_to_profile($id)
    {
        $res2 = $this->db->prepare("select up.*, pr.* FROM userprofiles as up LEFT JOIN profile as pr ON up.idprof=pr.id WHERE up.iduser = ? and pr.name='type_visible'");
        $res2->execute(array($id));
        $result = $res2->fetch();

        $type_visible = $result['value'];

        if (!$type_visible || !in_array($type_visible,array('visible','visible_for_friend','invisible'))) $type_visible = "visible";
        if ($_SESSION['user']['id_user'] != $id)
        {
            if ($type_visible == "invisible") $this->error_page("denied");
            elseif ($type_visible == "visible_for_friend")
            {
                $query = $this->db->prepare("select * from contact_list where id_owner=? and id_contact=?");
                $query->execute(array($id,$_SESSION['user']['id_user']));
                if (!$query->fetch()) $this->error_page("denied");
            }
        }
    }

    function lost_pass()
    {
        $res['success'] = $this->layout_get("lost_pass.html");
        echo json_encode($res);
    }

    function get_lost_pass()
    {
        $u_cr = $this->get_controller("users","recovery");
        $res = $u_cr->add_recovery($_POST['email']);

        echo json_encode($res);
    }

    function save_user_data($id_user,$id_key,$data)
    {
        $query = $this->db->prepare("insert into users_data(id_user,id_key,data) values(?,?,?) on duplicate key update data=?");
        if($query->execute(array($id_user,$id_key,$data,$data))) return true;
    }

    function get_user_data($id_user,$id_key)
    {
        $query = $this->db->prepare("select * from users_data where id_user=? and id_key=?");
        if ($query->execute(array($id_user,$id_key))) return $query->fetch();
    }
}

