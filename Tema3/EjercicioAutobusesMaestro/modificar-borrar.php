<html>

<head>
    <meta charset="UTF8">
</head>

<body>
    <?php
    try {
        $conex = new PDO("mysql:host=localhost;dbname=autobuses;charset=utf8mb4", "dwes", "abc123.");
        $result = $conex->query("Select * from viajes");
    } catch (Exception $ex) {
        die($ex->getMessage());
    }
    ?>
    <h1>Modificar / Borrar viaje</h1>
    <?php

    if (isset($_POST['borrar'])) {
        try {
            $con->exec("DELETE from viajes where ");
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        $borrado = true;
    }

    ?>

    <table border="1">
        <tr>
            <th>Fecha</th>
            <th>Matricula</th>
            <th>Origen</th>
            <th>Destino</th>
            <th>Plazas Libres</th>
            <th>Operacion</th>
        </tr>
        <?php
        //while ($row = $result->fetchObject()) {
        while ($row = $result->fetch(PDO::FETCH_OBJ)) {
            ?>
            <form action="" method="POST">
                <?php
                echo "<tr>";
                echo "<td>$row->Fecha</td>";
                echo "<input type='hidden' name='fecha' value='$row->Fecha' >";
                echo "<td>$row->Matricula</td>";
                echo "<input type='hidden' name='matricula' value='$row->Matricula' >";
                echo "<td>$row->Origen</td>";
                echo "<input type='hidden' name='origen' value='$row->Origen' >";
                echo "<td>$row->Destino</td>";
                echo "<input type='hidden' name='destino' value='$row->Destino' >";
                echo "<td>$row->Plazas_libres</td>";
                echo "<input type='hidden' name='plazas_libres' value='$row->Plazas_libres' >";
                echo "<td><input type='submit' name='modificar' value='Modificar'>
                    <input type='submit' name='borrar' value='Borrar'></td>";
                echo "</tr>";
                ?>
            </form>
            <?php
        }
        ?>
    </table>
    <br>
    <?php
    if (isset($_POST['borrar']) && $borrado) {
        echo "Borrado Correctamente";
    }

    if (isset($_POST['añadir']) && $plaza) {
        echo "El numero de plazas es incorrecto";
    }

    if (isset($_POST['modificar'])) {
        $matri = $errores = $plaza = true;
        if (isset($_POST['añadir'])) {
            try {

                $resul = $conex->query("SELECT Num_plazas from autos where Matricula = '$_POST[matricula]'");
                $plazasMax = $resul->fetchObject();

                if (($plazasMax->Num_plazas < $_POST['plazas_libres'] || $_POST['plazas_libres'] < 0)) {
                    $plaza = false;
                } else {
                    $result = $conex->exec("UPDATE `viajes` SET `Fecha`='$_POST[fecha]',`Matricula`=$_POST[matricula],`Origen`='$_POST[origen]',`Destino`='$_POST[destino]',`Plazas_libres`=$_POST[plazas_libres] WHERE `Matricula`='$_POST[matricula]'");
                    $plaza = true;
                }
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
        }

        ?>
        <h1>Modificar Viaje</h1>
        <form action="" method="POST">
            Fecha: <input type="date" name="fecha"><br>
            Matricula: <select name="matricula">
                <?php
                $result = $con->query("SELECT matricula from autos");
                while ($row = $result->fetch_assoc()) {
                    if ($_POST['matricula'] == $reg->Matricula) {
                        echo "<option value= '$reg->Matricula' selected >'$reg->Matricula'</option>";
                    } else {
                        echo "<option value= '$reg->Matricula'>'$reg->Matricula'</option>";
                    }
                }
                ?>
            </select><br>
            Origen: <input type="text" name="origen"><br>
            Destino: <input type="text" name="destino"><br>
            Nº Plazas Libres: <input type="number" name="plazas_libres"><br>
            <input type="submit" name="añadir" value="Modificar Viaje"><br>
        </form>
        <?php
    }
    ?>
</body>

</html>