<?php
session_start();
session_unset();
//unset($_SESSION);
setcookie("PHPSESSID", 0, time() - 1, "/");
session_destroy();
session_name("sesionCerrada");
session_start();
header('Location:index1.php')
    ?>