<html>
    <head>
        <meta charset="UTF8">
    </head>
    <body>
        <?php
        $nom = $dni2 = $dorsal2 = $posición2 = $equipo2 = $goles2 = true;
        if (isset($_POST['insertar'])) {
            $errores = 0;
            if (preg_match('/^[a-zA-Z]{1,30}$/', $_POST['nombre']) === 0) {
                $nom = false;
                $errores++;
            }
            if (preg_match('/^\d{7}[A-Z]{1}$/', $_POST['dni']) === 0) {
                $dni2 = false;
                $errores++;
            }

            if (preg_match('/^\d{1,2}$/', $_POST['dorsal']) === 0) {
                $dorsal2 = false;
                $errores++;
            } else {
                if ($_POST['dorsal'] < 0 && $_POST['dorsal'] > 11) {
                    $dorsal2 = false;
                    $errores++;
                }
            }
            if (preg_match('/^.{1,}$/', $_POST['equipo']) === 0) {
                $equipo2 = false;
                $errores++;
            }
            if (preg_match('/^\d{1,}$/', $_POST['goles']) === 0) {
                $goles2 = false;
                $errores++;
            }
        }


        if (isset($_POST['insertar']) && $errores == 0) {
            try {
                $conex = new mysqli('localhost', 'dwes', 'abc123.', 'futbol');
                $conex->set_charset('utf8mb4');
                /*$conex->query("INSERT INTO jugador VALUES ('$_POST[nombre]','$_POST[dni]','$_POST[dorsal]','$_POST[posición]','$_POST[equipo]','$_POST[goles]')");*/
                $conex->query("INSERT INTO  jugador (`Nombre del jugador`, `DNI`, `Dorsal`, `Equipo`, `Número de goles`) VALUES ('$_POST[nombre]','$_POST[dni]','$_POST[dorsal]','$_POST[equipo]','$_POST[goles]')");
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
            echo "Registro insertado correctamente";
            $conex->close();
        } else {
            ?>
            <h1>Jugador</h1>
            <form action="" method="POST">
                Nombre: <input type="text" name="nombre">
                <?php
                if (isset($_POST['nombre']) && $nom == false) {
                    echo "Nombre Incorecto";
                }
                ?><br>
                Dni: <input type="text" name="dni">
                <?php
                if (isset($_POST['dni']) && $dni2 == false) {
                    echo "Dni Incorecto";
                }
                ?><br>
                Dorsal: <input type="text" name="dorsal">
                <?php
                if (isset($_POST['dorsal']) && $dorsal2 == false) {
                    echo "Dorsal Incorecto";
                }
                ?><br>
                Posición:
                <select multiple="" name="posición[]">
                    <option value="portero" selected="true" >Portero</option><br>
                    <option value="defensa">Defensa</option><br>
                    <option value="centrocampista">Centrocampista</option><br>
                    <option value="delantero">Delantero</option><br>
                </select>
                <?php
                if (isset($_POST['posición']) && empty($_POST['posición'])) {
                    echo "Posicion Incorecto,no puede estar vacia";
                }
                ?><br>
                Equipo: <input type="text" name="equipo">
                <?php
                if (isset($_POST['equipo']) && $equipo2 == false) {
                    echo "Equipo Incorecto";
                }
                ?><br>
                Número de goles: <input type="text" name="goles">
                <?php
                if (isset($_POST['goles']) && $goles2 == false) {
                    echo "Goles Incorecto";
                }
                ?><br>

                <input type="submit" name="insertar" value="Insertar" ><br>



            </form>
            <?php
        }
        ?>
    </body>
</html>
