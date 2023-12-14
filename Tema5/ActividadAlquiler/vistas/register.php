<body>

    <?php
    require_once '../controladores/ClienteControler.php';
    if (isset($_POST['volver'])) {
        header("Location:index.php");
    }

    if (isset($_POST['register'])) {
        $claveHash = password_hash($_POST['clave'], PASSWORD_DEFAULT);
        $cliente = new Cliente($_POST['dni'], $_POST['nombre'], $_POST['apellido'], $_POST['direccion'], $_POST['localidad'], $claveHash, "cliente");
        if (ClienteControler::nuevoCLiente($cliente)) {
            session_start();
            $_SESSION['cliente'] = $cliente;
            header("Location:index.php");
        }
    }


    ?>

    <h1>Register</h1>
    <form action="" method="post">
        Dni:<input type="text" name="dni"><br>
        Nombre:<input type="text" name="nombre"><br>
        Apellido:<input type="text" name="apellido"><br>
        Direccion:<input type="text" name="direccion"><br>
        Localidad:<input type="text" name="localidad"><br>
        Clave:<input type="text" name="clave"><br>
        <input type="submit" value="Register" name="register">
        <input type="submit" value="Volver" name="volver">
    </form>
</body>