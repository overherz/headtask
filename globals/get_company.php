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
            $_SESSION['user']['current_company'] = $_SESSION['user']['current_company'] ? $_SESSION['user']['current_company'] : $_SESSION['user']['company'][0];

            $query = \MyPDO::connect()->query("select * from company as c
              LEFT JOIN company_users as cu ON cu.id_company=c.id
              where c.id IN ({$_SESSION['user']['company']}) and cu.id_user = {$_SESSION['user']['id_user']}
            ");
            while ($row = $query->fetch())
            {
                $company[$row['id']] = $row;
            }

            if (!$company[$_SESSION['user']['current_company']])
            {
                $_SESSION['user']['current_company'] = $_SESSION['user']['company'][0];
                \Controller::redirect();
            }

            $_SESSION['user']['role_company'] = $company[$_SESSION['user']['current_company']]['role'];

            \Controller::set_global('company',$company);
        }
    }
}
