<style>
    div,
    h1,
    table {
        text-align: center;
        align-items: center;
    }
</style>
<?php
require_once '../Model/Usuario.php';
require_once '../Controller/itvsController.php';
session_start();


$tabla = false;
if (isset($_SESSION['usuario'])) {
    echo "Hola Administrador de : " . $_SESSION['usuario']->provincia;
    echo "<br>Telefono : " . $_SESSION['usuario']->telefono;
    echo "<br><a href='cerrar.php'>Cerrar Sesion</a><br><a href='menu.php'>Volver</a> <h1>Sedes de ITV de la provincia de " . $_SESSION['usuario']->provincia . "</h1>";

    $provinciaResultado = itvsController::itvsPorProvincia($_SESSION['usuario']->provincia);
    if ($provinciaResultado === null) {
        $tabla = false;
    }
    if ($provinciaResultado) {
        $tabla = true;
    }
}

if (isset($_POST['misCitas'])) {
    header('Location:citas.php');
}
?>

<body>
    <div>
        <?php
        if ($tabla) {
            echo '<table border="1"><tr><td>Localidad</td><td>DIreccion</td><td>Citas</td></tr>';
            foreach ($provinciaResultado as $value) {
                echo '<tr>
                <td>' . $value['localidad'] . '</td>
                <td>' . $value['direccion'] . '</td>
                <td><form action="" method="post"><input type="submit" name="misCitas" value="Mis Citas"></form></td></tr>';
            }
            echo '</table>';
        } else {
            echo "No Existen sedes de ITV para esta provincia";
        }
        ?>
    </div>
    <input type="hidden" value=". $value['localidad'] ." name="localidad">
    <input type="hidden" value=". $value['localidad'] ." name="direccion">
</body>