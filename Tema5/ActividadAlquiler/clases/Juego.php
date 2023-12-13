<?php

class Juego
{
    protected $codigo;
    protected $nombre_juego;
    protected $nombre_consola;
    protected $anno;
    protected $precio;
    protected $alquilado;
    protected $images;
    protected $descripccion;

    public function __construct($codigo, $nombre_juego, $nombre_consola, $anno, $precio, $alquilado, $images, $descripccion)
    {
        $this->codigo = $codigo;
        $this->nombre_juego = $nombre_juego;
        $this->nombre_consola = $nombre_consola;
        $this->anno = $anno;
        $this->precio = $precio;
        $this->alquilado = $alquilado;
        $this->images = $images;
        $this->descripccion = $descripccion;
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