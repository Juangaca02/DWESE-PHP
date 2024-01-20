<?php

class Transferencias
{
    protected $iban_origen;
    protected $iban_destino;
    protected $fecha;
    protected $cantidad;

    public function __construct($iban_origen, $iban_destino, $fecha, $cantidad)
    {
        $this->iban_origen = $iban_origen;
        $this->iban_destino = $iban_destino;
        $this->fecha = $fecha;
        $this->cantidad = $cantidad;
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