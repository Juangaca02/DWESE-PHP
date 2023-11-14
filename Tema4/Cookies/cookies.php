<?php
if (!isset($_COOKIE['nombre'])) {
    setcookie("nombre", "Juan", time() + 60);
} else {
    echo $_COOKIE["nombre"];
}

?>
<br>
<a href="mostrarCookies.php">Ir a Siquiente</a>