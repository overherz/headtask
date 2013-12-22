<?php
namespace users;
class tree extends \Controller {

    var $colors = array(
        'main' => "#5fb80e",
        'female' => "#ffc5d4",
        'male' => "#b0dcff",
        'marriage' => "#b5e291"
    );
    var $colors_line = array(
        'main' => "#5fb80e",
        'female' => "#ffa0b8",
        'male' => "#76c2ff",
        'marriage' => "#5fb80e"
    );
    
    function default_method() {

        switch($_POST['act'])
        {
            case "get_add_form":
                $res['success'] = $this->layout_get("person_form.html");
                echo json_encode($res);
                break;
            case "save_person":
                $this->save_person();
                break;
            case "save_link":
                $this->save_link();
                break;
            case "delete_person":
                $this->delete_person();
                break;
            case "delete_link":
                $this->delete_link();
                break;
            default: $this->tree_show();
        }
    }

    function tree_all()
    {

        $users = $this->db->query("select * from users")->fetchAll();
        $query = $this->db->prepare("insert into tree_persons(id_user,name,life_start,gender,main) values(?,?,?,?,?)");

        foreach ($users as $u)
        {
            $query->execute(array($u['id_user'],$u['fio'],$u['birthday'],$u['gender'],true));
        }

    }
    
    function tree_show()
    {
        switch ($this->id)
        {
            case "add_person":
                crumbs("Добавление человека");
                $this->layout_show("add_person.html");
                break;
            case "edit_person":
                $this->edit_person();
                break;
            case "biography":
                $this->show_biography();
                break;
            default:
                //$this->save_tree();
                   // $this->tree_all();

                $id = $this->id ? $this->id : $_SESSION['user']['id_user'];
                $user = $this->get_controller("users")->get_user($id);

                if ($this->id)
                {
                    crumbs("Люди","/users/",true);
                    crumbs($user['fio'],"/users/~{$user['id_user']}/");
                    crumbs("Фамильное древо");
                }

                if ($user && $user['tree'] == "")
                {
                    $tree = $this->build_tree($id);
                    $user['tree'] = $tree;
                    $this->save_tree($tree,$id);
                }
                if ($_SESSION['user']['id_user'] == $id) $edit = true;
                else $this->get_controller("users")->check_access_to_profile($id);
                if (!$user) return $this->error_page();

               // $user['tree'] = $this->build_tree($id);

                switch ($_GET['mode'])
                {
                    case "full":
                        $this->layout_show("tree.html",array('tree' => $user['tree'],'legend' => $this->build_legend(),'full' => true,'edit' => $edit,'user' => $user));
                        break;
                    case "print":
                        $this->layout_show("tree_print.html",array('tree' => $this->build_tree($id,'600'),'legend' => $this->build_legend(400)));
                        break;
                    default:
                        $this->layout_show("tree.html",array('tree' => $user['tree'],'legend' => $this->build_legend(),'user' => $user,'edit' => $edit));
                }
        }

    }

    function show_biography()
    {
        $query = $this->db->prepare("select t.*,u.fio from tree_persons as t
            LEFT JOIN users as u ON u.id_user=t.id_user
            where t.id=?");
        $query->execute(array($this->_0));
        if ($person = $query->fetch())
        {
            if ($_SESSION['user']['id_user'] != $person['id_user'])
            {
                crumbs("Люди","/users/",true);
                crumbs($person['fio'],"/users/~{$person['id_user']}/");
                crumbs("Фамильное древо","/users/tree/{$person['id_user']}/");
            }
            crumbs($person['name'].". Биография");
            
            $person['life_start'] = $this->convert_date($person['life_start']);
            $person['life_end'] = $this->convert_date($person['life_end']);
            
            $life = "";

            if ($person['life_start'] || $person['life_end']) $life .= "(";
            if ($person['life_start']) $life .= $person['life_start'];
            if ($person['life_start'] || $person['life_end']) $life .= " - ";
            if ($person['life_end']) $life .= $person['life_end'];
            if ($person['life_start'] || $person['life_end']) $life .= ")";

            $person['life'] = $life;
            
            $this->layout_show("biography.html",array("person" => $person));
        }
        else $this->error_page();
    }

    function edit_person()
    {
        $this->check_access();
        crumbs("Редактирование человека");
        $query = $this->db->prepare("select * from tree_persons where id=? and id_user=?");
        $query->execute(array($this->_0,$_SESSION['user']['id_user']));

        if ($person = $query->fetch())
        {
            $person['life_start'] = $this->convert_date($person['life_start']);
            $person['life_end'] = $this->convert_date($person['life_end']);
            $this->layout_show("add_person.html",array('person' => $person,'main' => $person['main']));
        }
        else $this->error_page("denied");
    }

    function save_person()
    {
        $this->check_access();

        if ($_POST['id'])
        {
            $query = $this->db->prepare("select * from tree_persons where id=? and id_user=?");
            $query->execute(array($_POST['id'],$_SESSION['user']['id_user']));
            if (!$person = $query->fetch()) $res['error'] = "Доступ запрещен";
        }

        $_POST['name'] = trim(strip_tags(htmlspecialchars($_POST['name'])));

        if ($person['main'] == false)
        {
            if ($_POST['name'] == "") $res['error'][] = "Укажите имя";
            if ($_POST['gender'] != "m" && $_POST['gender'] != "f") $res['error'][] = "Выберите пол";
            if ($_POST['life_start'] != "" && !$this->check_date($_POST['life_start'])) $res['error'][] = "Неверная дата рождения";
            if ($_POST['life_end'] != "" && !$this->check_date($_POST['life_end'])) $res['error'][] = "Неверная дата смерти";

            $_POST['life_start'] = $this->convert_date($_POST['life_start'],true);
            $_POST['life_end'] = $this->convert_date($_POST['life_end'],true);
            if ($_POST['life_start'] != "" && $_POST['life_end'] != "" && $_POST['life_start'] > $_POST['life_end']) $res['error'][] = "Дата смерти не может быть раньше даты рождения";
        }

        if ($_FILES['image']['name'] && !$_POST['image'])
        {
            require_once(ROOT.'libraries/imaginator/imaginator.php');
            $i = new \imaginator($_FILES['image']['tmp_name']);
            if ($path = $i->get('tree','users')) $_POST['image'] = $path;
            else $res['error'][] = $i->error;
        }

        // check video iframe url :START
        require_once(ROOT.'libraries/simple_html_dom.php');
        $html = str_get_html($_POST['description']);
        if ($html)
        {
            foreach($html->find('iframe') as $element)
            {
                if (!preg_match("/^http:\/\/www.youtube.com\/embed\//",$element->src))
                {
                    $element->src="";
                    $element->outertext = (string)$element->innertext;
                }
            }
            $_POST['description'] = $html->save();
        }
        // check video iframe :END

        $html = str_get_html($_POST['description']);
        if ($html)
        {
            foreach($html->find('script') as $element)
            {
                $element->outertext = (string)$element->innertext;
            }
            $_POST['description'] = $html->save();
        }

        if (!$res['error'])
        {
            if ($_POST['mode'] == 'preview')
            {
                $res['success'] = $this->layout_get("elements/person_preview.html",array('person' => $_POST));
            }
            else
            {
                $this->db->beginTransaction();
                if ($_POST['id'])
                {
                    if ($person['main'])
                    {
                        $query = $this->db->prepare("update tree_persons set photo=?,description=? where id=? and id_user=?");
                        if (!$query->execute(array(basename($_POST['image']),$_POST['description'],$_POST['id'],$_SESSION['user']['id_user']))) $res['error'][] = "Ошибка базы данных";
                    }
                    else
                    {
                        $query = $this->db->prepare("update tree_persons set name=?,life_start=?,life_end=?,photo=?,description=?,gender=? where id=? and id_user=?");
                        if (!$query->execute(array($_POST['name'],$_POST['life_start'],$_POST['life_end'],basename($_POST['image']),$_POST['description'],$_POST['gender'],$_POST['id'],$_SESSION['user']['id_user']))) $res['error'][] = "Ошибка базы данных";
                    }

                }
                else
                {
                    $query = $this->db->prepare("insert into tree_persons(id_user,name,life_start,life_end,photo,description,gender) values(?,?,?,?,?,?,?)");
                    if (!$query->execute(array($_SESSION['user']['id_user'],$_POST['name'],$_POST['life_start'],$_POST['life_end'],basename($_POST['image']),$_POST['description'],$_POST['gender']))) $res['error'][] = "Ошибка базы данных";
                }

                if (!$this->save_tree()) $res['error'][] = "Ошибка базы данных";

                if (!$res['error'])
                {
                    $this->db->commit();
                    $res['success'] = true;
                }
                else $this->db->rollBack();
            }
        }

        echo json_encode($res);
    }

    function save_tree($tree=false,$id_user=false)
    {
        if (!$id_user) $id_user = $_SESSION['user']['id_user'];
        if (!$tree) $tree = $this->build_tree($id_user);
        $query = $this->db->prepare("update users set tree=? where id_user=?");
        if ($query->execute(array($tree,$id_user))) return true;
    }

    function check_date($date)
    {
        list($dd,$mm,$yy)=explode(".",$date);
        if (is_numeric($yy) && is_numeric($mm) && is_numeric($dd))
        {
            if (!checkdate($mm,$dd,$yy)) return false;
        }
        else return false;

        return true;
    }

    function convert_date($date,$db_format=false)
    {
        if ($date != "")
        {
            if ($db_format) $d = implode('-', array_reverse(explode('.', $date)));
            else $d = implode('.', array_reverse(explode('-', $date)));
            return $d;
        }
    }

    function update_main($id)
    {
        $user = $this->get_controller("users")->get_user($this->id);
        $gender = $user['gender'];
    }


    function save_link()
    {
        $this->check_access();
        if ($_POST['person1'] == "") $res['error'] = "Человек не выбран";
        if ($_POST['person2'] == "") $res['error'] = "Человек не выбран";
        if ($_POST['type'] != "marriage" && $_POST['type'] != "child") $res['error'] = "Выбран неверный тип связи";

        $_POST['person1'] = (int) $_POST['person1'];
        $_POST['person2'] = (int) $_POST['person2'];
        if ($_POST['person1'] != "" && $_POST['person1'] != "")
        {
            $count = $this->db->num_rows("tree_persons where id IN ({$_POST['person1']},{$_POST['person2']}) and id_user = '{$_SESSION['user']['id_user']}'");
            if ($count < 2) $res['error'] = "Переданы неверные данные";
        }

        if (!$res['error'])
        {
            $this->db->beginTransaction();
            $query = $this->db->prepare("insert into tree_links (id_user,id_person1,id_person2,type) values(?,?,?,?)");
            if (!$query->execute(array($_SESSION['user']['id_user'],$_POST['person1'],$_POST['person2'],$_POST['type'])))
            {
                if ($query->errorCode() == "23000") $res['error'] = "Связь между людьми уже установлена";
                else $res['error'] = "Ошибка базы данных";
            }
            else
            {
                $tree = $this->build_tree();
                if (!$this->save_tree($tree)) $res['error'][] = "Ошибка базы данных";
            }

            if (!$res['error'])
            {
                $this->db->commit();
                $res['success'] = $tree;
            }
            else $this->db->rollBack();
        }

        echo json_encode($res);
    }

    function delete_person()
    {
        $this->check_access();

        $id = (int) $_POST['id'];
        if ($id < 1) $res['error'] = "Переданы неверные параметры";

        $query = $this->db->prepare("select * from tree_persons where id=? and id_user=? and main IS NOT NULL");
        $query->execute(array($id,$_SESSION['user']['id_user']));
        if ($query->fetch()) $res['error'] = "Нельзя удалить самого себя";

        if (!$res['error'])
        {
            $query = $this->db->prepare("delete from tree_persons where id=? and id_user=? LIMIT 1");
            $this->db->beginTransaction();
            if (!$query->execute(array($id,$_SESSION['user']['id_user']))) $res['error'] = "Ошибка базы данных";
            $tree = $this->build_tree();
            if (!$this->save_tree($tree)) $res['error'] = "Ошибка базы данных";

            if (!$res['error'])
            {
                $this->db->commit();
                $res['success'] = $tree;
            }
            else $this->db->rollBack();
        }

        echo json_encode($res);
    }

    function delete_link()
    {
        $this->check_access();
        list($id1,$id2) = explode("-",$_POST['id']);

        $id1 = (int) $id1;
        $id2 = (int) $id2;
        if ($id1 < 1 || $id2 < 1) $res['error'] = "Переданы неверные параметры";

        if (!$res['error'])
        {
            $query = $this->db->prepare("delete from tree_links where id_person1=? and id_person2=? and id_user=? LIMIT 1");
            $this->db->beginTransaction();
            if (!$query->execute(array($id1,$id2,$_SESSION['user']['id_user']))) $res['error'] = "Ошибка базы данных";
            $tree = $this->build_tree();
            if (!$this->save_tree($tree)) $res['error'] = "Ошибка базы данных";

            if (!$res['error'])
            {
                $this->db->commit();
                $res['success'] = $tree;
            }
            else $this->db->rollBack();
        }

        echo json_encode($res);
    }

    function build_legend($dpi=false)
    {
        if (!$this->id) $gender = $_SESSION['user']['gender'];
        else
        {
            $user = $this->get_controller("users")->get_user($this->id);
            $gender = $user['gender'];
        }
        require_once(ROOT.'libraries/GraphViz.php');
        $l = new \Image_GraphViz();

        $settings = array(
            "nodesep" => "0.1",
            'ranksep' => '0.1',
            'dpi' => 50,
            //  'ratio' => "compress",
            'rankdir' => 'LR',
            // 'outputorder' => 'edgesfirst'
        );
        if ($dpi) $settings['dpi'] = $dpi;

        $l->setAttributes($settings);
      //  $l->addCluster('test2', '', array('rank' => 'same'));
        $l->addNode(
            'F',
            array(
                'label' => 'Женщина',
                'shape' => "ellipse",
                'fontsize' => '12',
                'fontname' => 'Tahoma,sans-serif',
                'color' => $this->colors_line['female'],
                'style' => "filled",
                'margin' => "0.1,0.1",
                "fillcolor" => $this->colors_line['female'],
                'labelloc' => 'c',
            )
        );
        $l->addNode(
            'M',
            array(
                'label' => 'Мужчина',
                'shape' => "box",
                'fontsize' => '12',
                'fontname' => 'Tahoma,sans-serif',
                'color' => $this->colors_line['male'],
                'style' => "filled",
                'margin' => "0.1,0.1",
                "fillcolor" => $this->colors_line['male'],
                'labelloc' => 'c',
            )
        );
        $l->addNode(
            'I',
            array(
                'label' => 'Создатель\n древа',
                'shape' => $gender == "f" ? "ellipse" : "box",
                'fontsize' => '12',
                'fontname' => 'Tahoma,sans-serif',
                'color' => $this->colors_line['main'],
                'style' => "filled",
                'margin' => "0.1,0.1",
                "fillcolor" => $this->colors_line['main'],
                'labelloc' => 'c',
            )
        );

      //  $l->addCluster('test1', '', array('rank' => 'same','style' => 'filled','color' => '#ffffff'));
        $l->addNode('M1',array('shape' => 'none','label' => '','width' => "0"));
        $l->addNode('M2',
            array(
                'shape' => 'plaintext',
                'label' => '',
                'fontsize' => '14',
                'fontname' => 'Tahoma,sans-serif',
                'margin' => "0,0",
                'labelloc' => 'c',
        ));
        $l->addNode('F1',array('shape' => 'none','label' => '','width' => "0"));
        $l->addNode('F2',
            array(
                'shape' => 'plaintext',
                'label' => '',
                'fontsize' => '14',
                'fontname' => 'Tahoma,sans-serif',
                'margin' => "0,0",
                'labelloc' => 'c',
            ));
        $l->addNode('M3',array('shape' => 'none','label' => '','width' => "0"));
        $l->addNode('M4',
            array(
                'shape' => 'plaintext',
                'label' => '',
                'fontsize' => '14',
                'fontname' => 'Tahoma,sans-serif',
                'margin' => "0,0",
                'labelloc' => 'c',
            ));

        $l->addEdge(
            array(
                'F' => 'M'
            ),
            array(
                'style' => 'invis'
            )
        );
        $l->addEdge(
            array(
                'M' => 'I'
            ),
            array(
                'style' => 'invis'
            )
        );
        $l->addEdge(
            array(
                'I' => 'M1'
            ),
            array(
                'style' => 'invis'
            )
        );
        $l->addEdge(
            array(
                'M2' => 'F1'
            ),
            array(
                'style' => 'invis'
            )
        );
        $l->addEdge(
            array(
                'F2' => 'M3'
            ),
            array(
                'style' => 'invis'
            )
        );

        $l->addEdge(
            array(
                'M1' => 'M2'
            ),
            array(
                'color' => $this->colors_line['marriage'],
                'style' => 'solid',
                'arrowhead' => 'normal',
                'label' => '   Связь "Брак"',
                'dir' => 'both',
                'penwidth' => 4,
                'minlen' => '1',
                'headclip' => false, // Точки входа в ноду
                'tailclip' => false, // Точки входа в ноду
            )
        );

        $l->addEdge(
            array(
                'F1' => 'F2'
            ),
            array(
                'color' => $this->colors_line['female'],
                'style' => 'solid',
                'arrowhead' => 'normal',
                'label' => 'Связь "Мать-Ребенок"',
                'penwidth' => 2,
                'minlen' => '1',
                'headclip' => false, // Точки входа в ноду
                'tailclip' => false, // Точки входа в ноду
            )
        );
        $l->addEdge(
            array(
                'M3' => 'M4'
            ),
            array(
                'color' => $this->colors_line['male'],
                'style' => 'solid',
                'arrowhead' => 'normal',
                'label' => 'Связь "Отец-Ребенок"',
                'penwidth' => 2,
                'minlen' => '1',
                'headclip' => false, // Точки входа в ноду
                'tailclip' => false, // Точки входа в ноду
            )
        );

        $legend = $l->fetch("svg");
        preg_match("/<svg(.*)<\/svg>/siU",$legend,$matches);
        $legend = $matches[0];
        $legend = str_replace("source","/source",$legend);
        $legend = preg_replace("/<title>(.*)<\/title>/siU","",$legend);

        require_once(ROOT.'libraries/simple_html_dom.php');
        $html = str_get_html($legend);
        if ($html)
        {
            $element = $html->find('svg',0);
            $width = str_replace("pt","",$element->width);
            $height = str_replace("pt","",$element->height);
            $element->viewbox = "0.00 0.00 {$width}.00 {$height}.00";
            $legend = $html->save();
        }
        return $legend;        
    }

    function build_tree($id_user=false,$dpi=false)
    {
        if (!$id_user) $id_user = $_SESSION['user']['id_user'];
        $block = "<TABLE BORDER='0' CELLBORDER='0' CELLSPACING='2' CELLPADDING='0'>
                    <TR>
                        <TD VALIGN='TOP' WIDTH='40' HEIGHT='40' FIXEDSIZE='TRUE'><IMG SRC='%s'  /></TD>
                        <TD BALIGN='LEFT' VALIGN='TOP'>%s <br/><FONT POINT-SIZE='3'> </FONT><br/><FONT POINT-SIZE='7'>%s</FONT></TD>
                    </TR>
                    </TABLE>";
        require_once(ROOT.'libraries/GraphViz.php');

        $graph = new \Image_GraphViz();
      //  $graph->dotCommand = "circo";
        $settings = array(
             //       "splines" => "ortho",
               // "nodesep" => "0.6",
             // 'ranksep' => '1.4',
            //  'rankdir' => 'LR',
         //   'ratio' => "compress",
             //  'concentrate' => true,
             'overlap' => 'false',
            //   'splines' => false, //гладкие ребра
            // 'compound' => true
            //     "label" => "Древо Васильевых",
        );
        if ($dpi) $settings['dpi'] = $dpi;

        $graph->setAttributes($settings);

        $query = $this->db->prepare("select t.*,tp.gender
                                  from tree_links as t
                                  LEFT JOIN tree_persons as tp ON t.id_person1=tp.id
                                  where t.id_user=?");
        $query->execute(array($id_user));

        while ($row = $query->fetchObject()) $edges[] = $row;
        $query = $this->db->prepare("select * from tree_persons where id_user=? and main IS NOT NULL");
        $query->execute(array($id_user));
        $id_user_line = $query->fetch();
        $line = $this->generate_line_foreach($id_user_line['id'],$edges);

        if ($edges)
        foreach ($edges as $row)
        {
            $color_edge = false;
            $dir = false;

            switch ($row->type)
            {
                case "marriage":
                    if (in_array($row->id_person1,$line) && in_array($row->id_person2,$line)) $color_edge = $this->colors_line['marriage'];
                    else $color_edge = $this->colors['marriage'];

                    $dir = "both";
                    $label = "брак";
                    $penwidth = 4;
                    break;
                case "child":
                    if (in_array($row->id,$line['edges']))
                    {
                        if ($row->gender == "f") $color_edge = $this->colors_line['female'];
                        else if ($row->gender == "m") $color_edge = $this->colors_line['male'];
                    }
                    else
                    {
                        if ($row->gender == "f") $color_edge = $this->colors['female'];
                        else if ($row->gender == "m") $color_edge = $this->colors['male'];
                    }
                    $penwidth = 2;
                    $label = "ребенок";
            }

            $graph->addEdge(
                array(
                    $row->id_person1 => $row->id_person2
                ),
                array(
                   // 'label' => $label,
                    'color' => $color_edge,
                    'style' => 'solid',
                    'arrowhead' => 'normal',
                    'dir' => $dir,
                    'penwidth' => $penwidth,
                    'id' => $row->id_person1."-".$row->id_person2,
                )
            );
        }

        $query = $this->db->prepare("select * from tree_persons where id_user=? order by main,id DESC");
        $query->execute(array($id_user));
        while ($row = $query->fetch())
        {
            if (in_array($row['id'],$line))
            {
                if ($row['main']) $color = $this->colors_line['main'];
                else if ($row['gender'] == "f") $color = $this->colors_line['female'];
                else $color = $this->colors_line['male'];
            }
            else
            {
                if ($row['gender'] == "f") $color = $this->colors['female'];
                else $color = $this->colors['male'];
            }

            $row['life_start'] = $this->convert_date($row['life_start']);
            $row['life_end'] = $this->convert_date($row['life_end']);

            if ($row['photo'] == "")
            {
                if ($row['gender'] == "f") $photo = "source/images/no-ava-profile_f.jpg";
                else $photo = "source/images/no-ava-profile.jpg";
            }
            else $photo = "uploads/users/tree/".real_path($row['photo']);

            $life = "";
            if ($row['life_start'] || $row['life_end']) $life .= "(";
            if ($row['life_start']) $life .= $row['life_start'];
            if ($row['life_start'] || $row['life_end']) $life .= " - ";
            if ($row['life_end'])
            {
                if ($row['life_start']) $life .= "<br/>";
                $life .= $row['life_end'];
            }
            if ($row['life_start'] || $row['life_end']) $life .= ")";
            if ($life == "") $life = " ";

        //    $graph->addSubgraph('type', '', array('rank' => 'same'));
            //$graph->addCluster('test2', '', array('rank' => 'same'));
            $graph->addNode(
                $row['id'],
                array(
                    'label' => sprintf($block,$photo,str_replace(" ","<br/>",$row['name']),$life),
                    'shape' => $row['gender'] == "f" ? "ellipse" : "box",
                    'fontsize' => '10',
                    'fontname' => 'arial,sans-serif',
                    'color' => $color,
                    'style' => "filled",
                    'margin' => $row['gender'] == "f" ? "0,0" : "0.03,0.03",
                    "fillcolor" => $color,
                    'labelloc' => 'c',
                    'id' => $row['id'],
                    'URL' => "/users/tree/biography/{$row['id']}/"
                )
            );
        }

        $tree = $graph->fetch("svg");

        preg_match("/<svg(.*)<\/svg>/siU",$tree,$matches);
        $tree = $matches[0];
        $tree = str_replace("source","/source",$tree);
        $tree = str_replace("uploads","/uploads",$tree);
        $tree = preg_replace("/<title>(.*)<\/title>/siU","",$tree);
        $tree = str_replace("xlink:title=\"&lt;TABLE&gt;\"","",$tree);
        $tree = str_replace("<svg","<svg id='tree_graph' ",$tree);

        require_once(ROOT.'libraries/simple_html_dom.php');
        $html = str_get_html($tree);
        if ($html)
        {
            $element = $html->find('svg',0);
            $width = str_replace("pt","",$element->width);
            $height = str_replace("pt","",$element->height);
            $element->viewbox = "0.00 0.00 {$width}.00 {$height}.00";
            $tree = $html->save();
        }

        return $tree;
    }

    function sort_comments($v1, $v2){
        if($v1->id < $v2->id) return -1;
        elseif($v1->id > $v2->id) return 1;
        else return 0;
    }

    function generate_line_foreach($id,$a, $res=array(), $second=false)
    {
        if ($a)
        {
            foreach ($a as $k => $v)
            {
                if ($v->id_person2 == $id && $v->type == "child")
                {
                    $res[] = $v->id_person1;
                    $res['edges'][] = $v->id;
                    $res = $this->generate_line_foreach($v->id_person1,$a,$res);
                }
            }
        }
        $res[] = $id;
        $res = array_unique($res);
        $res['edges'] = array_unique($res['edges']);
        return $res;
    }
}

