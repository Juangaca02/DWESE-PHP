
<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <?php
        if (!isset($_POST['Siguiente']) && !isset($_POST['Enviar'])) {
            ?>
            <form action="" method="POST">
                Nombre: <input type="text" name="nombre"><br>
                Apellidos: <input type="text" name="apell"><br>
                Sexo: <input type="radio" name="sexo" value="hombre"> Hombre 
                <input type="radio" name="sexo" value="mujer"> Mujer 
                <input type="radio" name="sexo" value="otro"> Otro<br>
                Aficiones: <input type="checkbox" name="aficiones[]" value="Cine"> Cine 
                <input type="checkbox" name="aficiones[]" value="Lectura"> Lectura 
                <input type="checkbox" name="aficiones[]" value="Televivion"> Televivion<br>
                <input type="checkbox" name="aficiones[]" value="Deporte"> Deporte 
                <input type="checkbox" name="aficiones[]" value="Musica"> Musica <br>
                <input type="submit" name="Siguiente" value="Siguiente">
            </form>

            <?php
        }
        if (isset($_POST['Siguiente'])) {
            ?>  
            <form action="" method="POST">
                <input type="hidden" name="nombre" value="<?php echo $_POST["nombre"] ?>">
                <input type="hidden" name="apell" value="<?php echo $_POST["apell"] ?>">
                <input type="hidden" name="sexo" value="<?php echo $_POST['sexo'] ?>">
                <input type="hidden" name="aficiones" value="<?php echo implode(";", $_POST['aficiones']) ?>">
                Estado Civil
                <input type="radio" name="estado" value="Casado">Casado
                <input type="radio" name="estado" value="Soltero">Soltero<br>
                Estudios<br><select multiple name="estudios[]">
                    <option value="Eso">Eso</option>
                    <option value="Bachillerato">Bachillerato</option>
                    <option value="FPGM">FPGM</option>
                    <option value="FPGS">FPGS</option>
                    <option value="Universidad">Universidad</option>
                </select><br> 
                Edad <br> <select name="edad">
                    <option value="Edad entre 1 y 14">Edad entre 1 y 14</option>
                    <option value="Edad entre 15 y 25">Edad entre 15 y 25</option>
                    <option value="Edad entre 26 y 35">Edad entre 26 y 35</option>
                    <option value="Mas de 36">Mas de 36</option>
                </select>
                <input type="submit" name="Enviar" value="Enviar">
            </form>
            <?php
        }
        ?>
        <?php
        if (isset($_POST['Enviar'])) {
            echo "Nombre: " . $_POST["nombre"];
            echo "<br>Apellidos: " . $_POST["apell"];
            echo "<br>Sexo:" . $_POST['sexo'];
            $aficiones = explode(";", $_POST['aficiones']);
            echo "<br>Aficiones:";
            foreach ($aficiones as $value) {
                echo '<br>';
                echo $value;
            }
            echo "<br>Estado Civil.:" . $_POST['estado'];
            echo "<br>Edad: " . $_POST["edad"];
            echo "<br>Estudios:";
            foreach ($_POST['estudios'] as $value) {
                echo '<br>';
                echo $value;
            }
        }
        ?>
    </body>
</html>


