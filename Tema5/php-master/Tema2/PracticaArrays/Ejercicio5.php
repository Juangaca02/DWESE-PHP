<html>
    <head>
        <title>5</title>
    </head>
    <body>
        <?php
            $persona = array("Persona1" => array("Nombre" => "Pedro Torres","Direccion" => "C/ Mayor 37", "Telefono" => 123456789),
                       "Persona2" => array("Nombre" => "Pedrillo Torrecilla","Direccion" => "C/ Mayor 37", "Telefono" => 123456789),
                       "Persona3" => array("Nombre" => "Pedrito Torreta","Direccion" => "C/ Mayor 37", "Telefono" => 123456789));
            
                   foreach ($persona as $key1 => $personaIndividual) {
                       echo "$key1<br>";
                       foreach ($personaIndividual as $key2 => $value) {
                           echo "$key2 : $value <br>";
                       }
                       
                   }
        ?>
    </body>
</html>
