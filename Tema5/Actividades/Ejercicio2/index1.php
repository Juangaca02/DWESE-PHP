<?php
require_once "Vehiculo.php";
require_once "Bicicleta.php";
require_once "Coche.php";

$b = new Bicicleta(20, 'Montaña');
echo "Bicicleta - Modelo: " . $b->getModelo() . ", Kilómetros recorridos: " . $b->getKmRecorridos();
echo "<br>-------------------<br>";
$b->andar(30);
echo "<br>-------------------<br>";
echo "Bicicleta - Modelo: " . $b->getModelo() . ", Kilómetros recorridos: " . $b->getKmRecorridos();
echo "<br>-------------------<br>";
$b->caballito();
echo "<br>-------------------<br>";
echo "Bicicleta - Modelo: " . $b->getModelo() . ", Kilómetros recorridos: " . $b->getKmRecorridos();
echo "<br>-------------------<br>";
echo "<br>-------------------<br>";
$p = new Coche(200, 'Ferrari');
echo "Bicicleta - Modelo: " . $p->getModelo() . ", Kilómetros recorridos: " . $p->getKmRecorridos();
echo "<br>-------------------<br>";
$p->andar(30);
echo "<br>-------------------<br>";
echo "Bicicleta - Modelo: " . $p->getModelo() . ", Kilómetros recorridos: " . $p->getKmRecorridos();
echo "<br>-------------------<br>";
$p->quermar();
echo "<br>-------------------<br>";
echo "Bicicleta - Modelo: " . $p->getModelo() . ", Kilómetros recorridos: " . $p->getKmRecorridos();