<?
namespace admin\news;

class news extends \Admin {

    var $limit = 15;

    function default_method()
    {
        switch($_POST['act'])
        {
            case "save":
                $this->save();
                break;
            case "delete":
                $this->delete();
                break;
            case "get_add":
                $this->get_add();
                break;
            case "edit":
                $this->edit();
                break;
            default: $this->show();
        }
    }

    function show()
    {
        if (!isset($_POST['on_page'])) $on_page = $this->limit;
        else $on_page = $_POST['on_page'];

        if (isset($_POST['search']) && $_POST['search'] != '')
        {
            $s = $this->db->quote("%{$_POST['search']}%");
            $sql = "where text LIKE ".$s." OR name LIKE ".$s;
        }

        $total= $this->db->query("select count(id) as count from news {$sql}")->fetch();
        $total = $total['count'];

        require_once(ROOT.'libraries/paginator/paginator.php');
        $paginator = new \Paginator($total, $_POST['page'], $on_page);
        if ($paginator->pages < $_POST['page']) $paginator = new \Paginator($total, $paginator->pages, $on_page);

        $query = $this->db->query("select * from news {$sql} ORDER BY created DESC LIMIT {$on_page} OFFSET {$paginator->get_range('from')}");
        while ($row = $query->fetch())
        {
            $row['tr_name'] = $this->safeName($row['name'],"-",true);
            $pages[$row['id']] = $row;
            $pages[$row['id']]['text'] = cut($pages[$row['id']]['text'],50);
        }


        $form = array(
            'on_page' => array('label' => 'Показывать по','type' => 'select', 'options' => array('5' => '5','10' => '10','15' => '15','20' => '20'), 'selected' => $on_page)
        );

        $data = array('pages'=>$pages, 'total'=>$total,'paginator' => $paginator,'form' => $form);
        if (!isset($_POST['page']))
        {
            $this->layout_show('admin/pages.html',$data);
        }
        else
        {
            $res['success'] = $this->layout_get('admin/pages_table.html',$data);
            echo json_encode($res);
        }
    }

    function get_add()
    {
        $res['success'] = $this->layout_get('admin/work_form.html');

        echo json_encode($res);
    }

    function edit()
    {
        $id = intval($_POST['id']);
        if ($id > 0)
        {
            $page = $this->db->query("select * from news where id='{$id}' LIMIT 1")->fetch();
            $images = $this->db->query("select * from news_images where id_news='{$id}'")->fetchAll();
            if ($images)
            {
                foreach($images as &$i)
                {
                    if ($i['crop'] == "")
                    {
                        $i_size = getimagesize(ROOT."uploads/news/news_middle/".real_path($i['image']));

                        if ($i_size[0] >= $i_size[1]) $length_side = $i_size[1];
                        else $length_side = $i_size[0];

                        $i['crop'] = json_encode(array(0,0,$length_side,$length_side));
                    }
                    if ($i['main']) $main_image = $i['image'];
                }
            }
            if ($page)
            {
                $page['created'] = date("d.m.Y",$page['created']);
                $res['success'] = $this->layout_get('admin/work_form.html',array('page' => $page,'images' => $images,'rand' => rand(1,100000),'main_image' => $main_image));
            }
            else $res['error'] = "Данных не найдено";
        }
        else $res['error'] = "Передан неверный id";

        echo json_encode($res);
    }

    function save()
    {
        $id = intval($_POST['id']);
        $_POST['name'] = trim($_POST['name']);

        if ($_POST['name'] == "") $res['error'] = "Укажите название";
        if ($_POST['text'] == "") $res['error'] = "Введите текст";

        require_once(ROOT.'libraries/imaginator/imaginator.php');

        if (is_array($_FILES['images']))
        {
            $images = array();
            foreach($_FILES['images']['tmp_name'] as $imm)
            {
                if ($imm != "")
                {
                    $i = new \imaginator($imm);

                    if ($path3 = $i->get('news_big','news') && $path2 = $i->get('news_middle','news'))
                    {
                        $ii = new \imaginator(ROOT.$path2);
                        $i_size = getimagesize(ROOT.$path2);

                        if ($i_size[0] >= $i_size[1]) $length_side = $i_size[1];
                        else $length_side = $i_size[0];

                        if ($path0 = $ii->get('news_small','news',array(0,0,$length_side,$length_side)) && $path = $ii->get('news_gallery','news',array(0,0,$length_side,$length_side))) $images[] = array('name' => basename($path2),'crop' => json_encode(array(0,0,$length_side,$length_side)));
                        else
                        {
                            $res['error'] = $ii->error;
                            $i->unlink_images(basename($i->name),"news");
                            $ii->unlink_images(basename($ii->name),"news");
                        }
                    }
                    else
                    {
                        $res['error'] = $i->error;
                        $i->unlink_images(basename($i->name),"news");
                    }
                }
            }
        }

        $this->db->beginTransaction();

        if (!$res['error'])
        {
            if ($_POST['always'] == "") $_POST['always'] = null;
            $data = array(
                $_POST['name'],$_POST['text'],strtotime($_POST['created']),$_POST['always'],$_POST['h1'],$_POST['title'],$_POST['description'],$_POST['keywords']
            );

            if ($id > 0)
            {
                $data[] = $id;
                $query = $this->db->prepare("update news set name=?,text=?,created=?,always=?,h1=?,title=?,description=?,keywords=? where id=?");
                if (!$query->execute($data)) $res['error'] = "Ошибка базы данных";
                else $last_id = $id;
            }
            else
            {
                $query = $this->db->prepare("insert into news(name,text,created,always,h1,title,description,keywords) values(?,?,?,?,?,?,?,?)");
                if (!$query->execute($data)) $res['error'] = "Ошибка базы данных";
                else $last_id = $this->db->lastInsertId();
            }

            $query = $this->db->prepare("insert into news_images(id_news,image,crop) values(?,?,?)");

            if (count($images) > 0)
            {
                foreach ($images as $b)
                {
                    if (!$new_main_image) $new_main_image = $b['name'];
                    if (!$query->execute(array($last_id,$b['name'],$b['crop']))) $res['error'] = "Ошибка базы данных";
                }
            }

            if (count($_POST['delete_images']) > 0)
            {
                $query = $this->db->prepare("delete from news_images where id_news=? and image=?");
                foreach ($_POST['delete_images'] as $v)
                {
                    if ($v != "")
                    {
                        if (!$query->execute(array($id,$v))) $res['error'] = "Ошибка при удалении изображений";
                        else $delete_image[] =$v;
                    }
                }
            }

            $query = $this->db->prepare("update news_images set main=? where id_news=? and main IS NOT NULL");
            if (!$query->execute(array(false,$last_id))) $res['error'] = "Ошибка базы данных";

            $query = $this->db->prepare("update news_images set main='1' where image=? and id_news=? LIMIT 1");

            if ($_POST['main_image'] != "")
            {
                if (!$query->execute(array($_POST['main_image'],$last_id))) $res['error'] = "Ошибка установки изображения в качестве основного";
            }
            else if ($new_main_image)
            {
                if(!$query->execute(array($new_main_image,$last_id))) $res['error'] = "Ошибка установки изображения в качестве основного";
            }
            else
            {
                $query = $this->db->prepare("update news_images set main='1' where id_news=? LIMIT 1");
                if (!$query->execute(array($last_id))) $res['error'] = "Ошибка установки изображения в качестве основного";
            }
        }

        if ($_POST['crop'])
        {
            $query = $this->db->prepare("select * from news_images where id_news=?");
            $query->execute(array($last_id));

            while ($row = $query->fetch())
            {
                $work_images[$row['id']] = $row['image'];
            }

            $query = $this->db->prepare("update news_images set crop=? where id=?");

            foreach($_POST['crop'] as $k => $cr)
            {
                if ($cr != "" && $work_images[$k])
                {
                    $j = ROOT."uploads/news/news_gallery/".real_path($work_images[$k],true)."/".$work_images[$k];
                    $j_temp = ROOT."uploads/news/news_gallery/".real_path($work_images[$k],true)."/temp_".$work_images[$k];
                    $j_small = ROOT."uploads/news/news_small/".real_path($work_images[$k],true)."/".$work_images[$k];
                    $j_temp_small = ROOT."uploads/news/news_small/".real_path($work_images[$k],true)."/temp_".$work_images[$k];
                    $j_middle = ROOT."uploads/news/news_middle/".real_path($work_images[$k],true)."/".$work_images[$k];
                    $n_c = new \imaginator($j_middle);
                    $coords = json_decode($cr);
                    if (is_file($j_temp)) unlink($j_temp);

                    if (is_file($j))
                    {
                        if (copy($j,$j_temp) && copy($j_small,$j_temp_small))
                        {
                            unlink($j);
                            unlink($j_small);
                            if ($n_c->get('news_small','news',array($coords[0],$coords[1],$coords[2],$coords[3])) && $n_c->get('news_gallery','news',array($coords[0],$coords[1],$coords[2],$coords[3])))
                            {
                                $delete_temp[] = array('temp' => $j_temp, 'real' => $j);
                                $delete_temp[] = array('temp' => $j_temp_small, 'real' => $j_small);
                                if (!$query->execute(array($cr,$k))) $res['error'] = "Ошибка базы данных";
                            }
                            else
                            {
                                $res['error'] = $n_c->error;
                                rename($j_temp,$j);
                                rename($j_temp_small,$j_small);
                            }
                        }
                        else $res['error'] = "Ошибка создания временного изображения ".$j_temp;
                    }
                }
            }
        }

        if (!$res['error'])
        {
            $res['success'] = true;
            $this->db->commit();

            if ($delete_temp)
            {
                foreach($delete_temp as $d_t)
                {
                    unlink($d_t['temp']);
                }
            }

            if ($delete_image)
            {
                foreach($delete_image as $v)
                {
                    \imaginator::unlink_images($v,"news");
                }
            }
        }
        else
        {
            $this->db->rollBack();

            if ($delete_temp)
            {
                foreach($delete_temp as $d_t)
                {
                    unlink($d_t['real']);
                    rename($d_t['temp'],$d_t['real']);
                }
            }
        }

        echo json_encode($res);
    }

    function delete()
    {
        $id = intval($_POST['id']);
        if ($id > 0)
        {
            if ($this->db->query("delete from news where id='{$id}' LIMIT 1")) $res['success'] = true;
            else $res['error'] = "Произошла ошибка";
        }
        else $res['error'] = "Передан неверный id";

        echo json_encode($res);
    }

    public function translitIt($str)
    {
        // Redefine vars
        $str = (string) $str;

        $patern = array(
            "А" => "A", "Б" => "B", "В" => "V", "Г" => "G",
            "Д" => "D", "Е" => "E", "Ж" => "J", "З" => "Z",
            "И" => "I", "Й" => "Y", "К" => "K", "Л" => "L",
            "М" => "M", "Н" => "N", "О" => "O", "П" => "P",
            "Р" => "R", "С" => "S", "Т" => "T", "У" => "U",
            "Ф" => "F", "Х" => "H", "Ц" => "TS", "Ч" => "CH",
            "Ш" => "SH", "Щ" => "SCH", "Ъ" => "", "Ы" => "YI",
            "Ь" => "", "Э" => "E", "Ю" => "YU", "Я" => "YA",
            "а" => "a", "б" => "b", "в" => "v", "г" => "g",
            "д" => "d", "е" => "e", "ж" => "j", "з" => "z",
            "и" => "i", "й" => "y", "к" => "k", "л" => "l",
            "м" => "m", "н" => "n", "о" => "o","п" => "p",
            "р" => "r", "с" => "s", "т" => "t", "у" => "u",
            "ф" => "f", "х" => "h", "ц" => "ts", "ч" => "ch",
            "ш" => "sh", "щ" => "sch", "ъ" => "y", "ї" => "i",
            "Ї" => "Yi", "є" => "ie", "Є" => "Ye", "ы" => "yi",
            "ь" => "", "э" => "e", "ю" => "yu", "я" => "ya", "ё" => "yo"
        );

        return strtr($str, $patern);
    }

    public function safeName($str, $delimiter = '-', $lowercase = false)
    {
        // Redefine vars
        $str       = (string) $str;
        $delimiter = (string) $delimiter;
        $lowercase = (bool) $lowercase;
        $delimiter = (string) $delimiter;

        // Remove tags
        $str = filter_var($str, FILTER_SANITIZE_STRING);

        // Decode all entities to their simpler forms
        $str = html_entity_decode($str, ENT_QUOTES, 'UTF-8');

        // Reserved characters (RFC 3986)
        $reserved_characters = array(
            '/', '?', ':', '@', '#', '[', ']',
            '!', '$', '&', '\'', '(', ')', '*',
            '+', ',', ';', '='
        );

        // Remove reserved characters
        $str = str_replace($reserved_characters, ' ', $str);

        // Set locale to en_US.UTF8
        setlocale(LC_ALL, 'en_US.UTF8');

        // Translit ua,ru => latin
        $str = $this->translitIt($str);

        // Convert string
        $str = iconv('UTF-8', 'ASCII//TRANSLIT', $str);

        // Remove characters
        $str = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $str );
        $str = preg_replace("/[\/_|+ -]+/", $delimiter, $str );
        $str = trim($str, $delimiter);

        // Lowercase
        if ($lowercase === true) $str = $this->lowercase($str);

        // Return safe name
        return $str;
    }

    public function lowercase($str)
    {
        // Redefine vars
        $str = (string) $str;

        return function_exists('mb_strtolower') ? mb_strtolower($str, 'utf-8') : strtolower($str);
    }
}
?>