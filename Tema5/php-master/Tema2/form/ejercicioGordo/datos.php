<?php

if (isset($_POST['enviar'])) {
    //var_dump($_POST);
    echo "<br>Nombre: " . $_POST["nombre"];
    echo "<br>Apellidos: " .$_POST["apell"];
    echo "<br>Nº Matricula: " .$_POST["matricula"];
    echo "<br>Curso: " .$_POST["curso"];
    echo "<br>Precio: " .$_POST["precio"];
    echo '<br><a href="index.php">Atras</a>';
}
