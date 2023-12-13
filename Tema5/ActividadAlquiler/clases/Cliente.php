<?php

class Cliente
{
    protected $dni;
    protected $nombre;
    protected $apellido;
    protected $direccion;
    protected $localidad;
    protected $clave;
    protected $tipo;

    public function __construct($dni, $nombre, $apellido, $direccion, $localidad, $clave, $tipo)
    {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->direccion = $direccion;
        $this->localidad = $localidad;
        $this->clave = $clave;
        $this->tipo = $tipo;
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