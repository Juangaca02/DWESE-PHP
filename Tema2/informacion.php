<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
date_default_timezone_set('Europe/Madrid');
    $d = date('N');
    $m = date('n');
    switch ($d) {
        case 1:
            print "Lunes,";
            break;
        case 2:
            print "Martes,";
            break;
        case 3:
            print "Miercoles,";
            break;
        case 4:
            print "Jueves,";
            break;
        case 5:
            print "Viernes,";
            break;
        case 6:
            print "Sabado,";
            break;
        case 7:
            print "Domingo,";
            break;
        default:
    }
    echo date(' d \d\e ');
    switch ($m) {
        case 1:
            print "Enero";
            break;
        case 2:
            print "Febrero";
            break;
        case 3:
            print "Marzo";
            break;
        case 4:
            print "Abril";
            break;
        case 5:
            print "Mayo";
            break;
        case 6:
            print "Junio";
            break;
        case 7:
            print "Julio";
            break;
        case 8:
            print "Agosto";
            break;
        case 9:
            print "Septiembre";
            break;
        case 10:
            print "Octubre";
            break;
        case 11:
            print "Nombienbre";
            break;
        case 12:
            print "Diciembre";
            break;
        default:
    }

    echo date(' \d\e Y');
    echo "<br>";
    echo $d . "," . date('d') . " de " . $m . " de " . date('Y');
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Informacion Fecha</title>
    </head>
    <body>
        <?php
        $diasem = 0;
        $dia = 0;
        $m = 0;
        $anio = 0;
        //$tunix = mktime(12,0,0,9,1,2023);
        require_once './informacion2.php';
        fecha($diasem, $dia, $m, $anio);
        echo $diasem . $dia . " de " . $m . " de " . $anio;
        ?>
    </body>
</html>
