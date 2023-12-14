<html>
    <head>
        <title>fecha</title>
    </head>
    <body>
        <?php
            require_once './funcionParaLaFecha.php';
            $diaNum;
            $diaSem;
            $mes;
            $anio;
            $tiempoUnix = mktime(0, 0, 0, 8, 11, 2003);
            mostrarFecha($diaSem,$diaNum,$mes,$anio, $tiempoUnix);
            echo "$diaSem, $diaNum de $mes de $anio";
        ?>
    </body>
</html>