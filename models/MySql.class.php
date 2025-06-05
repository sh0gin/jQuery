<?php
class MySql extends mysqli
{

    public $isConnected = false;

    public function __construct($config)
    {
        parent::__construct($config["hostname"], $config["username"], $config["password"], $config["database"]);
        $this->isConnected = !$this->connect_errno;
    }

    public function select($request)
    {
        return $this->query($request)->fetch_all(MYSQLI_ASSOC);
    }

    public function repeat_check($table_name, $column_name, $value) {
        return (bool) $this->select("SELECT id FROM $table_name WHERE $column_name = '$value'");
    }
}
