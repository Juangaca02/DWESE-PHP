<?php
require_once 'Persona.php';
class Empleado extends Persona
{
    protected $salario;

    public function __construct($nom = 'Antonio', $apel = 'Garcia', $ed = 20, $sal = 1000)
    {
        parent::__construct($nom, $apel, $ed);
        $this->salaraio = $sal;
        /*       
        $this->nombre = $nom;
        $this->apellidos = $apel;
        $this->edad = $ed;
        */
    }

    public function __toString()
    {
        return parent::__toString() . " y mi salario es de $this->salaraio €";
    }
}