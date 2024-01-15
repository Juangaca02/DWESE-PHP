<?php
class Usuario
{
    protected $Nombre;
    protected $Direccion;
    protected $Telefono;
    protected $DNI;
    protected $clave;
    protected $intentos;
    protected $bloqueado;

    public function __construct($Nombre, $Direccion, $Telefono, $DNI, $clave, $intentos, $bloqueado)
    {
        $this->Nombre = $Nombre;
        $this->Direccion = $Direccion;
        $this->Telefono = $Telefono;
        $this->DNI = $DNI;
        $this->clave = $clave;
        $this->intentos = $intentos;
        $this->bloqueado = $bloqueado;
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