
<?php

$a = array(
    array("Nombre: " => "Pedro Torres", "Dirección: " => "C/ Mayor, 37", "Teléfono: " => 123456789),
    array("Nombre: " => "Pedro Torres", "Dirección: " => "C/ Mayor, 37", "Teléfono: " => 123456789),
    array("Nombre: " => "Pedro Torres", "Dirección: " => "C/ Mayor, 37", "Teléfono: " => 123456789));

foreach ($a as $fila) {
    foreach ($fila as $ind=> $valor) {
        echo $ind."".$valor."<br>";
    }
    echo "<br>";
}
?>