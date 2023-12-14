<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <?php if (!isset($_POST["enviar"]) && !isset($_POST["enviar2"])) {
            ?>
        <form action="" method="POST">
        Nombre: <input type="text" name="nombre">
        <br>
        Apellidos: <input type="text" name="apell">
        <br><input type="radio" name="genero" value="masculino"> Masculino
        <br><input type="radio" name="genero" value="femenino"> Femenino
        <br><input type="radio" name="genero" value="otro"> Otro
        <br>Aficiones:<br>
        Cine:<input type="checkbox" name="aficiones[]" value="cine"><br>
        Lectura:<input type="checkbox" name="aficiones[]" value="lectura"><br>
        Televisión:<input type="checkbox" name="aficiones[]" value="television"><br>
        Deporte:<input type="checkbox" name="aficiones[]" value="deporte"><br>
        Música:<input type="checkbox" name="aficiones[]" value="musica"><br>
        <input type="submit" name="enviar" value="enviar">
        </form>
        <?php
        } else if (isset($_POST["enviar"])) { ?>
        <form action="" method="POST">
            <input type="hidden" name="nombre" value="<?php echo $_POST["nombre"] ?>">
            <input type="hidden" name="apell" value="<?php echo $_POST["apell"] ?>">
            <input type="hidden" name="genero" value="<?php echo $_POST["genero"] ?>">
            <input type="hidden" name="aficiones" value="<?php echo implode(";", $_POST["aficiones"])?>">
            <br><input type="radio" name="estado" value="feliz"> Feliz
        <br><input type="radio" name="estado" value="casado"> Casado
        <br>
            <label>Selecciona varios estudios:</label><br>
        <select name="estudios[]" multiple>
            <option value="ESO">ESO</option>
            <option value="bachillerato">Bachillerato</option>
            <option value="CFGM">CFGM</option>
            <option value="CFGS">CFGS</option>
            <option value="universidad">Universidad</option>
        </select><br>
        <label>Selecciona una fruta:</label>
        <select name="edad">
            <option value="1/14">De 1 a 14 años</option>
            <option value="15/25">De 15 a 25 años</option>
            <option value="26/35">De 26 a 35 años</option>
            <option value="+35">Mas de 35 años</option>
        </select><br>
        <input type="submit" name="enviar2" value="enviar2">
        </form>
        <?php    
        }
      
        else if (isset($_POST['enviar2'])) {
            //var_dump($_POST);
            echo "<br>Nombre: " . $_POST["nombre"];
            echo "<br>Apellidos: " .$_POST["apell"];
            echo "<br>Genero: " .$_POST["genero"];
            echo "<br>Estado Civil: ". $_POST["estado"];
            echo "<br>Aficiones";
            $array = explode(";", $_POST["aficiones"]);
            foreach ($array as $value) {
                echo "<br>$value";
            }
            echo "<br>Estudios";
            foreach ($_POST["estudios"] as $value) {
                echo "<br>$value";
            }
            echo "<br>Edad: " . $_POST["edad"];
            echo '<br><a href="EjemploForm5V2.php">Atras</a>';
            }
        ?>
    </body>
</html>