<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <form action="datos.php" method="POST">
            <input type="hidden" name="nombre" value="<?php echo $_POST["nombre"] ?>">
            <input type="hidden" name="apell" value="<?php echo $_POST["apell"] ?>">
            Nº matricula: <input type="text" name="matricula"><br>
            <label>Selecciona un curso:</label>
            <select name="curso">
                <option value="1/ESO">1/ESO</option>
                <option value="2/ESO">2/ESO</option>
                <option value="3/ESO">3/ESO</option>
                <option value="4/ESO">4/ESO</option>
                <option value="1/DAW">1DAW</option>
                <option value="2/DAW">2/DAW</option>
            </select><br>
            Precio: <input type="text" name="precio"><br>
            <input type="submit" name="enviar" value="Enviar">
        </form>
    </body>
</html>