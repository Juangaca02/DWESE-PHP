<?php

function mostrarFecha(&$diaSem,&$diaNum,&$mes,&$anio,$tiempoUnix){
    
$diaSem = date('N',$tiempoUnix);
switch ($diaSem) {
    case 1:
        $diaSem = 'Lunes';

        break;
    case 2:
        $diaSem = 'Martes';

        break;
    case 3:
        $diaSem = 'Miercoles';

        break;
    case 4:
        $diaSem = 'Jueves';

        break;
    case 5:
        $diaSem = 'Viernes';

        break;
    case 6:
        $diaSem = 'Sabado';

        break;
    
    default:
        $diaSem = 'Domingo';
        break;
}

$diaNum = date('d',$tiempoUnix);

$mes = date('n',$tiempoUnix);

switch ($mes) {
    case 1:
        $mes = 'Enero';
        
        break;
     case 2:
        $mes = 'Febrero';
        
        break;
     case 3:
        $mes = 'Marzo';
        
        break;
     case 4:
        $mes = 'Abril';
        
        break;
     case 5:
        $mes = 'Mayo';
        
        break;
     case 6:
        $mes = 'Junio';
        
        break;
     case 7:
        $mes = 'Julio';
        
        break;
     case 8:
        $mes = 'Agosto';
        
        break;
     case 9:
        $mes = 'Septiembre';
        
        break;
     case 10:
        $mes = 'Octubre';
        
        break;
     case 11:
        $mes = 'Nobiembre';
        
        break;

    default:
        $mes = 'Diciembre';
        break;
}

$anio = date('Y',$tiempoUnix);



}

?>