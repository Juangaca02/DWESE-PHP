<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
$a = array(
                1 => array("Clase" => "Contabilidad", "Nombre" => "Antonio", "Apellidos" => "Chacon", "Salario" => 1200, "Edad" => 18),
                2 => array("Clase" => "Marketing", "Nombre" => "Chema", "Apellidos" => "Caballero", "Salario" => 1500, "Edad" => 19),
                3 => array("Clase" => "Ventas", "Nombre" => "Juan", "Apellidos" => "Garcia", "Salario" => 1800, "Edad" => 20),
                4 => array("Clase" => "Informatica", "Nombre" => "Pino", "Apellidos" => "Pino", "Salario" => 2000, "Edad" => 21),
                5 => array("Clase" => "Direccion", "Nombre" => "Aguayo", "Apellidos" => "Aguayo", "Salario" => 2200, "Edad" => 22));
            echo '<tr><th>Tabla</th><th>Nombre</th><th>Apellidos</th><th>Salaraio</th><th>Edad</th></tr>';
            foreach ($a as $ind=> $fila) {
                echo "<tr>" . $ind . "</tr>";
                foreach ($fila as $v => $valor) {
                    echo("<td>" . $valor . "</td>");
                }
            }


-->
<html>
    <head>
        <style>
        </style>
    </head>
    <body>
        <table border="1">
            <?php
            $a = array(
                "Contabilidad" => array("Nombre" => "Antonio", "Apellidos" => "Chacon", "Salario" => 1200, "Edad" => 18),
                "Marketing" => array("Nombre" => "Chema", "Apellidos" => "Caballero", "Salario" => 1500, "Edad" => 19),
                "Ventas" => array("Nombre" => "Juan", "Apellidos" => "Garcia", "Salario" => 1800, "Edad" => 20),
                "Informatica" => array("Nombre" => "Pino", "Apellidos" => "Pino", "Salario" => 2000, "Edad" => 21),
                "Direccion" => array("Nombre" => "Aguayo", "Apellidos" => "Aguayo", "Salario" => 2200, "Edad" => 22));
            echo '<tr><td>Tabla</td>';
            foreach ($a["Contabilidad"] as $ind => $valor) {
                echo("<td>" . $ind . "</td>");
            }
            echo '</tr>';

            foreach ($a as $ind => $fila) {
                echo "<tr><th>" . $ind . "</th>";
                foreach ($fila as $valor) {
                    echo("<td>" . $valor . "</td>");
                }
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>

