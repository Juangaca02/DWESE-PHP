
<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <?php
        if (!isset($_POST['Siguiente']) && !isset($_POST['Enviar'])) {
            ?> 
            <form action="" method="POST">
                Nombre: <input type="text" name="nombre" value="<?php if (isset($_POST['cambiar'])) echo $_POST["nombre"] ?>"><br>
                Apellidos: <input type="text" name="apell" value="<?php if (isset($_POST['cambiar'])) echo $_POST["apell"] ?>"><br>
                Idiomas: <br>
                <input type="checkbox" name="idiomas[]" value="Español">Español<br>
                <input type="checkbox" name="idiomas[]" value="Ingles">Ingles<br>
                <input type="checkbox" name="idiomas[]" value="Frances">Frances<br>
                <input type="checkbox" name="idiomas[]" value="Aleman">Aleman<br>
                <input type="submit" name="Siguiente" value="Siguiente">
            </form>
            <?php
        }
        if (isset($_POST['Siguiente'])) {
            ?>  
            <form action="" method="POST">
                <input type="hidden" name="nombre" value="<?php echo $_POST["nombre"] ?>">
                <input type="hidden" name="apell" value="<?php echo $_POST["apell"] ?>">
                <input type="hidden" name="idiomas" value="<?php echo implode(";", $_POST['idiomas']) ?>">
                Direccion: <input type="text" name="direccion" value="<?php if (isset($_POST['direccion'])) echo $_POST["direccion"] ?>"><br>
                Nº Telefono: <input type="text" name="telefono" value="<?php if (isset($_POST['telefono'])) echo $_POST["telefono"] ?>"><br>
                <input type="submit" name="Enviar" value="Enviar">
            </form>
            <?php
        }
        ?>
        <?php
        if (isset($_POST['Enviar'])) {
            echo "Nombre: " . $_POST["nombre"];
            echo "<br>Apellidos: " . $_POST["apell"] . "<br>";
            $idiomas = explode(";", $_POST['idiomas']);
            foreach ($idiomas as $value) {
                echo $value;
            }
            echo "<br>Direccion: " . $_POST["direccion"];
            echo "<br>Nº Telefono: " . $_POST["telefono"];
            ?>
            <form action = "index.php" method="POST">
                <input type = "submit" name = "cambiar" value = "Cambiar">
                <input type="hidden" name="nombre" value="<?php echo $_POST["nombre"] ?>">
                <input type="hidden" name="apell" value="<?php echo $_POST["apell"] ?>">
                <input type="hidden" name="direccion" value="<?php echo $_POST["direccion"] ?>">
                <input type="hidden" name="telefono" value="<?php echo $_POST["telefono"] ?>">
            </form>
            <form action = "index.php" method="POST">
                <input type = "submit" name = "enviar" value = "Enviar">
            </form>
            <?php
        }
        ?>

    </body>
</html>


