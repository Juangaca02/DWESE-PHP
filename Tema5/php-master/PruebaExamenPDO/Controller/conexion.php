<?php

class Conexion extends PDO
{
    protected $dns = "mysql:host=localhost;dbname=alquiler_juegos;charset=utf8mb4";
    protected $username = "dwes";
    protected $password = "abc123.";
    protected $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ);

    public function __construct()
    {
        return parent::__construct($this->dns, $this->username, $this->password, $this->options);
    }
}

?>