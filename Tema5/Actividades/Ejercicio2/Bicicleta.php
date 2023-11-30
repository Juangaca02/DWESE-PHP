<?php
require_once "Vehiculo.php";

class Bicicleta extends Vehiculo
{
    public $modelo;
    public $caballito = 0;

    public function __construct($kmRecorridos = 0, $modelo)
    {
        parent::__construct($kmRecorridos);
        $this->modelo = $modelo;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function pedalear($km)
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

        if ($metodo == "caballito") {
            //$this->caballito++;
            //echo "Haz echo $this->caballito caballitos";
            echo "Haz echo un caballito";
        }
    }
}