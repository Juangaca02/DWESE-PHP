<?php
setcookie("nombre", "Antonio", time() + 60);
echo "La cookie es: " . $_COOKIE['nombre'];
?>
<br>
<a href="cookies.php">Volver</a>