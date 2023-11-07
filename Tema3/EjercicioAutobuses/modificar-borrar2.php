<html>

<head>
    <meta charset="UTF8">
</head>

<body>
    <?php
    //require_once "AñadirAutobus.php";
    try {
        $conex = new PDO("mysql:host=localhost;dbname=autobuses;charset=utf8mb4", "dwes", "abc123.");
        $result = $conex->query("Select * from viajes");
    } catch (Exception $ex) {
        die($ex->getMessage());
    }
    ?>
    <h1>Modificar / Borrar viaje</h1>
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
            /*echo "<td><input type='submit' name='modificar' value='Modificar'>
                <input type='submit' name='borrar' value='Borrar'></td></tr>";
            echo "<tr>";
            echo "<td>$reg->Fecha</td>";
            echo "<td>$reg->Matricula</td>";
            echo "<td>$reg->Origen</td>";
            echo "<td>$reg->Destino</td>";
            echo "<td><input type='submit' name='modificar' value='Modificar'>
                <input type='submit' name='borrar' value='Borrar'></td></tr>";*/
        }
        ?>


    </table>
    <br>
    <?php
    if (isset($_POST['borrar']) && $borrado) {
        echo "Borrado Correctamente";
    }

    if (isset($_POST['borrar'])) {
        try {
            $con->exec("DELETE from viajes where ");
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        $borrado = true;
        echo "Borrado Correctamente";
    }

    if (isset($_POST['modificar'])) {
        require_once "funciones.php";
        $matri = $errores = $plaza = true;
        if (isset($_POST['añadir'])) {

            if (preg_match('/^\d{3}[a-zA-Z]{3}$/', $_POST['matricula']) === 0) {
                $matri = false;
                $errores = false;
            }
            try {
                $resul = $conex->query("SELECT Num_plazas from autos where Matricula = $_POST[matricula]");
                $plazasMax = $resul->fetchObject();
                if (($_POST['plazas_libres'] <= $plazasMax->Num_plazas && $_POST['plazas_libres'] == 0)) {
                    $plaza = false;
                    $errores = false;
                }
            } catch (Exception $ex) {
                die($ex->getMessage());
            } /*
if (!$errores == false) {
//echo var_dump($_POST);
$conex = crearConexion();
try {
$result = $conex->exec("UPDATE `viajes` SET `Fecha`='$_POST[fecha]',`Matricula`=$_POST[matricula],`Origen`='$_POST[origen]',`Destino`='$_POST[destino]',`Plazas_libres`='$_POST[plazas_libres]' WHERE `Matricula`='$_POST[matricula]'");
} catch (Exception $ex) {
die($ex->getMessage());
}
echo "Registro insertado correctamente";
}*/
        }

        ?>
        <h1>Modificar Viaje</h1>
        <form action="" method="POST">
            Fecha: <input type="date" name="fecha" value="<?php if (isset($_POST['fecha']))
                echo $_POST['fecha'] ?>">
            <?php if (isset($_POST['fecha']) && $matri == false) {
                echo "fecha Incorecto";
            }
            ?><br>
            Matricula: <input type="text" name="matricula" value="<?php if (isset($_POST['matricula']))
                echo $_POST['matricula'] ?>">
            <?php if (isset($_POST['matricula']) && $matri == false) {
                echo "Matricula Incorecto";
            }
            ?>
            <br>
            Origen: <input type="text" name="origen" value="<?php if (isset($_POST['origen']))
                echo $_POST['origen'] ?>">
                <br>
                Destino: <input type="text" name="destino" value="<?php if (isset($_POST['destino']))
                echo $_POST['destino'] ?>">
                <br>
                Nº Plazas Libres: <input type="number" name="plazas_libres" value="<?php if (isset($_POST['plazas_libres']))
                echo $_POST['plazas_libres'] ?>">
            <?php if (isset($_POST['plazas_libres']) && $plaza == false) {
                echo "Nº Plazas Libres Incorecto";
            }
            ?><br>
            <input type="submit" name="añadir" value="Modificar Vieaje"><br><br>
            <a href="index.php">Volver al Menu</a>
        </form>
        <?php

        echo $_POST['fecha'];
        echo $_POST['matricula'];
        echo $_POST['origen'];
    }
    ?>
</body>

</html>