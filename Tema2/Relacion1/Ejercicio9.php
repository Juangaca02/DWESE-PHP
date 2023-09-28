<?php

$numero1 = 14;
$numero2 = 48;
$numero3 = 94;

if ($numero1 < $numero2) {
    $temp = $numero1;
    $numero1 = $numero2;
    $numero2 = $temp;
}

if ($numero2 < $numero3) {
    $temp = $numero2;
    $numero2 = $numero3;
    $numero3 = $temp;
}

if ($numero1 < $numero2) {
    $temp = $numero1;
    $numero1 = $numero2;
    $numero2 = $temp;
}

echo "Números ordenados de mayor a menor: $numero1 $numero2 $numero3";
?>