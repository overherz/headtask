<?php

$name = "Страницы";

$submenu['content'] = array(
    'pages' => 'Текстовые страницы'
);

$func_from_text = array(
    'get_news' => array('application' => 'news','controller' => 'news','function' => 'get_n_news'),
    'get_news_table' => array('application' => 'news','controller' => 'news','function' => 'get_news_table'),
    'get_layout' => array('application' => 'pages','controller' => 'pages','function' => 'get_layout')
);

