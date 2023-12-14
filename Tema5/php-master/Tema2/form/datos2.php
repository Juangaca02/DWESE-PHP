<?php

//var_dump($_POST); Esta variable nos enseña todo el contenido de una variable, en este caso del formulario enviado

if (isset($_POST['enviar'])) {
    echo "<br>Nombre: ".$_POST["nombre"];
    echo "<br>Apellidos: ".$_POST["apell"];
    foreach ($_POST["modulos"] as $value) {
        echo "<br>$value";
    }
}
 else {
    header("Location:EjemploForm2.php");
}
?>
<br>

<a href="EjemploForm2.php">Atras</a>

