<?php

namespace global_module;

class get_company extends \Global_module
{
    protected $admin = false;
    protected $on_ajax_not_run = false;

    function run_module()
    {
        if ($_SESSION['user'])
        {
            $first = false;
            $query = \MyPDO::connect()->query("select * from company as c
              LEFT JOIN company_users as cu ON cu.id_company=c.id
              where c.id IN ({$_SESSION['user']['company']}) and cu.id_user = {$_SESSION['user']['id_user']}
            ");
            while ($row = $query->fetch())
            {
                if (!$first) $first = $row;
                $company[$row['id']] = $row;
                if (SUBDOMAIN == $row['domain']) $GLOBALS['globals']['current_company'] = $row['id'];
            }

            $url = parse_url($_SERVER['HTTP_REFERER']);

            if ($url['host'] == DOMAIN_NAME && $url['path'] == "/users/login/" && !defined('SUBDOMAIN'))
            {
                \Controller::redirect(get_full_domain_name($first['domain']));
            }

            \Controller::set_global('company',$company);
            set_company($GLOBALS['globals']['current_company']);
            $_SESSION['current_company'] = $GLOBALS['globals']['current_company'];
        }
    }
}
