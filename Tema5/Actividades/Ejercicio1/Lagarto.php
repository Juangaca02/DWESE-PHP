<?php

require_once 'Animal.php';

class Lagarto extends Animal
{

    public $escamas;

    public function __construct($nom, $es)
    {
        parent::__construct($nom);
        $this->escamas = $es;
    }

    public function __toString()
    {
        return "Me llamo $this->nombre  y soy un lagarto con las escamas $this->escamas ";
    }
    public function reptar()
    {
        echo $this->nombre . " está reptando.\n";
    }
}