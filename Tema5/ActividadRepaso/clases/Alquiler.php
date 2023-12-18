<?php

class Alquiler
{
    protected $id;
    protected $cod_juego;
    protected $dni_cliente;
    protected $fecha_alquiler;
    protected $fecha_decol;

    public function __construct($id, $cod_juego, $dni_cliente, $fecha_alquiler, $fecha_decoln)
    {
        $this->id = $id;
        $this->cod_juego = $cod_juego;
        $this->dni_cliente = $dni_cliente;
        $this->fecha_alquiler = $fecha_alquiler;
        $this->fecha_decoln = $fecha_decoln;
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

?>