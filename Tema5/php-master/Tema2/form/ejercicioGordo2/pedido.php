<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <form action="confirmacion.php" method="POST">
            <input type="hidden" name="nombre" value="<?php echo $_POST["nombre"] ?>">
            <input type="hidden" name="apell" value="<?php echo $_POST["apell"] ?>">
            Dirección: <input type="text" name="direccion" value="<?php if (isset($_POST["direccion"])) echo $_POST["direccion"]?>"><br>
            Nº Tarjeta: <input type="text" name="tarjeta" value="<?php if (isset($_POST["tarjeta"])) echo $_POST["tarjeta"]?>"><br>
            <input type="submit" name="enviar" value="Enviar">
        </form>
    </body>
</html>
