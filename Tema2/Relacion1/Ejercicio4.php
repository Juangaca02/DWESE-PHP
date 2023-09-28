<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table border="1">
            <?php
            $numero = 1;
            for ($fila = 1; $fila <= 5; $fila++) {
                echo '<tr>';
                for ($columna = 1; $columna <= 7; $columna++) {
                    echo '<td>' . $numero . '</td>';
                    $numero++;
                }
                echo '</tr>';
            }
            ?>
        </table>
    </body>
</html>
