<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <form action="confirmacion.php" method="POST">
            <input type="hidden" name="nombre" value="<?php echo $_POST["nombre"] ?>">
            <input type="hidden" name="apell" value="<?php echo $_POST["apell"] ?>">
            Direccion: <input type="text" name="direccion" value="<?php if (isset($_POST['direccion'])) echo $_POST["direccion"] ?>"><br>
            Nº Telefono: <input type="text" name="telefono" value="<?php if (isset($_POST['telefono'])) echo $_POST["telefono"] ?>"><br>
            <input type="submit" name="enviar" value="Enviar">
        </form>
    </body>
</html>