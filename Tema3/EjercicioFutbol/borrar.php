<html>

<head>
    <meta charset="UTF8">
</head>

<body>
    <h1>Borrar Jugador</h1>
    <form action="" method="post">
        Introduzca el Dni<input type="text" name="dni">
        <input type="submit" name="borrar" value="Borrar">
    </form>
    <?php
    require_once "funciones.php";
    if (isset($_POST['borrar'])) {
        $conex = crearConexion();
        try {
            $conex->query("DELETE FROM jugador WHERE DNI = '$_POST[dni]'");
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        echo "Borrado realizado correctamente";
        $conex->close();
    }
    ?>
</body>

</html>