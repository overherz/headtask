<?php

function _get_options()
{   
    if ($result = MyPDO::connect()->query("select * from options"))
        while ($row = $result->fetch()) $GLOBALS['settings'][$row['key_name']] = $row;
}

_get_options();
