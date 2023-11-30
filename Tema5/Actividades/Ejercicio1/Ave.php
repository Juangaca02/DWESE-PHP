<?php
require_once 'Animal.php';

class Ave extends Animal
{

    public $plumas;

    public function __construct($nom, $pul)
    {
        parent::__construct($nom);
        $this->plumas = $pul;
    }

    public function volar()
    {
        echo $this->nombre . " está volando.\n";
    }
    public function __toString()
    {
        return "Me llamo $this->nombre y mis plumas son $this->plumas";
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