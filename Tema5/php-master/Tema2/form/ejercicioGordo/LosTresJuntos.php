<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <?php if (!isset($_POST["enviar"]) && !isset($_POST["enviar2"])) { ?>
        <form action="" method="POST">
            Nombre: <input type="text" name="nombre"><br>
            Apellidos: <input type="text" name="apell"><br>
            <input type="submit" name="enviar" value="Enviar">
        </form>
        <?php } if(isset($_POST["enviar"])) {?>
        <form action="" method="POST">
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
            <input type="submit" name="enviar2" value="Enviar">
        </form>
        <?php } if (isset($_POST['enviar2'])) {
                echo "<br>Nombre: " . $_POST["nombre"];
                echo "<br>Apellidos: " .$_POST["apell"];
                echo "<br>Nº Matricula: " .$_POST["matricula"];
                echo "<br>Curso: " .$_POST["curso"];
                echo "<br>Precio: " .$_POST["precio"];
                echo '<br><a href="LosTresJuntos.php">Atras</a>';
            }
            ?>

    </body>
</html>