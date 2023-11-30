<?php
require_once "Mamifero.php";

class Perro extends Mamifero
{

    public $dientes;

    public function __construct($nom, $tama, $die)
    {
        parent::__construct($nom, $tama);
        $this->dientes = $die;
    }

    public function __toString()
    {
        return parent::__toString() . " y tengo las dientes $this->dientes";
    }

    public function ladrar()
    {
        echo $this->nombre . " está ladrando.\n";
    }
}