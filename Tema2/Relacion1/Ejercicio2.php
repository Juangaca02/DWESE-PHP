<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 2</title>
        <style>
            table {
                border-collapse: collapse;
            }

            table, th, td {
                border: 1px solid black;
            }

            th, td {
                padding: 10px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <?php
        $a = rand(1, 100);
        $b = 0;
        for ($i = 0; $i < 10; $i++) {
            echo "<tr>";
            for ($j = 0; $j < 10; $j++) {
                $c = $a + (2 * $b);
                echo "<td>" . $a . "</td>";
                $b++; // Siguiente número impar
            }
            echo "</tr>";
        }
        ?>
    </body>
</html>


