<html>

<head>
    <meta charset="UTF8">
</head>

<body>
    <?php
    require_once "funciones.php";
    try {
        $conex = crearConexion();
        $result = $conex->query("SELECT * from viajes");
    } catch (Exception $ex) {
        die($ex->getMessage());
    }
    ?>
    <h1>Jugador</h1>
    <form action="" method="POST">
        Fecha: <input type="date" name="fecha" value="<?php if (isset($_POST['consultar']))
            echo $_POST['fecha'] ?>"><br>
            Origen: <select name="origen">
                <?php
        while ($reg = $result->fetch(PDO::FETCH_OBJ)) {
            echo '<option value = "' . $reg->Matricula . '"';
            if (isset($_POST['consultar']) && $_POST['origen'] == $reg->Matricula) {
                echo ' selected';
            }
            echo '>' . $reg->Origen . '</option>';
        }
        ?>
            Destino: <select name="destino">
                <?php
                try {
                    $result = $conex->query('SELECT Destino from viajes group by Destino');
                    echo "<select name='destino' >";
                    while ($destino = $result->fetchObject()) {
                        echo "<option value='$destino->Destino' ";
                        echo ">$destino->Destino</option>";
                    }
                    echo "</select>";
                } catch (Exception $ex) {
                    die($ex->getMessage());
                }
                ?>
                <input type="submit" name="consultar" value="Consultar"><br><br>
                <a href="index.php">Volver al Menu</a>
    </form>
    <?php
    if (isset($_POST['consultar'])) {
        try {
            $resultado = $conex->query("SELECT * from viajes where Fecha ='$_POST[fecha]' and Origen = '$_POST[origen]' and Destino='$_POST[destino]' ");
            if ($resultado->rowCount() > 0) {
                $viaje = $resultado->fetchObject();
                echo "Fecha: $viaje->Fecha<br>"
                    . "Matricula: $viaje->Fatricula<br>"
                    . "Origen: $viaje->Origen<br>"
                    . "Destino: $viaje->Destino<br>"
                    . "Plazas libres: $viaje->Plazas_libres<br>";
            } else {
                echo 'Viaje no encontrado';
            }
        } catch (Exception $ex) {
            echo 'Fallo en la consulta de la reserva';
        }
        ?>
        <form action="" method="POST">
            <input type="hidden" name="fechaV" value="<?php echo $_POST['fecha'] ?>">
            <input type="hidden" name="matricula" value="<?php echo $viaje->mMtricula ?>">
            <input type="hidden" name="origenV" value="<?php echo $_POST['origen'] ?>">
            <input type="hidden" name="destinoV" value="<?php echo $_POST['destino'] ?>">
            <input type="hidden" name="plazasV" value="<?php echo $viaje->Plazas_libres ?>">
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