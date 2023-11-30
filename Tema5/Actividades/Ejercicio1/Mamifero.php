<?php
require_once "animal.php";

class Mamifero extends Animal
{
    public $tamaño;

    public function __construct($nom, $ta)
    {
        parent::__construct($nom);
        $this->tamaño = $ta;
    }
    public function __toString()
    {
        return "Me llamo $this->nombre y mido $this->tamaño";
    }
    public function amamantar()
    {
        echo "$this->nombre esta amamantando a sus crías";
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