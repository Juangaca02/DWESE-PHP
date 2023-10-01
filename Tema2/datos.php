

<?php
//var_dump($_POST); Esta variable nos enseña todo el contenido de una variable, en este caso del formulario enviado
if (isset($_POST['enviar'])) {
    echo "<br>Nombre: " . $_POST["nombre"];
    echo "<br>Apellidos: " . $_POST["apell"];
    foreach ($_POST["modulos"] as $value) {
        echo "<br>$value";
    }
} else {
    header("Location:ejem_form.php");
}
?>

<br>

<a href="ejem_form.php">Atras</a>

<?php
if (isset($_POST['enviar'])) {
    if (!empty($_POST['nombre']) && !empty($_POST['apell']) && isset($_POST['modulos'])) {
        echo "<br>Nombre: " . $_POST["nombre"];
        echo "<br>Apellidos: " . $_POST["apell"];
        foreach ($_POST["modulos"] as $value) {
            echo "<br>$value";
        }
    }
} else {
    header("Location:ejem_form.php");
}
?>
