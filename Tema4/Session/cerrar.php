<?php
session_start();
session_unset();
unset($_SESSION);
session_destroy();
setcookie("PHPSESSID", 0, time() - 1, "/");
?>
<br><a href="session1.php">Volver a Session 1</a>