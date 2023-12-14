<?php
session_start();
//PAra hacer que la sesion tenga tiempo de vida
setcookie("PHPSESSID", $_COOKIE["PHPSESSID"], time() + 3600, "/");
$_SESSION['nombre'] = "pino";
$_SESSION['apellidos'] = "fernandez";
echo "$_SESSION[nombre]<br>";
echo "$_SESSION[apellidos]";
?>
<br>
<a href="session2.php">session2</a>