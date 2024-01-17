<?php

class Cuentas
{
    protected $iban;
    protected $saldo;
    protected $dni_cuentas;

    public function __construct($iban, $saldo, $dni_cuentas)
    {
        $this->iban = $iban;
        $this->saldo = $saldo;
        $this->dni_cuentas = $dni_cuentas;
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