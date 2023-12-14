<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Usuario
 *
 * @author Aguayo
 */
class Usuario {
    protected $provincia;
    protected $nombre;
    protected $telefono;
    protected $user;
    protected $pass;

    public function __construct($provincia, $nombre, $telefono, $user, $pass) {
        $this->provincia = $provincia;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->user = $user;
        $this->pass = $pass;
    }
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        $this->$name = $value;
    }
    
    public function __toString() {
        return "Usuario: [Provincia: {$this->provincia}, Nombre: {$this->nombre}, Teléfono: {$this->telefono}, Usuario: {$this->user}, Contraseña: {$this->pass}]";
    }
    
}
