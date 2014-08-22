<?php
namespace projects;

class gantt extends \Controller {
    
    function default_method()
    {
        switch($_POST['act'])
        {
            default:
                $this->default_for_this();
        }
    }

    function default_for_this()
    {
        switch ($this->id)
        {
            case "get": $this->get_tasks($this->_0); break;
            default:
                $access = $this->get_controller("projects","users")->get_access($this->id);
                $project = $access['project'];

                crumbs($project['name'],"/projects/~{$project['id']}");
                crumbs("Диаграмма Гантта");

                $this->set_global('id_project',$this->id);
                $this->layout_show('tasks/gantt.html',array(
                    //'projects' => $this->get_controller("projects")->get_projects($this->id),
                    'project' => $project,
                    'gantt_button' => true,
                    'access' => $access['access'],
                    'tasks' => $tasks
                ));
        }
    }

    function get_tasks($id_project)
    {
        $query = $this->db->prepare("select t.id,t.name,t.start,t.end,t.priority,a.first_name as assigned_first_name,a.last_name as assigned_last_name,a.nickname as assigned_nickname
                from projects_tasks as t
                LEFT JOIN users as a ON t.assigned = a.id_user
                where t.id_project=? and t.status IN ('new', 'in_progress')
                order by t.start ASC,t.name ASC
            ");
        $query->execute(array($id_project));
        while ($row = $tasks = $query->fetch())
        {
            $row['assigned_name'] = build_user_name($row['assigned_first_name'],$row['assigned_last_name']);
            switch ($row['priority'])
            {
                case "1": $color = "ganttSilver"; break;
                case "2": $color = "ganttGreen"; break;
                case "3": $color = "ganttOrange"; break;
                case "4": $color = "ganttRed"; break;
            }
            if ($row['end'] == "") $row['end'] = date('Y-m-d', strtotime("+6 months", strtotime($row['start'])));
            $assig = $row['assigned_name'] ? "<br>Ответственный: ".$row['assigned_name'] : "";
            $info[] = array(
//                'name' => $row['user_nickname'],
                'name' => "&nbsp;".$row['name'],
                'values' => array(array(
                    'to' => "/Date({$row['end']})/",
                    'from' => "/Date({$row['start']})/",
                    'desc' => $row['name'].$assig,
                    'label' => $row['name'],
                    'customClass' => $color,
                    'dataObj' => array('id' => $row['id'])
                ))
            );
        }
        echo json_encode($info);
    }
}
