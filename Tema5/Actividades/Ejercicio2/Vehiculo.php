<?php

class Vehiculo
{
    protected static $vehiculosCreados = 0;
    protected static $kmTotales = 0;
    protected $kmRecorridos = 0;

    public function __construct($kmRecorridos = 0)
    {
        self::$vehiculosCreados++;
        self::$kmTotales += $kmRecorridos;
        $this->kmRecorridos = $kmRecorridos;
    }

    public static function getVehiculosCreados()
    {
        return self::$vehiculosCreados;
    }

    public static function getKmTotales()
    {
        return self::$kmTotales;
    }

    public function getKmRecorridos()
    {
        return $this->kmRecorridos;
    }
}