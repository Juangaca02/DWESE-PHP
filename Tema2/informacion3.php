<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <style>
        </style>
    </head>
    <body>
        <table border="1">
            <?php
            echo '<tr><th>Indice</th><th>Valor</th></tr>';
            foreach ($_SERVER as $c => $fila) {
                echo "<tr><td>" . $c . "</td><td>" . $fila . "</td></tr>";
            }
            ?>
        </table>
    </body>
</html>

