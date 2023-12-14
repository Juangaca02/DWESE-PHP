<?php

class Producto
{
    private $codigo;
    private $nombre;
    private $precio;

    public function __construct($cod = 0, $nom = '', $pre = 0)
    {
        $this->codigo = $cod;
        $this->nombre = $nom;
        $this->precio = $pre;
    }

    public function modProducto($cod, $nom, $pre)
    {
        $this->codigo = $cod;
        $this->nombre = $nom;
        $this->precio = $pre;
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
        return "Cod: {$this->codigo}, Nombre: {$this->nombre}, Precio: {$this->precio}<br>";
    }


}

?>