<?php

class Zona
{
    private $nombre_zona;
    private $plazas_totales;
    private $plazas_restantes;

    public function __construct($nombre_zona, $plazas_totales)
    {
        $this->nombre_zona = $nombre_zona;
        $this->plazas_totales = $plazas_totales;
        $this->plazas_restantes = $plazas_totales;
    }

    public function __get($name)
    {
        return $this->$name;
    }
    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function vender($cantidad)
    {
        if ($cantidad <= $this->plazas_restantes) {
            $this->plazas_restantes -= $cantidad;
            return $cantidad;
        } else {
            return false;
        }
    }

    public function __toString()
    {
        return "Zona: $this->nombre_zona | Plazas totales: $this->plazas_totales | Plazas restantes: $this->plazas_restantes";
    }
}

$sala_principal = new Zona("Sala Principal", 1000);
$compra_venta = new Zona("Compra-Venta", 200);
$vip = new Zona("VIP", 25);

if (isset($_POST['enviar'])) {

    switch ($_POST["zona"]) {
        case "sala_principal":
            $result = $sala_principal->vender($_POST["cantidad"]);
            break;
        case "compra_venta":
            $result = $compra_venta->vender($_POST["cantidad"]);
            break;
        case "vip":
            $result = $vip->vender($_POST["cantidad"]);
            break;
        default:
            echo "Zona no válida.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Venta de Entradas</title>
</head>

<body>
    <h1>Expocoches Campanillas - Venta de Entradas</h1>
    <form method="post" action="">Selecciona la zona:
        <select name="zona">
            <option value="sala_principal">Sala Principal</option>
            <option value="compra_venta">Compra-Venta</option>
            <option value="vip">VIP</option>
        </select><br><br>
        <input type="number" name="cantidad"><br><br>
        <input type="submit" name="enviar" value="Vender entradas">
    </form><br>
    <?php
    echo $sala_principal . "<br>";
    echo $compra_venta . "<br>";
    echo $vip . "<br><br>";
    if (isset($result)) {

        if ($result === false) {
            echo "Lo sentimos, no hay suficientes entradas disponibles para la zona $_POST[zona]";
        } else {
            echo "Se han vendido $result entradas para la zona $_POST[zona]";

        }
    }
    ?>
</body>

</html>