<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
1-Dado un año, indicar si es bisiesto o no.
Para determinar si un año es bisiesto, siga estos pasos:
a) Si el año es uniformemente divisible por 4, vaya al paso b. De lo contrario,vaya al paso e.
b) Si el año es uniformemente divisible por 100, vaya al paso c. De lo contrario, vaya al paso d.
c) Si el año es uniformemente divisible por 400, vaya al paso d. De lo contrario, vaya al paso e.
d) El año es un año bisiesto (tiene 366 días).
e) El año no es un año bisiesto (tiene 365 días).
-->
<html>
<head>
    <style>
    </style>
</head>
<body>
    <table border="1" > 
        <?php
        // Generar un número impar al azar
        $numeroInicial = rand(1, 100);
        if ($numeroInicial % 2 == 0) {
            $numeroInicial++; // Asegurarse de que sea impar
        }

        // Crear la tabla de 10x10
        for ($i = 0; $i < 10; $i++) {
            echo "<tr>";
            for ($j = 0; $j < 10; $j++) {
                echo "<td>" . $numeroInicial . "</td>";
                $numeroInicial += 2; // Siguiente número impar
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>

