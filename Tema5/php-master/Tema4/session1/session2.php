<?php
session_start();

echo "$_SESSION[nombre]<br>";
echo "$_SESSION[apellidos]";

?><br>
<a href="cerrarSession.php">cerrar</a>