<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <a href="./index.php">Volver al inicio</a>
    <h1>RESERVAR ASIENTOS VIAJE</h1>
    <form action="" method="POST">
        Fecha: <input type="date" name="fecha" value="<?php if (isset($_POST['consultar']))
            echo $_POST['fecha'] ?>"><br>
            <?php
        require_once("funciones.php");
        $conex = crearConexion();
        echo 'Origen: ';
        $origen = isset($_POST['consultar']) ? $_POST['origen'] : "";
        crearSelectOrigen($conex, $origen);
        echo '<br>';
        echo 'Destino: ';
        $destino = isset($_POST['consultar']) ? $_POST['destino'] : "";
        crearSelectDestino($conex, $destino);
        echo '<br>';
        ?>
        <input type="submit" name="consultar" value="Consultar">
    </form>
    <?php

    if (isset($_POST['consultar'])) {
        try {
            $resultado = $conex->query("select * from viajes where fecha ='$_POST[fecha]' and origen = '$_POST[origen]' and destino='$_POST[destino]' ");
            $viaje = $resultado->fetchObject();
            mostrarViaje($viaje);
            if ($resultado->rowCount() < 0) {
                echo 'Viaje no encontrado';
            }
        } catch (Exception $ex) {
            echo 'Fallo en la consulta de la reserva';
        }
        ?>
        <form action="" method="POST">
            <input type="hidden" name="fechaV" value="<?php echo $_POST['fecha'] ?>">
            <input type="hidden" name="matricula" value="<?php echo $viaje->matricula ?>">
            <input type="hidden" name="origenV" value="<?php echo $_POST['origen'] ?>">
            <input type="hidden" name="destinoV" value="<?php echo $_POST['destino'] ?>">
            <input type="hidden" name="plazasV" value="<?php echo $viaje->plazas_libres ?>">
            Nº Plazas a reservar: <input type="number" name="plazas">
            <input type="submit" name="reservar" value="Reservar">
        </form>
        <?php
    }
    if (isset($_POST['reservar'])) {
        if ($_POST['plazas'] > $_POST['plazasV']) {
            echo 'El numero de plazas a reservar el mayor a las disponibles';
        } else {
            try {
                $update = $conex->exec("update viajes set plazas_libres = plazas_libres - $_POST[plazas] "
                    . "where fecha = '$_POST[fechaV]' and matricula = '$_POST[matricula]' and origen = '$_POST[origenV]' and destino = '$_POST[destinoV]'");

                echo "Ha reservado $_POST[plazas] numero de plazas para ir a $_POST[destinoV] en la fecha $_POST[fechaV]";
            } catch (Exception $ex) {
                echo 'No se ha podio realizar el update';
            }
        }
    }
    ?>
</body>

</html>