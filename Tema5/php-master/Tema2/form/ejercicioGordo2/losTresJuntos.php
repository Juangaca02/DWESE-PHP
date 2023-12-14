<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <form action="" method="POST">
            <?php
            if (!isset($_POST["enviar"]) && !isset($_POST["enviar2"])) {
                if (isset($_POST["cancelar"])){
                    ?>
                    <input type="hidden" name="direccion" value="<?php echo $_POST["direccion"] ?>">
                    <input type="hidden" name="tarjeta"value="<?php echo $_POST["tarjeta"] ?>">
            <?php
            $array = explode(";", $_POST["idiomas"]);
                }
                
            ?>
            
                
            Nombre: <input type="text" name="nombre" value="<?php if (isset($_POST["cancelar"])) echo $_POST["nombre"]?>"><br>
            Apellidos: <input type="text" name="apell" value="<?php if (isset($_POST["cancelar"])) echo $_POST["apell"]?>"><br>
            Idiomas: <br>
            <input type="checkbox" name="idiomas[]" value="espaniol" <?php if(isset($array)) if(in_array("espaniol", $array)) echo "checked" ?>>Español<br>
            <input type="checkbox" name="idiomas[]" value="ingles" <?php if(isset($array)) if(in_array("ingles", $array)) echo "checked" ?>>Ingles<br>
            <input type="checkbox" name="idiomas[]" value="frances" <?php if(isset($array)) if(in_array("frances", $array)) echo "checked" ?>>Frances<br>
            <input type="checkbox" name="idiomas[]" value="aleman"<?php if(isset($array)) if(in_array("aleman", $array)) echo "checked" ?>>Aleman<br>
            <input type="submit" name="enviar" value="Enviar">
        </form>
            <?php } if (isset($_POST["enviar"])) { ?>
        <form action="" method="POST">
            <input type="hidden" name="nombre" value="<?php echo $_POST["nombre"] ?>">
            <input type="hidden" name="apell" value="<?php echo $_POST["apell"] ?>">
            <?php 
                $str = implode(";",$_POST["idiomas"]);
            ?>
            <input type="hidden" name="idiomas" value="<?php echo $str?>">
            Dirección: <input type="text" name="direccion" value="<?php if (isset($_POST["direccion"])) echo $_POST["direccion"]?>"><br>
            Nº Tarjeta: <input type="text" name="tarjeta" value="<?php if (isset($_POST["tarjeta"])) echo $_POST["tarjeta"]?>"><br>
            <input type="submit" name="enviar2" value="Enviar">
        </form>
        <?php
        }
            if (isset($_POST["enviar2"])) {
                echo "<br>Nombre: " . $_POST["nombre"];
                echo "<br>Apellidos: " . $_POST["apell"];
                echo "<br>Idiomas: ";
                foreach (explode(";", $_POST["idiomas"]) as $value) {
                    echo "<br>$value";
                }
                echo "<br>Nº Matricula: " .$_POST["direccion"];
                echo "<br>Curso: " .$_POST["tarjeta"];
            
        ?>
        <form action="" method="POST">
            <input type="hidden" name="nombre" value="<?php echo $_POST["nombre"] ?>">
            <input type="hidden" name="apell" value="<?php echo $_POST["apell"] ?>">
            <input type="hidden" name="direccion" value="<?php echo $_POST["direccion"] ?>">
            <input type="hidden" name="tarjeta"value="<?php echo $_POST["tarjeta"] ?>">
            <input type="hidden" name="idiomas"value="<?php echo $_POST["idiomas"] ?>">
            <br>
            <input type="submit" name="cancelar" value="Cancelar"> <a href="losTresJuntos.php"><button type="button"> Confirmar</button></a>
        </form>
            <?php } ?>
    </body>
</html>
