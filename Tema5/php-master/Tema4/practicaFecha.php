<?php
$fechaHoraActual = date('Y-m-d H:i:s');
if (isset($_COOKIE['nombre'])) {
    setcookie("nombre", $fechaHoraActual);
    echo "La ultima vez que entraste fue $_COOKIE[nombre]";
} else {
    setcookie("nombre", $fechaHoraActual);
    echo "Es la primera vez que entras";
}
?>