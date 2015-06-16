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

            $query = \MyPDO::connect()->query("select * from company
            where id IN ({$_SESSION['user']['company']})
            ");
            while ($row = $query->fetch())
            {
                $company[$row['id']] = $row['name'];
            }

            if (!$company[$_SESSION['user']['current_company']])
            {
                $_SESSION['user']['current_company'] = $_SESSION['user']['company'][0];
                \Controller::redirect();
            }

            \Controller::set_global('company',$company);
        }
    }
}
