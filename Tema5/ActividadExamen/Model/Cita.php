<?php
require_once '../Controller/provinciaController.php';
class Cita
{
    protected $matricula;
    protected $id_itv;
    protected $fecha;
    protected $hora;
    protected $ficha;

    public function __construct($matricula, $id_itv, $fecha, $hora, $ficha)
    {
        $this->matricula = $matricula;
        $this->id_itv = $id_itv;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->ficha = $ficha;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
    public function __toString()
    {
        $provincia = provinciaController::provinciaID($this->id_itv);
        return "Cita: [Matrícula: {$this->matricula}, ID ITV: $provincia, Fecha: {$this->fecha}, Hora: {$this->hora}, Ficha: <img src='$this->ficha'>]";
    }
}
