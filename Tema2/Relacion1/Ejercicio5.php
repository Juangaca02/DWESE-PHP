<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 5</title>
    </head>
    <body>
        <table border="1">
            <?php
            $fila = 1;
            $numero = 0;
            while ($fila <= 5) {
                echo '<tr>';
                $columna = 1;

                while ($columna <= 7) {
                    echo '<td>';
                    $numero = $numero + 1;
                    echo $numero;
                    echo '</td>';
                    $columna++;
                }

                echo '</tr>';
                $fila++;
            }
            ?>
        </table>
        <table border="1">
            <?php
            $fila = 1;
            $numero = 0;
            do {
                echo '<tr>';
                $columna = 1;
                do {
                    $numero = $numero + 1;
                    echo '<td>' . $numero . '</td>';
                    $columna++;
                } while ($columna <= 7);

                echo '</tr>';
                $fila++;
            } while ($fila <= 5);
            ?>
        </table>
    </body>
</html>
