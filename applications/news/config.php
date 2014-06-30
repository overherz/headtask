<?php

$name = "Новости";

$submenu['content'] = array(
    'news' => 'Новости'
);

$func_from_text = array(
    'get_news' => array('application' => 'news','controller' => 'news','function' => 'get_n_news'),
    'get_news_table' => array('application' => 'news','controller' => 'news','function' => 'get_news_table')
);

$router = array(
    //'[0-9]+' => array('application' => 'news', 'controller' => 'default_function'),
);
