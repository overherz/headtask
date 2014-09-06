<?php

$name = "projects";

$submenu['content'] = array(
  //  'projects' => 'projects'
);

$router = array(
//    'fake_controller' => array('application' => 'portfolio', 'controller' => 'real_controller'),
);

$router_admin = array(
//    'fake_controller' => array('application' => 'portfolio', 'controller' => 'real_controller'),
);

$func_from_text = array(
    'get_user_tasks' => array('application' => 'projects','controller' => 'user_tasks','function' => 'default_method'),
    'get_projects' => array('application' => 'projects','controller' => 'projects','function' => 'get_projects'),
);
