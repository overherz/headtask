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
            if (!\Cache::connect()->get('company'))
            {
                $query = \MyPDO::connect()->query("select * from company
                where id IN ({$_SESSION['user']['company']})
                ");
                while ($row = $query->fetch())
                {
                    $company[$row['id']] = $row['name'];
                }

                $_SESSION['user']['current_company'] = $_SESSION['user']['current_company'] ? $_SESSION['user']['current_company'] : $_SESSION['user']['company'][0];
                \Controller::set_global('company',$company);
                \Cache::connect()->set('company',$company,100);
            }
            else \Controller::set_global('company',\Cache::connect()->get('company'));
        }
    }
}
