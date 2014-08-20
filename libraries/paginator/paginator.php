<?php
/**
 * Этот контроллер вызывается по умолчанию
 *
 * @author overherz
 */
class Paginator {

    private $count_on_page;
    var $pages;
    private $count;
    private $range;

    public $num_list=array();
    public $current_page;

    function __construct($list, $page=1, $limit=15, $show=6){
        $this->count = $list;
        $this->show = $show;
        $this->set_count_on_page($limit);
        $this->set_current_page($page);
    }

    public function set_count_on_page($count)
    {
        if ($count) $this->count_on_page = $count;
        else $this->count_on_page = 15;

        $this->pages = ceil($this->count / $this->count_on_page);
    }

    private function get_num_list(){
        if ($this->pages > 1)
        {
            if ($this->pages <= $this->show || $this->pages <= $this->show+1)
            {
                $this->num_list = range(1,$this->pages);
                return true;
            }
            $cnt = ceil(($this->show-2)/2);
            if ($this->current_page >= ($this->pages-2)) $i = $this->pages - $cnt*2;
            else $i = $this->current_page-$cnt;

            if ($i < 1) $i = 1;
            while (count($this->num_list) < ($this->show-1))
            {
                if ($i > $this->pages) break;
                $this->num_list[] = $i;
                $i++;
            }
        }
    }

    public function set_current_page($page)
    {
        if ($page) $this->current_page = $page;
        else $this->current_page = 1;
        $from = $this->current_page*$this->count_on_page - $this->count_on_page;
        $to = $from + $this->count_on_page;
        if($to>$this->count)$to=$this->count;

        $this->range = array($from,$to);
        $this->get_num_list();
    }

    public function get_range($mode)
    {
        if ($mode == 'from') return $this->range[0];
        elseif ($mode == 'to') return $this->range[1];
    }

    public function get_count_on_page()
    {
        return $this->count_on_page;
    }

    public function get_pages()
    {
        return $this->pages;
    }

    function limit(){
        return $this->count_on_page;
    }

    function offset(){
        return $this->range[0];
    }

    function from(){
        return $this->range[0]+1;
    }

    function to(){
        return $this->range[1];
    }

    function total(){
        return $this->count;
    }

    function url($page=1){
        if($_SERVER['REDIRECT_QUERY_STRING']){
            preg_match_all('/&?([^=]*)=([^&]*)/i', $_SERVER['REDIRECT_QUERY_STRING'], $res, PREG_SET_ORDER);
            if($res) foreach ($res as $val){
                if($val[1]!='page')$url[]="{$val[1]}={$val[2]}";
            }
        }
        $url[]="page={$page}";
        return "?".implode("&",$url);
    }
}