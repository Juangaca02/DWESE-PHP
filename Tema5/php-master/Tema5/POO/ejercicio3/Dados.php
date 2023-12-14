<?php
class Dado
{
    protected static $caras = ["A", "K", "Q", "J", "7", "8"];
    protected static $numTiradas = 0;
    public function __construct()
    {

    }

    public function tirarDado()
    {
        self::$numTiradas++;
        return $this->nombreFigura(random_int(0, 5));
        //Directo
        //return self::$caras[array_rand(self::$caras)];

    }

    public function nombreFigura($posFigura)
    {
        switch ($posFigura) {
            case 0:
                return "Le ha tocado un As";
                break;
            case 1:
                return "Le ha tocado una K";
                break;
            case 2:
                return "Le ha tocado una Q";
                break;
            case 3:
                return "Le ha tocado una J";
                break;
            case 4:
                return "Le ha tocado un 7";
                break;
            case 5:
                return "Le ha tocado un 8";
                break;
        }
    }

    public static function getTiradasTotales()
    {
        return self::$numTiradas;
    }

}

$dado = new Dado();
echo $dado->tirarDado() . "<br>";
echo $dado->tirarDado() . "<br>";
echo Dado::getTiradasTotales();
?>