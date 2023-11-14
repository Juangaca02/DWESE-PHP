<?php

if (!isset($_COOKIE['nombre'])) {
    header("Location:IniciarSesion.php");
} else {
    setcookie("entrada", date("d/m/y--H:i:s"));
    if (!isset($_COOKIE['entrda'])) {
        echo "Bienvenido $_COOKIE[nombre] $_COOKIE[apellido], es tu primera vez";
    } else {
        echo "Bienvenido $_COOKIE[nombre] $_COOKIE[apellido], tu ultimo acceso fue a el $_COOKIE[entrada]";
    }
    setcookie("nombre", "", time() - 1);
    setcookie("apellido", "", time() - 1);
}
?>
<input type="submit">