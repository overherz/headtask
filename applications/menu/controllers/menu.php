<?php
namespace menu;

class menu extends \Controller {

    function childs($id, $with_self=false, $a='', &$res=array()){
          if(!$a){
              $query = $this->db->query("select * from menu where invisible IS NULL order by position");
              while ($row = $query->fetch()) $a[] = $row;
          }
          if($a){
            if($with_self && !in_array($id,$res)) $res[]=$id;
            foreach ($a as $val){
                if($val['parent_id']==$id){
                    $res[]=$val['id'];
                    $this->childs($val['id'], $with_self, $a, $res);
                }
            }
            return $res;
        }
    }

    function parents($id, $with_self=false, $a='', &$res=array()){
          if(!$a){
              $query = $this->db->query("select * from menu where invisible IS NULL order by position");
              while ($row = $query->fetch()) $a[] = $row;
          }
          if($a){
            if($with_self && !in_array($id,$res)) $res[]=$id;
            foreach ($a as $val){
                if($val['id']==$id && $val['parent_id']){
                    $res[]=$val['parent_id'];
                    $this->parents($val['parent_id'], $with_self, $a, $res);
                }
            }
            return $res;
        }
    }

    function generate_menu($application,$controller,$id,$target='top'){
        if (!$this->cache->get('menu'))
        {
            $query = $this->db->prepare("select * from menu where invisible IS NULL and target=? order by position");
            $query->execute(array($target));
            while ($row = $query->fetch()) $menu[$row['id']] = $row;
            $this->cache->set('menu',$menu,300);
        }
        else $menu = $this->cache->get('menu');

        $arr = false;
        if($menu)
        {
            $r_path = \Router::url();
            a:
            foreach ($menu as $k => &$m)
            {
                if ($m['application'] == "pages" && $m['path'] == $r_path)
                {
                    $found_active = $k;
                    $m['active'] = true;
                    break;
                }
                elseif ($controller && $m['application'] == "{$application}/{$controller}")
                {
                    $found_active = $k;
                    $sub_controller = true;
                    $m['active'] = true;
                    break;
                }
                elseif ($m['application'] == $application && $m['application'] != "pages")
                {
                    $found_active = $k;
                    $m['active'] = true;
                }
            }

            if ($found_active)
            {
                $menu[$found_active]['active'] = true;
                if ($menu[$found_active]['parent_id']) $get_parents = $menu[$found_active]['id'];
                crumbs($menu[$found_active]['name'],$menu[$found_active]['path'],false,true);
                if ($sub_controller)
                {
                    foreach ($menu as $d => &$s)
                    {
                        if ($d != $found_active) $s['active'] = false;
                    }
                }
            }
            if ($application == "pages")
            {
                $get_parents = false;
                if (!$repath && !$found_active) crumbs(\Controller::get_global('page_name'));
                if (!$arr) $arr = \Router::url_array();
                if (count($arr) > 1)
                {
                    array_pop($arr);
                    $r_path = "/".implode("/",$arr)."/";
                    $repath = true;
                    goto a;
                }
            }

            if ($get_parents)
            {
                if ($crumbs = $this->parents($get_parents,false,$menu))
                {
                    foreach ($crumbs as $p)
                    {
                        crumbs($menu[$p]['name'],$menu[$p]['path'],false,true);

                        $menu[$p]['active'] = true;
                    }
                }
            }
            $res = $this->generate_foreach($menu);
        }
        return $res;
    }

    function sort_menu($v1, $v2){
        if($v1->position < $v2->position) return -1;
        elseif($v1->position > $v2->position) return 1;
        else return 0;
    }

    function generate_foreach(array $listIdParent)
    {
        $to_delete = array();
        foreach ($listIdParent as $id => $node)
        {
            if ($node['parent_id'])
            {
                $listIdParent[$node['parent_id']]['category'][$id] = &$listIdParent[$id];
                $to_delete[] = $id;
            }
        }

        $final = $listIdParent;

        foreach ($to_delete as $v) unset($final[$v]);
        return $final;
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

