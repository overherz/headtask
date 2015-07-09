<?php

class MyPDO extends PDO
{
    private static $Instance;

    public function __construct($dsn, $username = null, $password = null)
    {
        if (empty(self::$Instance))
        {
            parent::__construct($dsn, $username, $password);
        }
        else self::connect();
    }

    public static function connect()
    {
        if (empty(self::$Instance))
        {
            $connect_str = SQL_DRIVER . ':host=' . SQL_HOST . ';dbname=' . SQL_DATABASE;
            try
            {
                self::$Instance = new MyPDO($connect_str, SQL_USER, SQL_PASS);
                self::$Instance->setAttribute(PDO::ATTR_STATEMENT_CLASS, array('MyPDOStatement', array(self::$Instance)));
                self::$Instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                self::$Instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$Instance->query("SET NAMES UTF8",true);
            }
            catch (\PDOException $e)
            {
                echo ("Ошибка соединения с базой данных");
                exit();
            }
        }
        return self::$Instance;
    }

    public function query($query,$no_debug=false)
    {
        $start = microtime(true);
        $trace = MyPDO::clear_trace(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS));

        try
        {
            $result = parent::query($query);
            $time = microtime(true) - $start;
            if (!$no_debug)
            {
                $GLOBALS['dev']['queries'][] = array('query' => $query,
                    'time' => round($time, 4),
                    'trace' => $trace
                );
                return $result;
            }
        }
        catch (\PDOException $e)
        {
            $GLOBALS['dev']['queries'][] = array(
                'query' => $query,
                'error' => array('2' => $e->getMessage()),
                'trace' => $trace
            );
            $GLOBALS['dev']['queries_error']++;
        }
    }

    public function exec($query, $line = null, $file = null)
    {
        $start = microtime(true);
        $trace = MyPDO::clear_trace(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS));
        try
        {
            $result = parent::exec($query);
            $time = microtime(true) - $start;
            $GLOBALS['dev']['queries'][] = array('query' => $query,
                'time' => round($time, 4),
                'trace' => $trace
            );
            return $result;
        }
        catch (\PDOException $e)
        {
            $GLOBALS['dev']['queries'][] = array(
                'query' => $query,
                'error' => array('2' => $e->getMessage()),
                'trace' => $trace
            );
            $GLOBALS['dev']['queries_error']++;
        }
    }

    public function num_rows($query, $field = null)
    {
        if (!$field) $field = "*";
        $result = self::query("select count({$field}) from " . $query);
        return $result->fetchColumn();
    }

    public function get_enum($table_name, $column_name)
    {
        $query = self::query("SHOW COLUMNS FROM `" . $table_name . "` LIKE '" . $column_name . "'");
        $enum_array = $query->fetch();

        if ($enum_array)
        {
            $enum_array = str_replace('enum(', '', $enum_array['Type']);
            $enum_array = str_replace(')', '', $enum_array);
            $enum_array = str_replace("'", '', $enum_array);
            $enum_array = explode(',', $enum_array);

            return $enum_array;
        }
    }

    public static function clear_trace(array $trace)
    {
        if ($trace)
        {
            foreach ($trace as &$t)
            {
                $t['file'] = str_replace(ROOT,"",$t['file']);
            }
            return $trace;
        }
    }

}

class MyPDOStatement extends PDOStatement
{
    const NO_MAX_LENGTH = -1;
    private $connection;
    protected $bound_params = array();

    protected function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function execute($input_parameters = null)
    {

        $start = microtime(true);
        $trace = MyPDO::clear_trace(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS));
        try
        {
            $result = parent::execute($input_parameters);
            $time = microtime(true) - $start;
            $GLOBALS['dev']['queries'][] = array('query' => $this->getSQL($input_parameters),
                'time' => round($time, 4),
                'trace' => $trace
            );
            return $result;
        }
        catch (\PDOException $e)
        {
            $GLOBALS['dev']['queries'][] = array(
                'query' => $this->getSQL($input_parameters),
                'error' => array('2' => $e->getMessage()),
                'trace' => $trace
            );
            $GLOBALS['dev']['queries_error']++;
        }
    }

    public function bindParam($paramno, &$param, $type = PDO::PARAM_STR, $maxlen = null, $driverdata = null)
    {
        $this->bound_params[$paramno] = array(
            'value' => &$param,
            'type' => $type,
            'maxlen' => (is_null($maxlen)) ? self::NO_MAX_LENGTH : $maxlen,
        );

        parent::bindParam($paramno, $param, $type, $maxlen, $driverdata);
    }

    public function bindValue($parameter, $value, $data_type = PDO::PARAM_STR)
    {
        $this->bound_params[$parameter] = array(
            'value' => $value,
            'type' => $data_type,
            'maxlen' => self::NO_MAX_LENGTH
        );
        parent::bindValue($parameter, $value, $data_type);
    }

    public function getSQL($values = array())
    {
        $sql = $this->queryString;

        if (sizeof($values) > 0)
        {
            foreach ($values as $key => $value)
            {
                if ($key === intval($key)) $sql = preg_replace("/\?/", $this->connection->quote($value), $sql, 1);
                else $sql = str_replace(":" . $key, $this->connection->quote($value), $sql);
            }
        }

        if (sizeof($this->bound_params))
        {
            foreach ($this->bound_params as $key => $param)
            {
                $value = $param['value'];
                if (!is_null($param['type'])) $value = self::cast($value, $param['type']);
                if ($param['maxlen'] && $param['maxlen'] != self::NO_MAX_LENGTH) $value = self::truncate($value, $param['maxlen']);
                if (!is_null($value)) $sql = str_replace($key, $this->connection->quote($value), $sql);
                else $sql = str_replace($key, 'NULL', $sql);
            }
        }
        return $sql;
    }

    static protected function cast($value, $type)
    {
        switch ($type)
        {
            case PDO::PARAM_BOOL:
                return (bool)$value;
                break;
            case PDO::PARAM_NULL:
                return null;
                break;
            case PDO::PARAM_INT:
                return (int)$value;
            default:
                return $value;
        }
    }

    static protected function truncate($value, $length)
    {
        return substr($value, 0, $length);
    }

}

?>