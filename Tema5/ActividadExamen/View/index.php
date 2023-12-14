<body>
    <?php
    require_once '../Controller/vehiculoController.php';
    require_once '../Model/Vehiculo.php';
    session_start();
    $modificarVehiculo = false;
    if (isset($_SESSION['vehiculo'])) {
        echo "Hola coche: " . $_SESSION['vehiculo']->matricula . $_SESSION['vehiculo']->marca . $_SESSION['vehiculo']->modelo . $_SESSION['vehiculo']->color;
        $modificarVehiculo = true;
    }
    if (isset($_POST['crearVehiculo'])) {
        header("Location:crearVehiculo.php");
    }
    if (isset($_POST['modificarVehiculo'])) {
        header("Location:modificarVehiculo.php");
    }
    ?>

    <h1>Index</h1>
    <h3>Esto es el index</h3>
    <form action="" method="post">
        <input type="submit" value="crearVehiculo" name="crearVehiculo">
        <?php
        if ($modificarVehiculo) {
            echo '<br><input type="submit" value="modificarVehiculo" name="modificarVehiculo">';
        }
        ?>
    </form>

</body>