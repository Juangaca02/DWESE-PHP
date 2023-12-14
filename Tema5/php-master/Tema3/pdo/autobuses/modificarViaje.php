<?php
require_once("funciones.php");
$conex = crearConexion();
if (isset($_POST['borrar'])) {
    $conex->exec("delete from viajes where matricula like '$_POST[1]'");
}
if (isset($_POST['cambiar'])) {
    $validate = validarPlazas($conex, $_POST['numPlazasM'], $_POST['matricula']);
    if ($validate) {
        try {
            $conex->exec("update viajes set fecha = '$_POST[fechaM]', matricula = '$_POST[matricula]', origen = '$_POST[origenM]', destino = '$_POST[destinoM]', plazas_libres = $_POST[numPlazasM] where 
        fecha = '$_POST[fechaHidden]'&& matricula = '$_POST[matriculaHidden]' && origen = '$_POST[origenHidden]'&& destino = '$_POST[destinoHidden]'");
            echo "Modificacion relaizada<br>";
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
?>
<a href="index.php">Volver</a>
<h1>MODIFICAR/BORRAR VIAJE</h1>
<table border="1">
    <tr>
        <th>Fecha</th>
        <th>Matricula</th>
        <th>Origen</th>
        <th>Destino</th>
        <th>Plazas</th>
        <th>Operación</th>
    </tr>
    <?php
    try {
        $result = $conex->query("SELECT * FROM viajes");
        while ($row = $result->fetchObject()) {
            $i = 0;
            echo "<form action='' method='POST'>";

            echo "<tr>";
            foreach ($row as $key => $value) {
                echo "<td>$value</td>";
                echo "<input type=hidden name=$i value=$value>";
                $i++;
            }
            echo "<td><input type='submit' name='modificar' value='Modificar'><input type='submit' name='borrar' value='Borrar'></td>";
            echo "</tr>";
            echo "</form>";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    ?>
</table>

<?php
if (isset($_POST['modificar'])) {
    ?>
    <form action="" method="POST">
        Fecha: <input type="date" name="fechaM" value="<?php echo $_POST['0'] ?>"><br>
        <input type="hidden" name="fechaHidden" value="<?php echo $_POST['0'] ?>">
        Autobus:
        <?php crearSelectMatriculaSeleccionada($conex, $_POST['1']) ?>
        <input type="hidden" name="matriculaHidden" value="<?php echo $_POST['1'] ?>">
        Origen: <input type="text" name="origenM" value="<?php echo $_POST['2'] ?>"><br>
        <input type="hidden" name="origenHidden" value="<?php echo $_POST['2'] ?>">
        Destino: <input type="text" name="destinoM" value="<?php echo $_POST['3'] ?>"><br>
        <input type="hidden" name="destinoHidden" value="<?php echo $_POST['3'] ?>">
        <?php if (isset($_POST['cambiar']) && !$validate) {
            echo "Número de plazas superior al posible";
        } ?>
        Numero de Plazas: <input type="number" name="numPlazasM" value="<?php echo $_POST['4'] ?>"><br>
        <input type="submit" name="cambiar" value="Añadir">
    </form>
    <?php
}

?>