<html>
    <head>
        <title>4</title>
    </head>
    <body>
        <?php
            $persona = array("Nombre" => "Pedro Torres","Direccion" => "C/ Mayor 37", "Telefono" => 123456789);
            
            foreach ($persona as $key => $value) {
                echo "$key : $value<br>";
            }
        ?>
    </body>
</html>