<?php

function _get_options()
{
    if (!Cache::connect()->get('options'))
    {
        if ($result = MyPDO::connect()->query("select * from options"))
            while ($row = $result->fetch()) $GLOBALS['settings'][$row['key_name']] = $row;
        Cache::connect()->set('options',$GLOBALS['settings'],100);
    }
    else $GLOBALS['settings'] = Cache::connect()->get('options');
}

_get_options();

if ($GLOBALS['settings']['site_close']['value'])
{
    echo $GLOBALS['settings']['site_close_message']['value'];
    exit();
}
