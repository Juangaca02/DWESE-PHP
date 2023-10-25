<html>
    <head>
        <meta charset="UTF8">
    </head>
    <body>
        <?php
        $nom = $dni2 = $dorsal2 = $posición2 = $equipo2 = $goles2 = true;
        if (isset($_POST['insertar'])) {
            if (preg_match('/^[a-zA-Z]{1,30}$/', $_POST['nombre']) === 0) {
                $nom = false;
            }
            if (preg_match('/^\d{7}[A-Z]{1}$/', $_POST['dni']) === 0) {
                $dni2 = false;
            }

            if (preg_match('/^\d{1,2}$/', $_POST['dorsal']) === 0) {
                $dorsal2 = false;
            } else {
                if ($_POST['dorsal'] < 0 && $_POST['dorsal'] > 11) {
                    $dorsal2 = false;
                }
            }
        }
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
                <option value="portero">Portero</option><br>
                <option value="defensa">Defensa</option><br>
                <option value="centrocampista">Centrocampista</option><br>
                <option value="delantero">Delantero</option><br>
            </select>
            <?php
            if (isset($_POST['posición']) && $posición2 == false) {
                echo "Posicion Incorecto";
            }
            ?><br>

            <input type="submit" name="insertar" value="Insertar" ><br>
            <!--(Campo de texto). No puede estar vacío. Sólo letras.-->
            <!--(Campo de texto). Debe tener 8 números y una letra al final.-->
            <!--Campo desplegable con los números 1 al 11.-->
            Posición: <!--Campo múltiple (Portero, defensa, centrocampista, delantero). Puede tener varias.-->
            Equipo: <!--(Campo de texto). No puede estar vacío.-->
            Número de goles: <!-- (Campo de texto). No puede estar vacio. Sólo números. -->


        </form>
    </body>
</html>
