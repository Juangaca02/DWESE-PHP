
<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <form action="Matricula.php" method="POST">
            Nombre: <input type="text" name="nombre"><br>
            Apellidos: <input type="text" name="apell"><br>
            <input type="submit" name="Siguiente" value="Siguiente">
            <?php
            if (isset($_POST['Siguiente'])) {
                ?>  
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
                    <input type="submit" name="Enviar" value="Enviar">
                </form>
                <?php
            }
            ?>
            <?php
            if (isset($_POST['Enviar'])) {
                echo "<br>Nombre: " . $_POST["nombre"];
                echo "<br>Apellidos: " . $_POST["apell"];
                echo "<br>Nº Matricula: " . $_POST["matricula"];
                echo "<br>Curso: " . $_POST["curso"];
                echo "<br>Precio: " . $_POST["precio"];
                echo '<br><a href="index.php">Atras</a>';
            }
            ?>
        </form>
    </body>
</html>


