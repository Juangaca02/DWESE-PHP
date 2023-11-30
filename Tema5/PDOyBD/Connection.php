<?php
class Connection extends mysqli
{

    private $host = "localhost";
    private $user = "dwes";
    private $pass = "abc123.";
    private $dbname = "objetos_bd";

    public function __construct()
    {
        parent::__construct($this->host, $this->user, $this->pass, $this->dbname);
    }

    public function __get($name)
    {
        $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }





}



?>