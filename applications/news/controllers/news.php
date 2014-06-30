<?
namespace news;

class news extends \Controller {

    function default_method()
    {
        if ($this->id)
        {
            $query = $this->db->prepare("select f.id,fi.image,f.name,text,main,f.created,f.h1,f.title,f.description,f.keywords from news as f
                LEFT JOIN (select * from news_images order by main DESC) as fi ON fi.id_news = f.id
                where f.id=? LIMIT 1");
            $query->execute(array($this->id));
            $c = $this->get_controller("news","news",true);
            if ($news = $query->fetch())
            {
                $news['tr_name'] = $c->safeName($news['name'],"-",true);
                $news_ar[] = $news;
                $this->layout_show("news.html",array("news" => $news_ar,'last_news' => $this->get_news(10)));
            }
            else $this->error_page();

        }
        else
        {
            $limit = get_setting("all_news_on_page",7);
            $total= $this->db->num_rows("news","id");
            $c = $this->get_controller("news","news",true);

            require_once(ROOT.'libraries/paginator/paginator.php');
            $paginator = new \Paginator($total, $_GET['page'], $limit);
            $query = $this->db->query("select f.id,fi.image,f.name,text,main,f.created from news as f
                LEFT JOIN (select * from news_images order by main DESC) as fi ON fi.id_news = f.id
                order by created DESC LIMIT {$limit} OFFSET {$paginator->get_range('from')}");
            while ($row = $query->fetch())
            {
                //$row['created'] = $this->rus_data($row['created']);
                $row['tr_name'] = $c->safeName($row['name'],"-",true);
                $news[] = $row;
            }

            $this->layout_show("news.html",array("news" => $news, 'all' => true, 'total' => $total,'paginator' => $paginator,'last_news' => $this->get_news(10)));
        }
    }

    function get_news($count=false,$text=false,$excluded=false)
    {
        $select_text = $text ? "*" : "f.id,fi.image,f.name,text,main,f.created,f.h1,f.title,f.description,f.keywords";
        $limit_text = $count ? " LIMIT {$count}" : "";
        $excluded_text = $excluded ? "where id != {$this->db->quote($excluded)}" : "";
        $query = $this->db->query("select {$select_text} from news as f
                    LEFT JOIN (select * from news_images order by main DESC) as fi ON fi.id_news = f.id
                    {$excluded_text}
                    order by always DESC, created DESC {$limit_text}
        ");

        $c = $this->get_controller("news","news",true);
        while ($row = $query->fetch())
        {
            //$row['created'] = date($row['created']);
            $row['tr_name'] = $c->safeName($row['name'],"-",true);
            $news[] = $row;
        }

        return $news;
    }

    function get_news_table()
    {
        return $this->layout_get("news_table.html",array('news' => $this->get_news(get_setting("news_on_main",4))));
    }

    function get_n_news($id=false)
    {
        $query = $this->db->prepare("select * from news where id=? LIMIT 1");
        $query->execute(array($id));
        if ($news = $query->fetch()) return $this->layout_get("news_call.html",array("news" => $news));
        else return "новость не найдена";
    }
    
    function rus_data($data)
    {
        $months = array('','января','февраля','марта', 'апреля','мая','июня','июля','августа','сентября','октября','ноября','декабря');                
        $month_number = date("n",$data);
        $day_number = date("d",$data);
        $year_number = date("Y",$data);       
        $data_string = "{$day_number} {$months[$month_number]} {$year_number} года";
        
        return $data_string;
    }
}
?>
