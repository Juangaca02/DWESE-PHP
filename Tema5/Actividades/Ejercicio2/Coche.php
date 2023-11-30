<?php
require_once "Vehiculo.php";

class Coche extends Vehiculo
{
    public $marca;

    public function __construct($kmRecorridos = 0, $marca)
    {
        parent::__construct($kmRecorridos);
        $this->marca = $marca;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function conducir($km)
    {
        $this->kmRecorridos += $km;
        self::$kmTotales += $km;
    }

    public function __call($metodo, $argumento)
    {
        if ($metodo == "andar") {
            $this->kmRecorridos += $argumento[0];
            self::$kmTotales += $argumento[0];
        }

        if ($metodo == "quemar") {
            //$this->caballito++;
            //echo "Haz echo $this->caballito caballitos";
            echo "Haz quemado rueda";
        }
    }
}