<html>

<head>
    <meta charset="UTF8">
</head>

<body>
    <?php
    require_once "funciones.php";
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
        Matricula:
        Origen:
        Destino:
        Nº Plazas:
        </select>
        <input type="submit" name="añadir" value="Añadir"><br><br>
        <a href="index.php">Volver al Menu</a>
    </form>
    <?php
    ?>
</body>

</html>