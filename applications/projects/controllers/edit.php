<?php
namespace projects;

class edit extends \Controller {
    
    function default_method()
    {
        $access = $this->get_controller("projects","users")->get_access($this->id);
        if ($access['access']['edit_project'])
        {
            $p_cr = $this->get_controller("projects");
            if ($project = $p_cr->get_project($this->id))
            {
                $access = $this->get_controller("projects","users")->get_access($this->id);
                if ($project['owner']) crumbs("Личные проекты","/projects/",true);
                crumbs($project['name'],"/projects/~{$project['id']}");
                crumbs("Редактирование проекта");
                $this->layout_show('add.html',array(
                    'projects' => $p_cr->get_projects($project['id']),
                    'project' => $project,
                    'access' => $access['access'],
                    'edit_button' => true
                ));
            }
            else $this->error_page();
        }
        else $this->error_page("denied");
    }
}
