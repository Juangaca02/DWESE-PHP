<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <form action="pedido.php" method="POST">
            <?php
                if (isset($_POST["cancelar"])){
                    ?>
                    <input type="hidden" name="direccion" value="<?php echo $_POST["direccion"] ?>">
                    <input type="hidden" name="tarjeta"value="<?php echo $_POST["tarjeta"] ?>">
            <?php
                }
            ?>
            Nombre: <input type="text" name="nombre" value="<?php if (isset($_POST["cancelar"])) echo $_POST["nombre"]?>"><br>
            Apellidos: <input type="text" name="apell" value="<?php if (isset($_POST["cancelar"])) echo $_POST["apell"]?>"><br>
            <input type="submit" name="enviar" value="Enviar">
        </form>
    </body>
</html>
