<?php
session_start();
session_unset();
unset($_SESSION);
session_destroy();
setcookie("PHPSESSID", 0, time() - 1, "/");

echo '<br><a href="session1.php">Volver a Session 1</a>';


$_SESSION['noCoche'] = "La matricula introducida no corresponde con ningun vehiculo";
if (isset($_SESSION['noCoche'])) {
    echo "<p>$_SESSION[noCoche]</p>";
    unset($_SESSION['noCoche']);
}

?>