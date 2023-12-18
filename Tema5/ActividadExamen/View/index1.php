<body>
    <?php
    require_once '../Controller/vehiculoController.php';
    require_once '../Model/Vehiculo.php';
    session_start();
    $modificarVehiculo = false;
    $sesionIniciada = true;
    if (isset($_POST['cerrarSesion'])) {
        $sesionIniciada = false;
        session_unset();
        //unset($_SESSION);
        setcookie("PHPSESSID", 0, time() - 1, "/");
        session_destroy();
        echo 'Sesion Cerrada';
    }
    if (isset($_SESSION['vehiculo']) && $sesionIniciada == true) {
        echo "Hola coche: " . $_SESSION['vehiculo']->matricula . $_SESSION['vehiculo']->marca . $_SESSION['vehiculo']->modelo . $_SESSION['vehiculo']->color;
        $modificarVehiculo = true;
    }
    if (isset($_POST['crearVehiculo'])) {
        header("Location:crearVehiculo.php");
    }
    if (isset($_POST['modificarVehiculo'])) {
        header("Location:modificarVehiculo.php");
    }

    /*
        if (isset($_SESSION['sesionCerrada'])) {
        echo 'Sesion Cerrada';
        session_destroy();
    }
        if (isset($_POST['cerrarSesion'])) {
            session_unset();
            //unset($_SESSION);
            setcookie("PHPSESSID", 0, time() - 1, "/");
            session_destroy();
            session_name("sesionCerrada");
            session_start();
            if (isset($_COOKIE['sesionCerrada'])) {
                echo 'Sesion Cerrada';
            }
            //header("Location:cerrarSesion.php");
            if (isset($_COOKIE['sesionCerrada'])) {
                echo 'Sesion Cerrada';
                setcookie("sesionCerrada", 0, time() - 1, "/");
                session_destroy();
            }
        }
    */
    if (isset($_POST['login'])) {
        header("Location:login.php");
    }
    ?>

    <h1>Index</h1>
    <h3>Esto es el index</h3>
    <form action="" method="post">
        <input type="submit" value="crearVehiculo" name="crearVehiculo">
        <?php
        if ($modificarVehiculo) {
            echo '<br><input type="submit" value="modificarVehiculo" name="modificarVehiculo"><br>';
        }
        ?>
        <input type="submit" value="cerrarSesion" name="cerrarSesion"><br>
        <input type="submit" value="login" name="login">
    </form>

</body>