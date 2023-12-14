<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of conexion
 *
 * @author Aguayo
 */
class conexion extends PDO{
    protected $dns = "mysql: host=localhost; dbname=itv; charset=utf8mb4;";
    protected $username = "dwes";
    protected $password = "abc123.";
    
    public function __construct(){
        return parent::__construct($this->dns, $this->username, $this->password);
    }
    
}
