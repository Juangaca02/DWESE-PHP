

<?php
if (isset($_POST['enviar'])) {
    //var_dump($_POST);
    echo "Nombre: " . $_POST["nombre"];
    echo "<br>Apellidos: " . $_POST["apell"];
    echo "<br>Direccion: " . $_POST["direccion"];
    echo "<br>Nº Telefono: " . $_POST["telefono"];
}
?>
<form action = "index.php">
    <input type = "submit" name = "cambiar" value = "Cambiar">
</form>
<form action = "index.php" method="POST">
    <input type = "submit" name = "enviar" value = "Enviar">
</form>


