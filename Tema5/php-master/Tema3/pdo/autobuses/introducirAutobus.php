<?php
if (isset($_POST['enviar'])) {
    require_once("funciones.php");
    $conex = crearConexion();
    $result = $conex->query("select * from autos where matricula = '$_POST[matricula]'");
    if ($result->fetchObject()) {
        echo "La matrícula ya existe en la base de datos";
    } else {
        try {
            $conex->exec("insert into autos values ('$_POST[matricula]','$_POST[marca]', $_POST[plazas])");
            echo "Insertado correctamente";
        } catch (PDOException $e) {
            die($e->getMessage());
        }


    }
}
?>
<h1>Introducir Autobus</h1><br>
<form action="" method="post">
    Matrícula: <input type="text" name="matricula"><br><br>
    Marca: <input type="text" name="marca"><br><br>
    Nº de plazas <input type="number" name="plazas"><br><br>
    <input type="submit" name="enviar" value="enviar">
</form>
<br>
<a href="index.php">Volver</a>