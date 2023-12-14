<?php
require_once "../ejemplo1Obj/Persona.php";
class Empleado extends Persona
{
    public $salario;

    public function __construct($nombre = 'Juan', $apellidos = 'García', $edad = 20, $salario = 1200)
    {
        parent::__construct($nombre, $apellidos, $edad);
        $this->salario = $salario;
    }

    public function __toString()
    {
        return parent::__toString() . " Salario $this->salario";
    }
}
?>