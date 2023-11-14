<?php
$dia = date('d/m/Y');
$hora = date('H:i:s');

if (isset($_COOKIE['hora']) && isset($_COOKIE['dia'])) {
    setcookie("hora", $hora);
    setcookie("dia", $dia);
    echo "La utima vez que entraste fue el dia " . $_COOKIE['dia'] . " a las " . $_COOKIE['hora'];
} else {
    setcookie("hora", $hora);
    setcookie("dia", $dia);
    echo "Es la primera vez que has entrado";
}
?>

<br>
<a href="ejercicio1.php">Recargar</a>