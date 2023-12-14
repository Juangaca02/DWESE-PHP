<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <?php
      
if (isset($_POST['enviar'])) {
    //var_dump($_POST);
    echo "<br>Nombre: " . $_POST["nombre"];
    echo "<br>Apellidos: " .$_POST["apell"];
    echo "<br>Aficiones";
    foreach ($_POST["aficiones"] as $value) {
        echo "<br>$value";
    }
    echo "<br>Estudios";
    foreach ($_POST["estudios"] as $value) {
        echo "<br>$value";
    }
    echo "<br>Edad: " . $_POST["edad"];
    echo '<br><a href="EjemploForm5.php">Atras</a>';
} else {
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
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <?php
}
?>
    </body>
</html>