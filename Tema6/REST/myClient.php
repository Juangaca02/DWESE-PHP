<?php
$datos = file_get_contents("http://localhost/DWESE-PHP/Tema6/REST/myserver.php?pvp=200");
$productos = json_decode($datos);
foreach ($productos as $key => $fila) {
    echo "Codigo: " . $fila->codigo . "<br>";
    echo "Nombre: " . $fila->nombre . "<br>";
    echo "Pvp: " . $fila->pvp . "<br><br>";
}


?>