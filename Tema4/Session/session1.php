<?php
session_name("miWeb");
session_start();
if (isset($_SESSION['nombre'])) {
    echo $_SESSION['nombre'];
} else {
    $_SESSION['nombre'] = 'Juan';
    $_SESSION['apellido'] = 'Garcia';
    echo $_SESSION['nombre'], $_SESSION['apellido'];
}

?>
<br>
<a href="session2.php">Ir a session2</a>