<html>
    <head>
        <meta charset="UTF8">
    </head>
    <body>
        <h1>Jugador</h1>
        <form action="" method="POST">
            Nombre: <input type="text" name="nombre">

            <select multiple="" name="posición[]">
                <option value="portero">Portero</option><br>
                <option value="defensa">Defensa</option><br>
                <option value="centrocampista">Centrocampista</option><br>
                <option value="delantero">Delantero</option><br>
            </select>


            <input type="submit" name="insertar" value="Insertar" ><br>

           
            <?php 
            
            
            
            try {
                
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
                        
            ?>

        </form>
    </body>
</html>