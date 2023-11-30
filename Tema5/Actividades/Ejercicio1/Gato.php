<?php
require_once "Mamifero.php";

class Gato extends Mamifero
{

    public $garras;

    public function __construct($nom, $tama, $gar)
    {
        parent::__construct($nom, $tama);
        $this->garras = $gar;
    }

    public function __toString()
    {
        return parent::__toString() . " y tengo las garras $this->garras";
    }

    public function maullar()
    {
        echo $this->nombre . " está maullando.\n";
    }
}