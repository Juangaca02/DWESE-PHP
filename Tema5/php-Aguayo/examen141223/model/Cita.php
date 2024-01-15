<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Cita
 *
 * @author Aguayo
 */
class Cita {
   protected $matricula;
    protected $id_itv;
    protected $fecha;
    protected $hora;
    protected $ficha;

    public function __construct($matricula, $id_itv, $fecha, $hora, $ficha) {
        $this->matricula = $matricula;
        $this->id_itv = $id_itv;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->ficha = $ficha;
    }
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        $this->$name = $value;
    }
}
