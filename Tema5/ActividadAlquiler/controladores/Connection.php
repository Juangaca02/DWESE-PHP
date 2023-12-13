<?php
class conexion extends PDO
{
    protected $dns = "mysql: host=localhost; dbname=alquiler_juegos; charset=utf8mb4;";
    protected $username = "dwes";
    protected $password = "abc123.";

    public function __construct(?array $options = null)
    {
        return parent::__construct($this->dns, $this->username, $this->password, $options);
    }
}

?>