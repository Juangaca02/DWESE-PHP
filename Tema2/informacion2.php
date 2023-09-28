<?php

function fecha(&$diasem, &$dia , &$m , &$anio ) {
    date_default_timezone_set('Europe/Madrid');
    $dia = date('N');
    $mes = date('n');
    switch ($dia) {
        case 1:
            $diasem = "Lunes,";
            break;
        case 2:
            $diasem = "Martes,";
            break;
        case 3:
            $diasem = "Miercoles,";
            break;
        case 4:
            $diasem = "Jueves,";
            break;
        case 5:
            $diasem = "Viernes,";
            break;
        case 6:
            $diasem = "Sabado,";
            break;
        case 7:
            $diasem = "Domingo,";
            break;
        default:
    }
    switch ($mes) {
        case 1:
            $m = "Enero";
            break;
        case 2:
            $m = "Febrero";
            break;
        case 3:
            $m = "Marzo";
            break;
        case 4:
            $m = "Abril";
            break;
        case 5:
            $m = "Mayo";
            break;
        case 6:
            $m = "Junio";
            break;
        case 7:
            $m = "Julio";
            break;
        case 8:
            $m = "Agosto";
            break;
        case 9:
            $m = "Septiembre";
            break;
        case 10:
            $m = "Octubre";
            break;
        case 11:
            $m = "Nombienbre";
            break;
        case 12:
            $m = "Diciembre";
            break;
        default:
    }
    $dia = date('d');
    $anio = date('Y');
}

?>