<?php

$INFO['sql_driver'] = 'mysql';
$INFO['sql_host'] = '127.0.0.1';
$INFO['sql_database'] = 'tasker';
$INFO['sql_user'] = 'overherz';
$INFO['sql_pass'] = 'jckjck';
$INFO['dev_mode'] = 1;
$INFO['error_to_mail'] = 1;
$INFO['antiddos'] = 0;

$INFO['domain_name'] = "tasker";
$INFO['secure'] = 0; //enable to https redirect

$INFO['cache'] = 1;
$INFO['cache_storage'] = "memcached"; // files, sqlite, auto, apc, wincache, xcache, memcache, memcached
$INFO['cache_server'] = array(
                            array("127.0.0.1",11211),
                            //array("localhost",11211,70)
                        );

$INFO['subdomains'] = 0;
$INFO['subdomain_default'] = false;
$INFO['subdomain_app_excluded'] = false;

$INFO['site_access_check'] = 1;
$INFO['site_login_page'] = '/users/login/';

$INFO['admin_mail'] = 'overherz@yandex.ru';

$INFO['default_user_group_id'] = 4;
$INFO['message_server'] = 'https://127.0.0.1:9900';