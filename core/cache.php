<?php

require_once(ROOT.'core/phpfastcache/phpfastcache.php');

class Cache {

    private static $Instance;
    private static $Instance_disabled;

    private function __construct() {

    }

    public static function connect() {
        if (CACHE)
        {
            if (!self::$Instance) self::$Instance = new phpFastCache();
            return self::$Instance;
        }
        else
        {
            if (!self::$Instance_disabled) self::$Instance_disabled = new Cache_disabled();
            return self::$Instance_disabled;
        }
    }

    private function __clone() {
    }

    private function __wakeup() {
    }
}

class Cache_disabled {
    function __call($methodName, $args) {
        return false;
    }
}

?>