<?
namespace news;

class news extends \Controller {

    function default_method()
    {
        if ($this->id)
        {
            $query = $this->db->prepare("select f.id,fi.image,f.name,text,main,f.created from news as f
                LEFT JOIN (select * from news_images order by main DESC) as fi ON fi.id_news = f.id
                where f.id=? LIMIT 1");
            $query->execute(array($this->id));
            if ($news = $query->fetch()) return $this->layout_show("news.html",array("news" => $news));
            else $this->error_page();

        }
        else
        {
            $limit = get_setting("all_news_on_page",6);
            $total= $this->db->num_rows("news","id");

            require_once(ROOT.'libraries/paginator/paginator.php');
            $paginator = new \Paginator($total, $_GET['page'], $limit);
            $query = $this->db->query("select f.id,fi.image,f.name,text,main,f.created from news as f
                LEFT JOIN (select * from news_images order by main DESC) as fi ON fi.id_news = f.id
                order by created DESC LIMIT {$limit} OFFSET {$paginator->get_range('from')}");
            while ($row = $query->fetch())
            {
                //$row['created'] = $this->rus_data($row['created']);
                $row['text'] = strip_tags($row['text']);
                $news[] = $row;
            }
            return $this->layout_show("news_list.html",array("news" => $news,'total' => $total,'paginator' => $paginator));
        }
    }

    function get_news($count=false,$text=false,$excluded=false)
    {
        $select_text = $text ? "*" : "f.id,fi.image,f.name,text,main,f.created";
        $limit_text = $count ? " LIMIT {$count}" : "";
        $excluded_text = $excluded ? "where id != {$this->db->quote($excluded)}" : "";
        $query = $this->db->query("select {$select_text} from news as f
                    LEFT JOIN (select * from news_images order by main DESC) as fi ON fi.id_news = f.id
                    {$excluded_text}
                    order by always DESC, created DESC {$limit_text}
        ");
       
        while ($row = $query->fetch())
        {
           // $row['created'] = $this->rus_data($row['created']);
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
