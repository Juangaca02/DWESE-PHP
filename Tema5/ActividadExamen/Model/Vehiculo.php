<?php

class Vehiculo {
    private $matricula;
    private $marca;
    private $modelo;
    private $color;
    private $plazas;
    private $fecha_ultima_revision;

    public function __construct($matricula, $marca, $modelo, $color, $plazas, $fecha_ultima_revision) {
        $this->matricula = $matricula;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->color = $color;
        $this->plazas = $plazas;
        $this->fecha_ultima_revision = $fecha_ultima_revision;
    }

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }
}


