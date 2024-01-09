<?php
require_once './connection.php';
try {
    $conex = new Conexion();
    $resultado = $conex->query("SELECT * from familia ;");
    $conex->close();
    while ($fila = $resultado->fetch_object()) {
        echo $fila->cod . "-" . $fila->nombre . "<br>";
    }
} catch (\Exception $ex) {
    return false;
}
?>