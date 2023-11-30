<?php
require_once 'Ave.php';

class Canario extends Ave
{
    public $color;

    public function __construct($nom, $plu, $co)
    {
        parent::__construct($nom, $plu);
        $this->color = $co;
    }

    public function __toString()
    {
        return parent::__toString() . " y soy de color $this->color";
    }
    public function cantar()
    {
        echo $this->nombre . " está cantando.\n";
    }
}
