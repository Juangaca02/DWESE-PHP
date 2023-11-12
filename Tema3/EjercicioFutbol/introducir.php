<html>

<head>
    <meta charset="UTF8">
</head>

<body>
    <?php
    require_once "funciones.php";
    $nom = $dni2 = $dorsal2 = $posición2 = $equipo2 = $goles2 = $errores = true;
    if (isset($_POST['insertar'])) {

        if (preg_match('/^[a-zA-Z]{1,30}$/', $_POST['nombre']) === 0) {
            $nom = false;
            $errores = false;
        }
        if (preg_match('/^\d{8}[A-Z]{1}$/', $_POST['dni']) === 0) {
            $dni2 = false;
            $errores = false;
        }

        if (preg_match('/^\d{1,2}$/', $_POST['dorsal']) === 0) {
            $dorsal2 = false;
            $errores = false;
        } else {
            if ($_POST['dorsal'] < 0 && $_POST['dorsal'] > 11) {
                $dorsal2 = false;
                $errores = false;
            }
        }
        if (empty($_POST['posicion'])) {
            $posición2 = false;
            $errores = false;
        }
        if (preg_match('/^.{1,}$/', $_POST['equipo']) === 0) {
            $equipo2 = false;
            $errores = false;
        }
        if (preg_match('/^\d{1,}$/', $_POST['goles']) === 0) {
            $goles2 = false;
            $errores = false;
        }
        if (empty($_POST['posicion'])) {
            $poscval = false;
            $general = false;
        }

        if (!$errores == false) {
            //echo var_dump($_POST);
            $conex = crearConexion();
            $pos = 0;
            foreach ($_POST['posicion'] as $value) {
                $pos += $value;
            }
            try {
                $conex->query("INSERT INTO  jugador (`NombreJugador`, `DNI`, `Dorsal`,`Posición`, `Equipo`, `NumeroGoles`) VALUES ('$_POST[nombre]','$_POST[dni]',$_POST[dorsal],$pos,'$_POST[equipo]',$_POST[goles])");
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
            echo "Registro insertado correctamente";
            $conex->close();
        }
    }

    ?>
    <h1>Jugador</h1>
    <form action="" method="POST">

        Nombre: <input type="text" name="nombre" value="<?php if (isset($_POST['nombre']))
            echo $_POST['nombre'] ?>">
        <?php if (isset($_POST['nombre']) && $nom == false) {
            echo "Nombre Incorecto";
        }
        ?><br>

        Dni: <input type="text" name="dni" value="<?php if (isset($_POST['dni']))
            echo $_POST['dni'] ?>">
        <?php if (isset($_POST['dni']) && $dni2 == false) {
            echo "Dni Incorecto";
        }
        ?><br>

        Dorsal:
        <?php
        echo "<select name='dorsal'>";
        for ($i = 1; $i < 12; $i++) {
            echo "<option value=$i" . ($i == $_POST['dorsal'] ? " selected" : "") . ">$i</option>";
        }
        echo "</select>";
        ?><br>

        Posición<br>
        <?php
        if (isset($_POST['insertar']) && !empty($_POST['posicion'][0])) {
            $crearSelec = $_POST['posicion'];
        } else {
            $crearSelec = [0];
        }
        crearSelectPosicion($crearSelec);
        ?>
        <?php if (isset($_POST['insertar']) && $posición2 == false)
            echo "Posicion Incorecta, no puede estar vacia"; ?>
        <br>

        Equipo: <input type="text" name="equipo" value="<?php if (isset($_POST['insertar']))
            echo $_POST['equipo'] ?>">
            <?php
        if (isset($_POST['equipo']) && $equipo2 == false) {
            echo "Equipo Incorecto";
        }
        ?><br>

        Número de goles: <input type="text" name="goles" value="<?php if (isset($_POST['insertar']))
            echo $_POST['goles'] ?>">
            <?php
        if (isset($_POST['goles']) && $goles2 == false) {
            echo "Goles Incorecto";
        }
        ?><br>

        <input type="submit" name="insertar" value="Insertar"><br><br>
        <a href="index.php">Volver al Menu</a>
    </form>
    <?php
    ?>
</body>

</html>