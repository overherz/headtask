<?php
namespace projects;

class forum extends \Admin {

    private  $limit = 15;
    private  $limit_posts = 15;
    private  $limit_new_posts = 3;

    function default_method()
    {
        switch($_POST['act'])
        {
            case "save_forum":
                $this->save_forum();
                break;
            case "delete_forum":
                $this->delete_forum();
                break;
            case "save_topic":
                $this->save_topic();
                break;
            case "delete_topic":
                $this->delete_topic();
                break;
            case "save_post":
                $this->save_post();
                break;
            case "edit_post":
                $this->edit_post();
                break;
            case "delete_post":
                $this->delete_post();
                break;
            case "subscribe":
                $this->subscribe();
                break;
            case "unsubscribe":
                $this->unsubscribe();
                break;
            case "set_all_read":
                $this->set_all_read();
                break;
            default: $this->show();
        }
    }

    function show()
    {
        switch($this->id)
        {
            case "add":
            case "edit":
                $this->add_or_edit_forum($this->id);
                break;
            case "show":
                $this->show_forum();
                break;
            case "add_topic":
            case "edit_topic":
                $this->add_or_edit_topic($this->id);
                break;
            case "show_topic":
                $this->show_topic();
                break;
            case "new_posts":
                $this->new_posts();
                break;
            default: $this->show_forums();
        }
    }

    function new_posts()
    {
        $access = $this->get_controller("projects","users")->get_access($this->_0);
        $project = $access['project'];

        crumbs($project['name'],"/projects/~{$project['id']}/");
        crumbs("Форум","/projects/forum/{$project['id']}/");
        crumbs("Новые сообщения");

        $query = $this->db->prepare("SELECT count(distinct t.id) as count
            FROM projects_topics as t
            LEFT JOIN projects_posts as p ON p.id_topic=t.id
            LEFT JOIN projects_forums as f ON t.id_forum=f.id
            LEFT JOIN projects_forums_subscribes as r ON p.id_topic=r.id_topic
            WHERE f.id_project=? and r.id_user =? and p.created > last_action

            order by p.created DESC
        ");
        $query->execute(array($this->_0,$_SESSION['user']['id_user']));
        $count = $query->fetch();

        require_once(ROOT.'libraries/paginator/paginator.php');
        $paginator = new \Paginator($count['count'], $_POST['page'], $this->limit_new_posts);

        $query = $this->db->prepare("SELECT f.name as forum_name,t.name as topic_name,f.id as forum_id,t.id, r.last_action,(select count(id) from projects_posts where id_topic=t.id and created > r.last_action) as count
            FROM projects_topics as t
            LEFT JOIN projects_posts as p ON p.id_topic=t.id
            LEFT JOIN projects_forums as f ON t.id_forum=f.id
            LEFT JOIN projects_forums_subscribes as r ON p.id_topic=r.id_topic
            WHERE f.id_project=? and r.id_user =? and p.created > last_action
            group by t.id
            order by p.created DESC
            LIMIT {$this->limit_new_posts}
            OFFSET {$paginator->get_range('from')}
        ");

        $query->execute(array($this->_0,$_SESSION['user']['id_user']));
        $new_posts = $query->fetchAll();

        $this->set_global('id_project',$access['project']['id']);
        $data = array(
            'new_posts' => $new_posts,
            'access' => $access['access'],
            //'projects' => $this->get_controller("projects")->get_projects($access['project']['id']),
            'forum_button' => true,
            'paginator' => $paginator,
            'project' => $access['project']
        );

        if ($_POST)
        {
            if ($text = $this->layout_get('/forum/new_posts_table.html',$data)) $result['success'] = $text;
            else $result['error'] = "Ничего не найдено";

            echo json_encode($result);
        }
        else $this->layout_show('/forum/new_posts.html',$data);
    }

    function add_or_edit_forum($mode)
    {
        if ($mode == "add")
        {
            $id_project = $this->_0;
            $add_forum_button = true;
        }
        else
        {
            if ($forum = $this->get_forum($this->_0))
            {
                $id_project = $forum['id_project'];
                $forum_button =  true;
            }
            else $this->error_page();
        }

        $access = $this->get_controller("projects","users")->get_access($id_project);
        if (!$access['access']['forum']) $this->error_page("denied");
        else
        {
            $project = $access['project'];

            crumbs($project['name'],"/projects/~{$project['id']}/");
            crumbs("Форум","/projects/forum/{$project['id']}");
            if ($forum) crumbs("Редактирование \"{$forum['name']}\"");
            else crumbs("Добавление нового раздела");

            $this->set_global('id_project',$project['id']);
            $this->layout_show('forum/add_forum.html',array(
               // 'projects' => $this->get_controller("projects")->get_projects($project['id']),
                'add_forum_button' => $add_forum_button,
                'project' => $project,
                'access' => $access['access'],
                'forum' => $forum,
                'forum_button' => $forum_button
            ));
        }
    }

    function show_forums()
    {
        $access = $this->get_controller("projects","users")->get_access($this->id);
        if ($project = $access['project'])
        {
            crumbs($project['name'],"/projects/~{$project['id']}/");
            crumbs("Форум");

            $query = $this->db->prepare("select pf.*,count(distinct pt.id) as count_topics,count(pp.id) as count_posts
                    from projects_forums as pf
                    LEFT JOIN projects_topics as pt ON pf.id=pt.id_forum
                    LEFT JOIN projects_posts as pp ON pt.id=pp.id_topic
                    where id_project=?
                    group by pf.id
                    order by name ASC
                ");
            $query->execute(array($this->id));
            while ($row = $query->fetch())
            {
                $forums[$row['id']] = $row;
                $ids[] = $row['id'];
            }

            if ($forums)
            {
                $ids = implode(",",$ids);
                $query = $this->db->query("SELECT t.id,t.id_forum,p.created,u.id_user,u.nickname,u.first_name,u.last_name,t.name,g.color,g.name as group_name
                        FROM projects_posts p JOIN projects_topics t ON p.id_topic = t.id
                        LEFT JOIN users as u ON u.id_user=p.author
                        LEFT JOIN groups as g ON u.id_group=g.id
                        WHERE NOT EXISTS (
                            SELECT * FROM projects_posts p2 JOIN projects_topics t2 ON p2.id_topic = t2.id
                            WHERE t.id_forum = t2.id_forum AND p.created < p2.created
                        ) and t.id_forum IN ({$ids})");

                while ($row = $query->fetch())
                {
                    $forums[$row['id_forum']]['last'] = array(
                        'id' => $row['id'],
                        'name' => $row['name'],
                        'author' => array('id_user' => $row['id_user'],'fio' => build_user_name($row['first_name'],$row['last_name']),'nickname' => $row['nickname']),
                        'created' => $row['created'],
                        'color' => $row['color'],
                        'group_name' => $row['group_name']
                    );
                }
            }

            $this->set_global('id_project',$project['id']);
            $data = array(
                'project' => $project,
              //  'projects' => $this->get_controller("projects")->get_projects($project['id']),
                'forum_button' => true,
                'access' => $access['access'],
                'forums' => $forums,
                'new_post_count' => $this->get_new_forum_post_count($this->id)
            );

            $this->layout_show('forum/forum.html',$data);
        }
        else $this->error_page();
    }

    function show_forum()
    {
        $id_forum = $this->_0;
        if ($forum = $this->get_forum($id_forum))
        {
            $access = $this->get_controller("projects","users")->get_access($forum['id_project']);

            crumbs($access['project']['name'],"/projects/~{$access['project']['id']}/");
            crumbs("Форум","/projects/forum/{$access['project']['id']}");
            crumbs($forum['name']);

            $total = $this->db->num_rows("projects_topics where id_forum={$this->db->quote($id_forum)} and fixed IS NULL");
            require_once(ROOT.'libraries/paginator/paginator.php');
            $paginator = new \Paginator($total, $_POST['page'], $this->limit);

            $query = $this->db->prepare("select t.*,(select count(*) from projects_posts where id_topic=t.id) as count_posts,
                    p.created,u.id_user,u.first_name,u.last_name,u.nickname,t.created as topic_created,g.color,g.name as group_name
                    from projects_topics t
                    LEFT JOIN projects_posts as p ON p.id_topic=t.id
                    LEFT JOIN users as u ON p.author=u.id_user
                    LEFT JOIN groups as g ON u.id_group=g.id
                    where id_forum=? and t.fixed IS NULL and p.id = (select max(id) from projects_posts where id_topic=t.id)
                    group by t.id
                    order by p.created DESC
                    LIMIT {$this->limit}
                    OFFSET {$paginator->get_range('from')}");
            $query->execute(array($id_forum));
            while ($row = $query->fetch())
            {
                $row['fio'] = build_user_name($row['first_name'],$row['last_name']);
                $topics[$row['id']] = $row;
                if ($row['author'] != "") $ids[] = $row['author'];
            }

            $query = $this->db->prepare("select t.*,(select count(*) from projects_posts where id_topic=t.id) as count_posts,
                    p.created,u.id_user,u.first_name,u.last_name,u.nickname,t.created as topic_created,g.color,g.name as group_name
                    from projects_topics t
                    LEFT JOIN projects_posts as p ON p.id_topic=t.id
                    LEFT JOIN users as u ON p.author=u.id_user
                    LEFT JOIN groups as g ON u.id_group=g.id
                    where id_forum=? and t.fixed IS NOT NULL and p.id = (select max(id) from projects_posts where id_topic=t.id)
                    group by t.id
                    order by p.created DESC");
            $query->execute(array($id_forum));
            while ($row = $query->fetch())
            {
                $row['fio'] = build_user_name($row['first_name'],$row['last_name']);
                $fixed_topics[$row['id']] = $row;
                if ($row['author'] != "") $ids[] = $row['author'];
            }

            if ($topics)
            {
                $ids = implode(",",$ids);
                $query = $this->db->query("select u.nickname,u.id_user,u.first_name,u.last_name,g.color,g.name as group_name
                    from users as u
                    LEFT JOIN groups as g ON u.id_group=g.id
                    where id_user IN({$ids})
                ");
                while ($row = $query->fetch())
                {
                    $row['fio'] = build_user_name($row['first_name'],$row['last_name']);
                    $authors[$row['id_user']] = $row;
                }
            }

            $this->set_global('id_project',$access['project']['id']);
            $data = array(
                'forum' => $forum,
                'project' => $access['project'],
             //   'projects' => $this->get_controller("projects")->get_projects($access['project']['id']),
                'forum_button' => true,
                'access' => $access['access'],
                'paginator' => $paginator,
                'topics' => $topics,
                'fixed_topics' => $fixed_topics,
                'authors' => $authors,
                'new_post_count' => $this->get_new_forum_post_count($forum['id_project'])
            );

            if ($_POST)
            {
                if ($text = $this->layout_get('forum/topics.html',$data)) $result['success'] = $text;
                else $result['error'] = "Ничего не найдено";

                echo json_encode($result);
            }
            else $this->layout_show('forum/forum_show.html',$data);
        }
        else $this->error_page();
    }

    function show_topic()
    {
        if ($topic = $this->get_topic($this->_0))
        {
            $forum = $this->get_forum($topic['id_forum']);
            $access = $this->get_controller("projects","users")->get_access($forum['id_project']);

            crumbs($access['project']['name'],"/projects/~{$access['project']['id']}/");
            crumbs("Форум","/projects/forum/{$access['project']['id']}/");
            crumbs($forum['name'],"/projects/forum/show/{$topic['id_forum']}/");
            crumbs($topic['name']);

            $total = $this->db->num_rows("projects_posts where id_topic={$this->db->quote($topic['id'])}");
            require_once(ROOT.'libraries/paginator/paginator.php');
            $paginator = new \Paginator($total, $_GET['page'], $this->limit_posts);

            $query = $this->db->prepare("select p.*,u.first_name,u.last_name,u.nickname,u.id_user,u.avatar,u.last_user_action,g.color,g.name as group_name
                    from projects_posts as p
                    LEFT JOIN users as u ON p.author=u.id_user
                    LEFT JOIN groups as g ON u.id_group=g.id
                    where id_topic=?
                    order by p.created ASC
                    LIMIT {$this->limit}
                    OFFSET {$paginator->get_range('from')}");

            $query->execute(array($topic['id']));
            while ($row = $query->fetch())
            {
                $row['fio'] = build_user_name($row['first_name'],$row['last_name']);
                $posts[] = $row;
            }

            $query = $this->db->prepare("update projects_topics set number_of_views = number_of_views + 1 where id=?");
            $query->execute(array($topic['id']));

            $first_post = $this->get_first_post($this->_0);
            $this->update_subscribe($this->_0);
            $topic['subscribe'] = $this->check_subscribe($this->_0);

            $this->set_global('id_project',$access['project']['id']);
            $this->layout_show("forum/show_topic.html",array(
              //  'projects' => $this->get_controller("projects")->get_projects($access['project']['id']),
                'project' => $access['project'],
                'access' => $access['access'],
                'posts' => $posts,
                'paginator' => $paginator,
                'topic' => $topic,
                'forum_button' => true,
                'first_post' => $first_post['id']
            ));
        }
        else $this->error_page();
    }

    function add_or_edit_topic($mode)
    {
        if ($mode == "edit_topic")
        {
            if ($topic = $this->get_topic($this->_0))
            {
                $forum = $this->get_forum($topic['id_forum']);
                if ($post = $this->get_first_post($topic['id'])) $topic['text'] = $post['text'];
                else $this->error_page();
            }
        }
        else $forum = $this->get_forum($this->_0);


        if ($forum)
        {
            $access = $this->get_controller("projects","users")->get_access($forum['id_project']);
            if ($topic && !$access['access']['forum']) $this->error_page('denied');

            crumbs($access['project']['name'],"/projects/~{$access['project']['id']}/");
            crumbs("Форум","/projects/forum/{$access['project']['id']}");
            crumbs($forum['name'],"/projects/forum/show/{$forum['id']}/");
            crumbs("Редактирование темы");

            $this->set_global('id_project',$access['project']['id']);
            $this->layout_show("forum/add_topic.html",array(
               // 'projects' => $this->get_controller("projects")->get_projects($access['project']['id']),
                'project' => $access['project'],
                'access' => $access['access'],
                'topic' => $topic
            ));
        }
        else $this->error_page();
    }

    function get_forum($id)
    {
        $query = $this->db->prepare("select * from projects_forums where id=?");
        $query->execute(array($id));
        return $query->fetch();
    }

    function get_topic($id)
    {
        $query = $this->db->prepare("select * from projects_topics where id=?");
        $query->execute(array($id));
        return $query->fetch();
    }

    function save_forum()
    {
        if ($_POST['id'])
        {
            $forum = $this->get_forum($_POST['id']);
            $id_project = $forum['id_project'];
        }
        else $id_project = $this->_0;

        $access = $this->get_controller("projects","users")->get_access($id_project);
        $project = $access['project'];

        if ($_POST['name'] == "") $res['error'] = "Введите название";
        if (!$access['access']['forum']) $res['error'] = "У Вас недостаточно прав";

        if (!$res['error'])
        {
            $log = $this->get_controller("projects","logs");
            if ($_POST['id'])
            {
                $query = $this->db->prepare("update projects_forums set name=? where id=?");
                if ($query->execute(array($_POST['name'],$_POST['id'])))
                {
                    $res['success'] = $project['id'];
                    if ($forum['name'] != $_POST['name']) $log_text = ". Название изменено на \"{$_POST['name']}\"";
                    if ($log) $log->set_logs("forum",$id_project,"Изменил раздел форума <a href='/projects/forum/show/{$forum['id']}'>{$forum['name']}</a>{$log_text}","edit");
                }
                else $res['error'] = "Ошибка сохранения раздела форума";
            }
            else
            {
                $query = $this->db->prepare("insert into projects_forums(name,id_project) values(?,?)");
                if ($query->execute(array($_POST['name'],$id_project)))
                {
                    $last_id = $this->db->lastInsertId();
                    $res['success'] = $project['id'];
                    if ($log) $log->set_logs("forum",$id_project,"Добавил раздел форума <a href='/projects/forum/show/{$last_id}'>{$_POST['name']}</a>","add");
                }
                else $res['error'] = "Ошибка добавления раздела форума";
            }
        }
        echo json_encode($res);
    }

    function delete_forum()
    {
        $forum = $this->get_forum($_POST['id']);
        $access = $this->get_controller("projects","users")->get_access($forum['id_project']);

        if ($access['access']['forum'])
        {
            $query = $this->db->prepare("delete from projects_forums where id=?");
            if ($query->execute(array($_POST['id'])))
            {
                $log = $this->get_controller("projects","logs");
                $res['success'] = $access['project']['id'];
                $log->set_logs("forum",$access['project']['id'],"Удален раздел форума {$forum['name']}","delete");
            }
            else $res['error'] = "Ошибка базы данных";
        }
        else $res['error'] = "У Вас недостаточно прав";

        echo json_encode($res);
    }

    function save_topic()
    {
        if ($this->_0 && $_POST['id'] == "")
        {
            if ($forum = $this->get_forum($this->_0)) $id_project = $forum['id_project'];
            else $res['error'][] = "Раздел форума не найден";
        }
        else if ($_POST['id'] != "")
        {
            if ($topic = $this->get_topic($this->_0))
            {
                $forum = $this->get_forum($topic['id_forum']);
                $id_project = $forum['id_project'];
                $post = $this->get_first_post($topic['id']);
            }
        }
        else $res['error'][] = "Передан неверный id раздела форума";

        $access = $this->get_controller("projects","users")->get_access($id_project);

        if ($_POST['name'] == "") $res['error'][] = "Введите название";
        if ($_POST['text'] == "") $res['error'][] = "Введите текст";

        if ($topic)
        if (!$access['access']['forum'] && $_POST['id'] != "") $res['error'] = "У Вас недостаточно прав";

        $this->db->beginTransaction();

        if (!$res['error'])
        {
            if ($_POST['id'])
            {
                $query = $this->db->prepare("update projects_topics set name=?,fixed=?,closed=? where id=?");
                if ($query->execute(array($_POST['name'],$_POST['fixed'],$_POST['closed'],$_POST['id'])))
                {
                    $query = $this->db->prepare("update projects_posts set text=? where id=?");
                    if (!$query->execute(array($_POST['text'],$post['id']))) $res['error'] = "Ошибка сохранения сообшения";
                    else $id_topic = $_POST['id'];
                }
                else $res['error'] = "Ошибка сохранения темы";
            }
            else
            {
                $query = $this->db->prepare("insert into projects_topics(name,id_forum,author,created,fixed,closed) values(?,?,?,?,?,?)");
                if ($query->execute(array($_POST['name'],$forum['id'],$_SESSION['user']['id_user'],time(),$_POST['fixed'],$_POST['closed'])))
                {
                    $last_id = $this->db->lastInsertId();

                    $query = $this->db->prepare("insert into projects_posts(text,id_topic,author,created) values(?,?,?,?)");
                    if (!$query->execute(array($_POST['text'],$last_id,$_SESSION['user']['id_user'],time()))) $res['error'] = "Ошибка сохранения сообшения";
                    else
                    {
                        if (!$this->subscribe_always($last_id)) $res['error'] = "Ошибка базы данных";
                        $id_topic = $last_id;

                        $log = $this->get_controller("projects","logs");
                        if ($log) $log->set_logs("forum",$id_project,"Создана тема <a href='/projects/forum/show_topic/{$id_topic}'>{$_POST['name']}</a>","add");
                    }
                }
                else $res['error'] = "Ошибка добавления темы";
            }
        }

        if ($res['error']) $this->db->rollBack();
        else
        {
            $this->db->commit();
            $res['success'] = $id_topic;
        }

        echo json_encode($res);
    }

    function save_post()
    {
        $id_topic = $this->_0;
        $topic = $this->get_topic($id_topic);
        $id_project = $this->get_id_project_from_topic($id_topic);
        $access = $this->get_controller("projects","users")->get_access($id_project);

        require_once(ROOT.'libraries/simple_html_dom.php');

        if ($_POST['id'] == "") $_POST['text'] = $_POST['text_bottom'];

        $html = str_get_html($_POST['text']);
        if ($html)
        {
            foreach ($html->find('script') as $element) $element->outertext = (string)$element->innertext;
            $_POST['text'] = $html->save();
        }

        if ($_POST['text'] == "") $res['error'] = "Введите текст";
        if ($_POST['id'] == "" && $topic['closed']) $res['error'] = "Тема закрыта";

        $this->db->beginTransaction();
        if (!$res['error'])
        {
            if ($_POST['id'])
            {
                $query = $this->db->prepare("update projects_posts set text=? where id=?");
                if ($query->execute(array($_POST['text'],$_POST['id']))) $data_success = array('text' => $_POST['text']);
                else $res['error'] = "Ошибка сохранения сообщения";
            }
            else
            {
                $query = $this->db->prepare("insert into projects_posts(text,author,id_topic,created) values(?,?,?,?)");
                if ($query->execute(array($_POST['text'],$_SESSION['user']['id_user'],$id_topic,time())))
                {
                    $total = $this->db->num_rows("projects_posts where id_topic={$this->db->quote($id_topic)}");
                    require_once(ROOT.'libraries/paginator/paginator.php');
                    $paginator = new \Paginator($total, 1, $this->limit_posts);
                    $data_success = array('id' => $id_topic,'page' => $paginator->pages);
                }
                else $res['error'] = "Ошибка добавления сообщения";

                if (!$this->subscribe_always($id_topic)) $res['error'] = "Ошибка базы данных";
            }
        }

        if (!$res['error'])
        {
            $this->db->commit();
            $res['success'] = $data_success;
        }
        else $this->db->rollBack();

        echo json_encode($res);
    }

    function delete_topic()
    {
        $id_project = $this->get_id_project_from_topic($_POST['id']);
        $access = $this->get_controller("projects","users")->get_access($id_project);

        if ($access['access']['forum'])
        {
            $query = $this->db->prepare("select name from projects_topics where id=?");
            $query->execute(array($_POST['id']));
            $topic = $query->fetch();

            $query = $this->db->prepare("delete from projects_topics where id=? LIMIT 1");
            if ($query->execute(array($_POST['id'])))
            {
                $res['success'] = $access['project']['id'];
                $log = $this->get_controller("projects","logs");
                if ($log) $log->set_logs("forum",$id_project,"Удалена тема {$topic['name']}","delete");
            }
            else $res['error'] = "Ошибка базы данных";
        }
        else $res['error'] = "У Вас недостаточно прав";

        echo json_encode($res);
    }

    function get_post($id)
    {
        $query = $this->db->prepare("select * from projects_posts where id=?");
        $query->execute(array($id));
        return $query->fetch();
    }

    function edit_post()
    {
        $post = $this->get_post($_POST['id']);
        $id_project = $this->get_id_project_from_post($_POST['id']);
        $access = $this->get_controller("projects","users")->get_access($id_project);

        if ($access['access']['forum'] || $post['author'] == $_SESSION['user']['id_user'])
        {
            if ($post) $res['success'] = $post;
            else $res['error'] = "Сообщение не найдено";
        }
        else $res['error'] = "У Вас недостаточно прав";

        echo json_encode($res);
    }

    function get_id_forum_from_post($id_post)
    {
        $query = $this->db->prepare("select t.id_forum
            from projects_posts as p
            LEFT JOIN projects_topics as t ON p.id_topic=t.id
            where p.id=? LIMIT 1
        ");
        $query->execute(array($id_post));
        $post = $query->fetch();

        return $post['id_forum'];
    }

    function get_id_project_from_post($id_post)
    {
        $query = $this->db->prepare("select f.id_project
            from projects_posts as p
            LEFT JOIN projects_topics as t ON p.id_topic=t.id
            LEFT JOIN projects_forums as f ON t.id_forum=f.id
            where p.id=? LIMIT 1
        ");
        $query->execute(array($id_post));
        $post = $query->fetch();

        return $post['id_project'];
    }

    function get_id_project_from_topic($id_topic)
    {
        $query = $this->db->prepare("select f.id_project
            from projects_topics as t
            LEFT JOIN projects_forums as f ON t.id_forum=f.id
            where t.id=? LIMIT 1
        ");
        $query->execute(array($id_topic));
        $topic = $query->fetch();

        return $topic['id_project'];
    }

    function get_first_post($id_topic)
    {
        $query = $this->db->prepare("select * from projects_posts where id_topic=? order by id ASC LIMIT 1");
        $query->execute(array($id_topic));
        return $query->fetch();
    }

    function delete_post()
    {
        $id_project = $this->get_id_project_from_post($_POST['id']);
        $post = $this->get_post($_POST['id']);
        $first_post = $this->get_first_post($post['id_topic']);

        if ($post['id'] == $first_post['id']) $res['error'] = "Нельзя удалить первое сообщение в теме";
        $access = $this->get_controller("projects","users")->get_access($id_project);

        if (!$res['error'])
        {
            if ($access['access']['forum'])
            {
                $query = $this->db->prepare("delete from projects_posts where id=? LIMIT 1");
                if ($query->execute(array($_POST['id']))) $res['success'] = true;
                else $res['error'] = "Ошибка базы данных";
            }
            else $res['error'] = "У Вас недостаточно прав";
        }

        echo json_encode($res);
    }

    function get_new_forum_post_count($id_project)
    {
        $query = $this->db->prepare("SELECT count(p.id) as count
            from projects_posts as p
            LEFT JOIN projects_topics as t ON p.id_topic=t.id
            LEFT JOIN projects_forums_subscribes as s ON p.id_topic=s.id_topic
            LEFT JOIN projects_forums as f ON t.id_forum=f.id
            WHERE f.id_project=? and s.id_user =? and p.created > s.last_action
        ");

        $query->execute(array($id_project,$_SESSION['user']['id_user']));
        $count = $query->fetch();
        return $count['count'];
    }

    function subscribe_always($id_topic)
    {
        $query = $this->db->prepare("insert into projects_forums_subscribes (id_user,id_topic,last_action) values(?,?,?) ON DUPLICATE KEY UPDATE last_action=?");
        $time = time();
        if ($query->execute(array($_SESSION['user']['id_user'],$id_topic,$time,$time))) return true;
    }

    function update_subscribe($id_topic)
    {
        $query = $this->db->prepare("update projects_forums_subscribes set last_action=? where id_user=? and id_topic=? LIMIT 1");
        $time = time();
        if ($query->execute(array($time,$_SESSION['user']['id_user'],$id_topic))) return true;
    }

    function subscribe()
    {
        $id_project = $this->get_id_project_from_post($_POST['id']);
        $access = $this->get_controller("projects","users")->get_access($id_project);

        $visit = time();
        $query = $this->db->prepare("insert into projects_forums_subscribes(id_user,id_topic,last_action) values(?,?,?)");
        if (!$query->execute(array($_SESSION['user']['id_user'],$_POST['id'],$visit))) $res['error'] = "Ошибка базы данных";
        else $res['success'] = true;

        echo json_encode($res);
    }

    function unsubscribe()
    {
        $id_project = $this->get_id_project_from_post($_POST['id']);
        $access = $this->get_controller("projects","users")->get_access($id_project);

        $query = $this->db->prepare("delete from projects_forums_subscribes where id_user=? and id_topic=? LIMIT 1");
        if (!$query->execute(array($_SESSION['user']['id_user'],$_POST['id']))) $res['error'] = "Ошибка базы данных";
        else $res['success'] = true;

        echo json_encode($res);
    }

    function check_subscribe($id_topic)
    {
        $query = $this->db->prepare("select * from projects_forums_subscribes where id_topic=? and id_user=? LIMIT 1");
        $query->execute(array($id_topic,$_SESSION['user']['id_user']));
        if ($query->fetch()) return true;
    }

    function set_all_read()
    {
        $access = $this->get_controller("projects","users")->get_access($this->_0);

        $query = $this->db->prepare("update projects_forums_subscribes as s
            LEFT JOIN projects_topics as t ON s.id_topic=t.id
            LEFT JOIN projects_forums as f ON t.id_forum=f.id
            set last_action=? where id_user=? and f.id_project=?
        ");
        if ($query->execute(array(time(),$_SESSION['user']['id_user'],$this->_0))) $res['success'] = true;
        else $res['error'] = "Ошибка базы данных";

        echo json_encode($res);
    }

    function get_new_posts_statistic($id_user=false,$last_send=false)
    {
        $last_send = (int) $last_send;
        if ($id_user)
        {
            $search_for_one_user = " and s.id_user=".$this->db->quote($id_user);
            $last_send = 0;
        }

        $query = $this->db->prepare("SELECT s.id_user,pr.name,count(p.id) as count,pr.id,u.first_name,u.last_name,u.email
            from projects_posts as p
            LEFT JOIN projects_topics as t ON p.id_topic=t.id
            LEFT JOIN projects_forums_subscribes as s ON p.id_topic=s.id_topic
            LEFT JOIN projects_forums as f ON t.id_forum=f.id
            LEFT JOIN projects as pr ON f.id_project=pr.id
            LEFT JOIN users as u ON s.id_user=u.id_user
            WHERE (p.created > IF(s.last_action > {$last_send}, s.last_action, {$last_send}))
            and s.id_user IN (select id_user from projects_users where id_project=pr.id) {$search_for_one_user}
            group by s.id_user,pr.id
            order by s.id_user ASC
        ");

        $query->execute();
        if (!$id_user) while ($row = $query->fetch()) $new_posts[$row['id_user']][] = $row;
        else $new_posts = $query->fetchAll();
        return $new_posts;
    }

    function new_posts_to_mail()
    {
        $query = $this->db->query("select * from tasks where controller='new_posts'");
        $task = $query->fetch();
        if ($new_posts = $this->get_new_posts_statistic(false,$task['completed']))
        {
            $from = get_setting('email');
            foreach($new_posts as $n)
            {
                $html = $this->layout_get("forum/mail_text.html",array('new_posts' => $n,'domain' => get_full_domain_name()));
                if (!send_mail($from, $n[0]['email'], "Новые сообщения на форумах", $html, get_setting('site_name'))) echo "error {$n['email']}\n\r";
            }
        }
    }

    function get_new_topics_statistic($last_action)
    {
        $last_action = (int) $last_action;
        $query = $this->db->query("select id_user,email,first_name,last_name from users");

        if ($users = $query->fetchAll())
        {
            foreach ($users as $u)
            {
                $query_c = $this->db->prepare("SELECT u.id_user,pr.name,pr.id,u.first_name,u.last_name,u.email,t.id as topic_id,t.name as topic_name
                    from projects_topics as t
                    LEFT JOIN projects_forums_subscribes as s ON t.id=s.id_topic and s.id_user=?
                    LEFT JOIN projects_forums as f ON t.id_forum=f.id
                    LEFT JOIN projects as pr ON f.id_project=pr.id
                    LEFT JOIN users as u ON u.id_user=?
                    WHERE (t.created > IF(s.last_action > {$last_action}, s.last_action, {$last_action})) and t.author !=?
                ");
                $query_c->execute(array($u['id_user'],$u['id_user'],$u['id_user']));
                while($row = $query_c->fetch())
                {
                    $co[$u['id_user']]['email'] = $u['email'];
                    $co[$u['id_user']]['fio'] = build_user_name($u['first_name'],$u['last_name']);
                    $co[$u['id_user']]['topics'][$row['id']][] = $row;
                }
            }
            return $co;
        }
    }

    function new_topics_to_mail()
    {
        $query = $this->db->query("select * from tasks where controller='new_topics'");
        $task = $query->fetch();

        if ($new_topics = $this->get_new_topics_statistic($task['completed']))
        {
            $from = get_setting('email');
            foreach($new_topics as $n)
            {
                $html = $this->layout_get("forum/topics_mail.html",array('new_topics' => $n,'domain' => get_full_domain_name()));
                if (!send_mail($from, $n['email'], "Новые темы на форумах", $html, get_setting('site_name'))) echo "error {$n['email']}\n\r";
            }
        }
    }

    function get_forums_count($id_project)
    {
        $query = $this->db->prepare("select count(distinct f.id) as forums_count,count(distinct t.id) as topics_count,count(distinct p.id) as posts_count
            from projects_forums as f
            LEFT JOIN projects_topics as t ON f.id=t.id_forum
            LEFT JOIN projects_posts as p ON t.id=p.id_topic
            where f.id_project=?
        ");
        $query->execute(array($id_project));
        return $query->fetch();
    }
}