<?php

require_once 'Ave.php';

class Pinguino extends Ave
{

    public $pico;

    public function __construct($nom, $plu, $pi)
    {
        parent::__construct($nom, $plu);
        $this->pico = $pi;
    }

    public function __toString()
    {
        return parent::__toString() . " y mi pico es $this->pico";
    }
    public function nadar()
    {
        echo $this->nombre . " está nadando.\n";
    }
}