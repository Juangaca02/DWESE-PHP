<?php
$bandera = true;
if (!isset($_COOKIE['fecha2'])) {
    setcookie("fecha2", date('Y-m-d H:i:s'));
    $bandera = false;
    $credenciales = explode(",", $_COOKIE['usuario']);
    echo "hola $credenciales[0] tu ultima entrada fue $_COOKIE[fecha1] es tu primera entrada";
}
if ($bandera) {
    setcookie("fecha2", date('Y-m-d H:i:s'));
    $credenciales = explode(",", $_COOKIE['usuario']);
    echo "hola $credenciales[0] tu ultima entrada fue $_COOKIE[fecha2]";
}
?>
<br>
<a href="login.php">volver</a>