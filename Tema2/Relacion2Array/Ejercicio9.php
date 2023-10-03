<!DOCTYPE html>
<html>
    <head>
        <style>
        </style>
    </head>
    <body>
        <table border="1">
            <?php
            $estadio_de_futbol = array(
                "Barcelona" => "Camp Nou",
                "Real Madrid" => "Santiago Bernabeu",
                "Valencia" => "Mestalla",
                "Real Sociedad" => "Anoeta");

            foreach ($estadio_de_futbol as $ind => $valor) {
                echo "<tr><th>" . $ind . "</th><td>" . $valor . "</td></tr>";
            }
            
            echo '<td>------------------</td><td>------------------</td>';
            array_splice($estadio_de_futbol, 1,1);
            foreach ($estadio_de_futbol as $ind => $valor) {
                echo "<li>" . $ind . "</li><li>" . $valor . "</li>";
            }
            
            
            ?>
        </table>
    </body>
</html>










