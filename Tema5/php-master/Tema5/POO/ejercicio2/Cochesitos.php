<?php
class Vehiculo
{
    protected static $kmTotales = 0;
    protected static $vehiculosCreados = 0;
    protected $kmRecorridos = 0;

    public function __construct($kmRecorridos = 0)
    {
        self::$vehiculosCreados++;
        $this->kmRecorridos = $kmRecorridos;
        self::$kmTotales += $kmRecorridos;
    }

    public static function getVehiculosCreados()
    {
        return self::$vehiculosCreados;
    }

    public static function getKmTotales()
    {
        return self::$kmTotales;
    }

    public function __destruct()
    {
        self::$vehiculosCreados--;
        self::$kmTotales -= $this->kmRecorridos;
    }
}

class Coche extends Vehiculo
{
    public $marca;

    public function __construct($kmRecorridos = 0, $marca = "Seat")
    {
        parent::__construct($kmRecorridos);
        $this->marca = $marca;
    }
    public function quemaRueda()
    {
        return "El coche es un $this->marca y es de mileuristas Por que está quemando rueda";
    }
    public function andaCoche($km)
    {
        $this->kmRecorridos += $km;
        self::$kmTotales += $km;
        return "he andado $km";
    }
}
class Bicicleta extends Vehiculo
{
    public $tipo;

    public function __construct($kmRecorridos = 0, $tipo = "Montaña")
    {
        parent::__construct($kmRecorridos);
        $this->tipo = $tipo;
    }
    public function hacerCaballito()
    {
        return "La bicicleta es de $this->tipo hago el caballito por que soy la ostia";
    }
    public function andaBicicleta($km)
    {
        $this->kmRecorridos += $km;
        self::$kmTotales += $km;
        return "he andado $km";
    }
}

$vehiculo = new Vehiculo(800);
$coche = new Coche(200);
$bici = new Bicicleta(1);
echo Vehiculo::getVehiculosCreados() . "<br>";
echo Vehiculo::getKmTotales() . "<br>";
echo $coche->andaCoche(1) . "<br>";
echo $coche->quemaRueda() . "<br>";
echo $bici->hacerCaballito() . "<br>";
echo $bici->andaBicicleta(1) . "<br>";
unset($coche);
echo Vehiculo::getVehiculosCreados() . "<br>";
echo Vehiculo::getKmTotales() . "<br>";
?>