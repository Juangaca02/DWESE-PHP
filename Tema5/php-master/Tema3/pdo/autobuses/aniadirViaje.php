<?php
require_once("funciones.php");
$conex = crearConexion();
if (isset($_POST['enviar'])) {
    try {
        if (validarPlazas($conex, $_POST["plazas"], $_POST['matricula'])) {
            $conex->exec("insert into viajes values ('$_POST[date]', '$_POST[matricula]', '$_POST[origen]', '$_POST[destino]', $_POST[plazas])");
            echo "Viaje insertado";
        }
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
?>

<form action="" method="post">
    Fecha: <input type="date" name="date"><br>
    <?php
    echo "<br>Matrícula";
    crearSelectMatricula($conex);
    echo "<br><br>";
    ?> Origen:<input type="text" name="origen">
    <?php
    echo "<br><br>";

    ?> Destino:<input type="text" name="destino">
    <?php
    echo "<br><br>";
    ?> Nº de plazas<input type="number" name="plazas">
    <?php if (isset($_POST['enviar']) && !validarPlazas($conex, $_POST['plazas'], $_POST['matricula'])) {
        echo "El numero de plazas es mayor al posible";
    } ?>
    <input type="submit" name="enviar" value="enviar"><br>
    <a href="index.php">Volver</a>
</form>