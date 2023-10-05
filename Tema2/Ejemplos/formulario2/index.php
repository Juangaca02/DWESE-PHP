<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <form action="pedido.php" method="POST">
            <?php
            if (isset($_POST['cambiar'])) {
                echo '<input type="hidden" name="direccion" value="' . $_POST['direccion'] . ' ">';
                echo ' <input type="hidden" name="telefono" value="' . $_POST['telefono'] . ' ">';
            }
            ?>
            Nombre: <input type="text" name="nombre" value="<?php if (isset($_POST['cambiar'])) echo $_POST["nombre"] ?>"><br>
            Apellidos: <input type="text" name="apell" value="<?php if (isset($_POST['cambiar'])) echo $_POST["apell"] ?>"><br>
            <input type="submit" name="Siguiente" value="Siguiente">
        </form>
    </body>
</html>