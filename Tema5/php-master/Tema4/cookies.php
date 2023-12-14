<?php
if (isset($_COOKIE['nombre']))
    echo "El valor de la cookies es $_COOKIE[nombre]";
else
    setcookie("nombre", "Pino", time() + 10);
?>