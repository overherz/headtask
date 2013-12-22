<?php

$name = "feedback";

$submenu['content'] = array(
  //  'feedback' => 'feedback'
);

$router = array(
//    'fake_controller' => array('application' => 'portfolio', 'controller' => 'real_controller'),
);

$router_admin = array(
//    'fake_controller' => array('application' => 'portfolio', 'controller' => 'real_controller'),
);

$func_from_text = array(
    'get_feedback_button' => array('application' => 'feedback','controller' => 'feedback','function' => 'get_button','admin' => false),
    'show_form' => array('application' => 'feedback','controller' => 'feedback','function' => 'show_form','admin' => false)
);


