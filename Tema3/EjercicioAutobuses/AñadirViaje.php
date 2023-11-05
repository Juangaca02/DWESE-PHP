<html>

<head>
    <meta charset="UTF8">
</head>

<body>
    <?php
    require_once "funciones.php";
    try {
        $conex = crearConexion();
        $result = $conex->query("Select * from autos");
    } catch (Exception $ex) {
        die($ex->getMessage());
    }
    $matri = $errores = true;
    if (isset($_POST['añadir'])) {

        if (preg_match('/^\d{3}[a-zA-Z]{3}$/', $_POST['matricula']) === 0) {
            $matri = false;
            $errores = false;
        }

        try {
            $result = $conex->exec("SELECT matricula from autos");
        } catch (Exception $ex) {
            die($ex->getMessage());
        }

        if (!$errores == false) {
            //echo var_dump($_POST);
            $conex = crearConexion();

            try {
                $result = $conex->exec("INSERT INTO autos VALUES ('$_POST[matricula]','$_POST[marca]','$_POST[plazas]')");
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
            echo "Registro insertado correctamente";
        }
    }
    ?>



    <h1>Añadir Autobus</h1>
    <form action="" method="POST">
        Fecha: <input type="date" name="fecha"><br>
        Matricula: <select name="matriculaName">
            <?php
            while ($reg = $result->fetch(PDO::FETCH_OBJ)) {
                echo '<option value = "' . $reg->matricula . '"';
                if (isset($_POST['añadir']) && $_POST['matriculaName'] == $reg->matricula) {
                    echo ' selected';
                }
                echo '>' . $reg->Matricula . '</option>';
            }
            ?>
        </select><br>
        Origen: <input type="text" name="marca" value=""><br>
        Destino: <input type="text" name="marca" value=""><br>
        Nº Plazas Libres:
        <?php
        if (!isset($_POST['matriculaName'])) {
            try {
                $i = $conex->exec("SELECT Num_plazas from autos where 'Matricula' = '123QWE';");
                ?><input type="number" name="marca" value="<?php $i ?>"><br>
                <?php
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
        }
        ?>
        </select>
        <input type="submit" name="añadir" value="Añadir"><br><br>
        <a href="index.php">Volver al Menu</a>
    </form>
    <?php
    ?>
</body>

</html>