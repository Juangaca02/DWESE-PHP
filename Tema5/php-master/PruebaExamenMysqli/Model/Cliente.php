<?php
class cliente
{
    protected $dni;
    protected $nombre;
    protected $apellidos;
    protected $direccion;
    protected $localidad;
    protected $clave;
    protected $tipo;

    public function __construct($dni, $nombre, $apellidos, $direccion, $localidad, $clave, $tipo)
    {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
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

    public function __toString()
    {
        return "DNI: $this->dni, Nombre: $this->nombre, Apelllidos: $this->apellidos, $this->direccion, Localidad: $this->localidad, Tipo: $this->tipo";
    }

}