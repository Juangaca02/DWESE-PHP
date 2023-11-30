<?php
session_start();
setcookie("PHPSESSID", $_COOKIE['PHPSESSID'], time() + 3600, "/");
echo $_SESSION['nombre'];
$_SESSION['nombre'] = 'pepe';

?><br>
<a href="session1.php">Volver a session 1</a>
<br>
<a href="cerrar.php">Cerrar Sessiones</a>