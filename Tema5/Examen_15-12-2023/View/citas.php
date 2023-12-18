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
require_once '../Controller/citasController.php';
session_start();

if (isset($_SESSION['usuario'])) {
    echo "Hola Administrador de : " . $_SESSION['usuario']->provincia;
    echo "<br>Telefono : " . $_SESSION['usuario']->telefono;
    echo "<br><a href='cerrar.php'>Cerrar Sesion</a><br><a href='menu.php'>Volver</a> <h1>Vehiculo con cita en la ITV de " . $_SESSION['usuario']->provincia . "</h1>";

}

?>

<body>
    <div>
        <form action="" method="post">
            <?php
            if ($tabla) {
                echo '<table border="1"><tr><td>Localidad</td><td>DIreccion</td><td>Citas</td></tr>';
                foreach ($provinciaResultado as $value) {
                    echo '<tr>
                <td>' . $value['localidad'] . '</td>
                <td>' . $value['direccion'] . '</td>
                <td><input type="submit" name="misCitas" value="Mis Citas"></td></tr>';
                }
                echo '</table>';
            } else {
                echo "No Existen sedes de ITV para esta provincia";
            }
            ?>
        </form>
    </div>
</body>