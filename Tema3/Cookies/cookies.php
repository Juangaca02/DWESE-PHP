<?php
if (isset($_COOKIE['nombre'])) {
    echo "La cookie es: " . $_COOKIE['nombre'];
} else
    setcookie("nombre", "Juan");
?>