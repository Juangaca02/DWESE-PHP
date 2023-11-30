<?php

class Animal
{
    protected $nombre;

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function mover()
    {
        echo $this->nombre . " se mueve.";
    }

    public function comer()
    {
        echo $this->nombre . " está comiendo.";
    }

    public function emitirSonido()
    {
        echo $this->nombre . " emite un sonido.";
    }
}