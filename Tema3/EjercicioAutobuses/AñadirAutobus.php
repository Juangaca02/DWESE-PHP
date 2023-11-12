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
        Matricula: <input type="text" name="matricula" value="<?php
        if (isset($_POST['matricula'])) {
            echo $_POST['matricula'];
        } ?>">
        <?php if (isset($_POST['matricula']) && $matri == false) {
            echo "Matricula Incorecto";
        }
        ?><br>
        Marca: <input type="text" name="marca" value="<?php
        if (isset($_POST['marca'])) {
            echo $_POST['marca'];
        } ?>"><br>
        Nº Plazas: <input type="text" name="plazas" value="<?php
        if (isset($_POST['plazas'])) {
            echo $_POST['plazas'];
        } ?>">"><br>
        <input type="submit" name="añadir" value="Añadir"><br><br>
        <a href="index.php">Volver al Menu</a>
    </form>
    <?php
    ?>
</body>

</html>