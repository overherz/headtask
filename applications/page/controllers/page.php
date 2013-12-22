<?php
namespace page;

class page extends \Controller {

    function default_method()
    {
        if ($this->id)
        {
            $query = $this->db->prepare("select * from menu where path=?");
            $query->execute(array("/page/{$this->id}/"));
            if ($page = $query->fetch())
            {
                if ($page['application'] != "" && $page['application'] == 'pages')
                {
                    return $this->get_controller($page['application'],$page['application'],false,$page['value'])->default_method();
                }
                else $this->error_page();
            }
            else $this->error_page();
        }
        return $this->error_page();
    }

    function childs($id, $with_self=false, $a='', &$res=array()){
          if(!$a){
              $query = $this->db->query("select * from menu where invisible IS NULL order by position");
              while ($row = $query->fetchObject()) $a[] = $row;
          }
          if($a){
            if($with_self && !in_array($id,$res)) $res[]=$id;
            foreach ($a as $val){
                if($val->parent_id==$id){
                    $res[]=$val->id;
                    $this->childs($val->id, $with_self, $a, $res);
                }
            }
            return $res;
        }
    }

    function parents($id, $with_self=false, $a='', &$res=array()){
          if(!$a){
              $query = $this->db->query("select * from menu where invisible IS NULL order by position");
              while ($row = $query->fetchObject()) $a[] = $row;
          }
          if($a){
            if($with_self && !in_array($id,$res)) $res[]=$id;
            foreach ($a as $val){
                if($val->id==$id && $val->parent_id){
                    $res[]=$val->parent_id;
                    $this->parents($val->parent_id, $with_self, $a, $res);
                }
            }
            return $res;
        }
    }

    function generate_menu($application,$controller,$id,$target='top'){
        $query = $this->db->prepare("select * from menu where invisible IS NULL and target=? order by position");
        $query->execute(array($target));
        while ($row = $query->fetchObject()) $menu[$row->id] = $row;

        if($menu)
        {
            foreach ($menu as $k => &$m)
            {
                if ($m->application == "pages" && $m->path == $_SERVER['REQUEST_URI'])
                {
                    $found_active = $k;
                    $m->active = true;
                    break;
                }
                elseif ($controller && $m->application == "{$application}/{$controller}")
                {
                    $found_active = $k;
                    $sub_controller = true;
                    $m->active = true;
                    break;
                }
                elseif ($m->application == $application)
                {
                    $found_active = $k;
                    $m->active = true;
                }
            }

            if ($found_active)
            {
                $menu[$found_active]->active = true;
                if ($menu[$found_active]->parent_id) $get_parents = $menu[$found_active]->id;
                crumbs($menu[$found_active]->name,$menu[$found_active]->path,true);

                if ($sub_controller)
                {
                    foreach ($menu as $d => &$s)
                    {
                        if ($d != $found_active) $s->active = false;
                    }
                }
            }

            if ($get_parents)
            {
                if ($crumbs = $this->parents($get_parents,false,$menu))
                {
                    foreach ($crumbs as $p)
                    {
                        $res['crumbs'][$p] = $menu[$p]->name;
                        crumbs($menu[$p]->name,$menu[$p]->path,false,true);

                        $menu[$p]->active = true;
                    }
                }
            }
            $res = $this->generate_menu_foreach($menu);
         //   pr($menu);
        }
        return $res;
    }

    function sort_menu($v1, $v2){
        if($v1->position < $v2->position) return -1;
        elseif($v1->position > $v2->position) return 1;
        else return 0;
    }

    function generate_menu_foreach($a, $res='', $second=false){
        foreach ($a as &$val){
            $res[$val->id]=$val;
            if($val->parent_id){
                if(isset($res[$val->parent_id])) {
                    $res[$val->parent_id]->category[$val->id]=$val;
                    uasort($res[$val->parent_id]->category,array($this,'sort_menu'));
                    $children[$val->id]='';
                } else $second=true;
            }
        }
        if($second) $res=$this->generate_menu_foreach($a, $res);
        if($children) foreach($children as $key=>$null){
            unset($res[$key]);
        }
        return $res;
    }

}

