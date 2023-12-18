<?php
class conexion extends PDO
{
    protected $dns = "mysql: host=localhost; dbname=itv; charset=utf8mb4;";
    protected $username = "dwes";
    protected $password = "abc123.";

    public function __construct(?array $options = null)
    {
        return parent::__construct($this->dns, $this->username, $this->password, $options);
    }
    public function __get($name)
    {
        return $this->$name;
    }
    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}

?>