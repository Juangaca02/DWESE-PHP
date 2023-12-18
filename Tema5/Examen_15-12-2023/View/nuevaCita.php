<style>
</style>
<?php
require_once '../Model/Usuario.php';
require_once '../Controller/citasController.php';
require_once '../Controller/vehiculoController.php';
require_once '../Controller/itvsController.php';
session_start();
$mensajeExiste = false;
$noEsxisteVehiculo = false;
$vehiculoSinCita = false;
if (isset($_SESSION['usuario'])) {
    echo "Hola Administrador de : " . $_SESSION['usuario']->provincia;
    echo "<br>Telefono : " . $_SESSION['usuario']->telefono;
    echo "<br><a href='cerrar.php'>Cerrar Sesion</a><br><a href='menu.php'>Volver</a><h1>Gestion de citas de la ITV de " . $_SESSION['usuario']->provincia . "</h1>";
    echo "";
}

if (isset($_POST['buscar'])) {
    $vehiculoExiste = vehiculoController::comprobarMatricula($_POST['matriculaBuscar']);
    if ($vehiculoExiste === null) {
        $noEsxisteVehiculo = true;
    }
    if ($vehiculoExiste) {
        $busqueda = citasController::comprobarCita($_POST['matriculaBuscar'], $_SESSION['usuario']->provincia);
        if ($busqueda === null) {
            $vehiculoSinCita = true;
        }
        if ($busqueda) {
            $mensajeExiste = true;
        }
    }



}
?>


<style>
    div,
    h1 {
        text-align: center;
    }
</style>

<body>
    <br>
    <div>
        <form action="" method="post">
            Matricula <input type="text" name="matriculaBuscar"><input type="submit" value="Buscar"
                name="buscar"><br><br>
            <?php
            if ($mensajeExiste) {
                foreach ($busqueda as $value) {
                    echo 'Ya tiene una cita el dia ' . $value['fecha'] . ' a las ' . $value['hora'] .
                        ' en la ITV de ' . $value['localidad'] . ' en la provincia de ' . $value['provincia'];
                    echo '<br><input type="submit" value="Anular" name="anular">';
                }
            }
            if ($noEsxisteVehiculo) {
                echo "No tiene ningun vehiculo con esa matricula";
            }

            if ($vehiculoSinCita) {
                foreach ($vehiculoExiste as $value) {
                    echo "Matricula no tiene Cita<br>";
                    ?>
                    Matricula <input type="text" name="matricula" disabled value="<?php echo $value['matricula'] ?>"><br>
                    Marca <input type="text" name="marca" disabled value="<?php echo $value['marca'] ?>"><br>
                    Modelo <input type="text" name="modelo" disabled value="<?php echo $value['modelo'] ?>"><br>
                    Plazas <input type="text" name="plazas" disabled value="<?php echo $value['plazas'] ?>"><br>
                    Color <input type="text" name="color" disabled value="<?php echo $value['color'] ?>"><br>
                    Fecha Ultima Revision <input type="text" name="Fecha_ltima_revision" disabled
                        value="<?php echo $value['fecha_ultima_revision'] ?>"><br>
                    Elegir ITV
                    <select name="itvsDisponibles" id="">
                        <?php
                        $valoritv = itvsController::itvsPorProvincia($_SESSION['usuario']->provincia);
                        if ($valoritv === null) {
                            $noEsxisteItv = true;
                        }
                        if ($valoritv) {
                            foreach ($valoritv as $value) {
                                echo '<option value="' . $value['provincia'] . '-' . $value['direccion'] . '">' . $value['provincia'] . '-' . $value['direccion'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                    Fecha <input type="date" name="fecha">
                    Hora <input type="time" name="hora">
                    Ficha tecnica <input type="file" name="ficha" accept=".jpg">>
                    <input type="submit" name="registrar">
                    <?php
                }
            }
            ?>
        </form>
    </div>
</body>