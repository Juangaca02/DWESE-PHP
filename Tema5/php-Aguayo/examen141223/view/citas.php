<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <?php
    require_once '../model/Usuario.php';
    require_once '../controller/CitasController.php';
    require_once '../controller/VehiculoController.php';
    session_start();
    if (isset($_SESSION['usuario']) && isset($_SESSION['idItv'])) {
        echo "<h1>Bienvenido Administrador de " . $_SESSION['usuario']->provincia . "</h1>";
        echo "<p>Telefono: " . $_SESSION['usuario']->telefono . "</p>";
        echo "<a href='../controller/CerrarSesion.php'>Cerrar Sesion</a><br>";
        echo "<a href='../view/menu.php'>Volver al menú</a>";

        //traemos las citas de la itv que hemos seleccionado con la id de la itv que hemos seleccionado
        $citas = CitasController::getCitasByLocalidad($_SESSION['idItv']);

        //se comprueba si hay citas
        if ($citas != null) {
            ?>
            <table border='1' style="margin: 0 auto;">
                <tr>
                    <th>Matricula</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Ficha tecnica</th>
                </tr>
                <?php
                foreach ($citas as $cita) {
                    $coche = VehiculoController::getVehiculoByMatricula($cita->matricula);
                    echo "<tr>";
                    echo "<td>$cita->matricula</td>";
                    echo "<td>$coche->marca</td>";
                    echo "<td>$coche->modelo</td>";
                    echo "<td>$cita->fecha</td>";
                    echo "<td>$cita->hora</td>";
                    echo "<td><a href='../view/imagen.php?imagen=$cita->ficha' target='_blank'>Ver ficha tecnica</a></td>";
                    echo "</tr>";
                }
                ?>
            </table>

        <?php
        }
        if ($citas == null) {
            echo "<p>No existen citas para esta sede</p>";
        }
        ?>
        <?php
    } else {
        header("Location: ../view/index.php");
    }
    ?>
</body>

</html>