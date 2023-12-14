<?php

$anio = 2020;
$bisiesto = "el año $anio es bisiesto";
$noBisiesto = "el año $anio no es bisiesto";

if ($anio % 4 == 0) {
    if ($anio % 100 == 0){
        if ($anio % 400 == 0){
            echo $bisiesto;
        } else {
            echo $noBisiesto;
        }
    } else {
        echo $bisiesto;
    }
} else {
    echo $noBisiesto;
}
