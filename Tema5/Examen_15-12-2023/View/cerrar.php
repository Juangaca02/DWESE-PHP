<?php
session_start();
session_unset();
unset($_SESSION);
session_destroy();
setcookie("PHPSESSID", 0, time() - 1, "/");
session_name("sesionCerrada");
session_start();
header('Location:index.php');
?>