<?php

class Cuentas
{
    protected $iban;
    protected $saldo;
    protected $dni_cuenta;

    public function __construct($iban, $saldo, $dni_cuenta)
    {
        $this->iban = $iban;
        $this->saldo = $saldo;
        $this->dni_cuenta = $dni_cuenta;
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