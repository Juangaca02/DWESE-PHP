<html>
    <head>
        <title>3</title>
    </head>
    <body>
        <?php
            $peliculas = array("Enero" => 9,"febrero" => 12, "Marzo" => 0, "Abril" => 17);
            
            foreach ($peliculas as $key => $value) {
                if ($value > 0) {
                    echo "En el mes de $key se han visto $value peliculas<br>";
                }
                
            }
        ?>
    </body>
</html>