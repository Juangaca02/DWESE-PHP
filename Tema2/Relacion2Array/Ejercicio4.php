<?php

$a = array("Nombre" => "Pedro Torres", "Dirección" => "C/ Mayor, 37", "Teléfono" => 123456789);
$b = array("Nombre" => "Juan", "Dirección" => "C/ MEnos, 73", "Teléfono" => 987654321);
foreach ($a as $ind => $valor) {
    echo $ind . ": " . $valor . "<br>";
}
echo "<br>";
foreach ($b as $ind => $valor) {
    echo $ind . ": " . $valor . "<br>";
}
?>