<?php
require_once '../Model/Cliente.php';
require_once '../Controller/AlquilerController.php';
require_once '../Controller/JuegoController.php';
session_start();
if (!isset($_SESSION["usuario"]))
    header("Location:index.php");
if (isset($_POST["devolver"])) {
    JuegoController::devolverJuego($_POST["codJuego"]);
    AlquilerController::devolverJuego($_POST["codAlquilar"]);
    header("Location:index.php");
}
echo "Hola " . $_SESSION["usuario"]->nombre;
$tabla = AlquilerController::dameMisJuegosAlquilados($_SESSION["usuario"]->dni);
if ($tabla === null)
    echo "No tienes Juegos alquilados";
if ($tabla === false)
    echo "fallo en la base de datos";
if ($tabla) {
    ?>

    <table border="1px">
        <tr>
            <td>Caratula</td>
            <td>Nombre</td>
            <td>Consola</td>
            <td>Año</td>
            <td>Fecha Alquiler</td>
            <td>Fecha prevista</td>
            <td>Fecha devolucion</td>
        </tr>
        <?php
        foreach ($tabla as $fila) {
            $nuevaFecha = date("Y-m-d", strtotime($fila["Fecha_alquiler"] . " +7 days"));
            echo "<tr>";
            echo "<td><img src='$fila[imagen]' width='50px' heigth='50px'></td>";
            echo "<td>$fila[nombreJuego]</td>";
            echo "<td>$fila[nombreConsola]</td>";
            echo "<td>$fila[anno]</td>";
            echo "<td>$fila[Fecha_alquiler]</td>";
            echo "<td>$nuevaFecha</td>";
            if ($fila["Fecha_devol"] == null)
                echo "<td><form action='' method='POST'><input type='hidden' name='codAlquilar' value='$fila[id]'><input type='hidden' name='codJuego' value='$fila[codJuego]'><input type='submit' name='devolver' value='Devolver'></form></td>";
            else
                echo "<td>$fila[Fecha_devol]</td>";
            echo "</tr>";

        }
        echo "</table>";
}
?>
    <a href="index.php">Volver</a>