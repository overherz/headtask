<?php

namespace global_module;

class get_options extends \global_module
{
    protected $admin = false;
    protected $on_ajax_not_run = false;

    function __construct()
    {
        if (\Router::admin()) $this->admin = true;
    }

    function run_module()
    {
        if (!\Cache::connect()->get('options'))
        {
            if ($result = \MyPDO::connect()->query("select * from options"))
                while ($row = $result->fetch()) $GLOBALS['settings'][$row['key_name']] = $row;
            \Cache::connect()->set('options',$GLOBALS['settings'],100);
        }
        else $GLOBALS['settings'] = \Cache::connect()->get('options');

        if (!$this->admin)
        {
            if ($GLOBALS['settings']['site_close']['value'])
            {
                echo $GLOBALS['settings']['site_close_message']['value'];
                exit();
            }
        }
    }
}
