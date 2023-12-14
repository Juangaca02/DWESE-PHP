<html>
    <head>
        <title>9</title>
    </head>
    <body>
        <?php
            $estadiosDeFutbol = array("Barcelona" => "Camp nou", "Real Madrid" => "Santiago Bernabeu","Valencia" => "Mestalla", "Real Sociedad" => "Anoeta");
            echo "<table border = \"1px\">";
            foreach ($estadiosDeFutbol as $key => $value) {
                echo "<tr><td>$key</td><td>$value</td>";
            }
            echo "</table>";
            
            unset($estadios_de_futbol["Real Madrid"]);
            
            echo "<ol>";
            foreach ($estadiosDeFutbol as $key => $value) {
                echo "<li>$key $value</li>";
            }
            echo "</ol>"
        ?>
    </body>
</html>
