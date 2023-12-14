<body>
    <?php
    require_once "../controller/JuegoControler.php";
    if (isset($_POST["modificar"])) {
        JuegoControler::modificarUnJuego(new Juego($_POST["cod"], $_POST["nombre"], $_POST["consola"], $_POST["fecha"], $_POST["precio"], $_POST["alquilado"], "", $_POST["descipcion"]));
        session_start();
        $_SESSION['mensaje'] = 'Se ha modificado el juego correctamente';
        header("Location:index.php");
    }
    if (!isset($_POST["mod"]))
        header("Location:index.php");
    $juego = JuegoControler::dameUnJuego($_POST["cod"]);
    ?>

    <h1>Juego</h1>
    <form action="" method="post">
        Nombre: <input type="text" name="dni"><br>
        Consola: <select name="consola">
            <option value="ps4" <?php if ($juego->nombreConsola == "ps4")
                echo "selected" ?>>PlayStation 4</option>
                <option value="xbox" <?php if ($juego->nombreConsola == "xbox")
                echo "selected" ?>>Xbox One</option>
                <option value="nintendo" <?php if ($juego->nombreConsola == "nintendo")
                echo "selected" ?>>Nintendo Switch
                </option>
            </select><br>
            Año: <input type="text" name="pass"><br>
            Precio: <input type="text" name="pass"><br>
            <input type="submit" value="Login" name="login">
            <input type="submit" value="Volver" name="volver">
        </form>
    </body>