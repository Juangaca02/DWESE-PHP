<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once "funciones.php";
    if (isset($_POST['guardar'])) {
        $nombreval = $dnival = $equipoval = $golesval = $poscval = $general = true;
        if (preg_match('/^[A-Za-z]{1,30}$/', $_POST['nombre']) === 0) {
            $nombreval = false;
            $general = false;
        }
        if (preg_match('/^[1-9]{8}[A-Z]$/i', $_POST['dni']) === 0) {
            $dnival = false;
            $general = false;
        }
        if (empty($_POST['equipo'])) {
            $equipoval = false;
            $general = false;
        }
        if (!preg_match('/^[0-9]+$/', $_POST['goles'])) {
            $golesval = false;
            $general = false;
        }
        if (empty($_POST['posicion'])) {
            $poscval = false;
            $general = false;
        }

        if ($general) {
            $conex = crearConexion();
            $pos = 0;
            foreach ($_POST['posicion'] as $value) {
                $pos += $value;
            }
            try {
                $conex->query("INSERT INTO jugador(dni, nombre, dorsal, posicion, equipo, goles) VALUES ('$_POST[dni]', '$_POST[nombre]', $_POST[dorsal], $pos, '$_POST[equipo]', $_POST[goles])");
                echo "insercion correcta<br>";
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
            $conex->close();
        }

    }
    ?>
    <a href="index.php">Menu</a>
    <h1>Jugador</h1>
    <form action="" method="post">
        DNI: <input type="text" name='dni' value="<?php if (isset($_POST['guardar']))
            echo $_POST['dni'] ?>">
        <?php if (isset($_POST['guardar']) && $dnival == false)
            echo "Fallo en el dni" ?>
            <br>
            Nombre: <input type="text" name='nombre' value="<?php if (isset($_POST['guardar']))
            echo $_POST['nombre'] ?>">
        <?php if (isset($_POST['guardar']) && $nombreval == false)
            echo "Fallo en el nombre" ?>
            <br>
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
        if (isset($_POST['guardar']) && !empty($_POST['posicion'][0])) {
            //var_dump($_POST['posicion']);
            $crearSelec = $_POST['posicion'];
        } else {
            $crearSelec = [0];
        }
        crearSelectPosicion($crearSelec);
        ?>
        <?php if (isset($_POST['guardar']) && $poscval == false)
            echo "Tienes que elegir una posición" ?>
            <br>
            Equipo: <input type="text" name='equipo' value="<?php if (isset($_POST['guardar']))
            echo $_POST['equipo'] ?>">
        <?php if (isset($_POST['guardar']) && $equipoval == false)
            echo "Fallo en el equipo" ?>
            <br>
            Goles: <input type="number" name='goles' value="<?php if (isset($_POST['guardar']))
            echo $_POST['goles'] ?>">
        <?php if (isset($_POST['guardar']) && $golesval == false)
            echo "Fallo en los goles" ?>
            <br>
            <input type="submit" name="guardar" value="Guardar">
        </form>
    </body>

=======
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once "funciones.php";
    if (isset($_POST['guardar'])) {
        $nombreval = $dnival = $equipoval = $golesval = $poscval = $general = true;
        if (preg_match('/^[A-Za-z]{1,30}$/', $_POST['nombre']) === 0) {
            $nombreval = false;
            $general = false;
        }
        if (preg_match('/^[1-9]{8}[A-Z]$/i', $_POST['dni']) === 0) {
            $dnival = false;
            $general = false;
        }
        if (empty($_POST['equipo'])) {
            $equipoval = false;
            $general = false;
        }
        if (!preg_match('/^[0-9]+$/', $_POST['goles'])) {
            $golesval = false;
            $general = false;
        }
        if (empty($_POST['posicion'])) {
            $poscval = false;
            $general = false;
        }

        if ($general) {
            $conex = crearConexion();
            $pos = 0;
            foreach ($_POST['posicion'] as $value) {
                $pos += $value;
            }
            try {
                $conex->query("INSERT INTO jugador(dni, nombre, dorsal, posicion, equipo, goles) VALUES ('$_POST[dni]', '$_POST[nombre]', $_POST[dorsal], $pos, '$_POST[equipo]', $_POST[goles])");
                echo "insercion correcta<br>";
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
            $conex->close();
        }

    }
    ?>
    <a href="index.php">Menu</a>
    <h1>Jugador</h1>
    <form action="" method="post">
        DNI: <input type="text" name='dni' value="<?php if (isset($_POST['guardar']))
            echo $_POST['dni'] ?>">
        <?php if (isset($_POST['guardar']) && $dnival == false)
            echo "Fallo en el dni" ?>
            <br>
            Nombre: <input type="text" name='nombre' value="<?php if (isset($_POST['guardar']))
            echo $_POST['nombre'] ?>">
        <?php if (isset($_POST['guardar']) && $nombreval == false)
            echo "Fallo en el nombre" ?>
            <br>
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
        if (isset($_POST['guardar']) && !empty($_POST['posicion'][0])) {
            //var_dump($_POST['posicion']);
            $crearSelec = $_POST['posicion'];
        } else {
            $crearSelec = [0];
        }
        crearSelectPosicion($crearSelec);
        ?>
        <?php if (isset($_POST['guardar']) && $poscval == false)
            echo "Tienes que elegir una posición" ?>
            <br>
            Equipo: <input type="text" name='equipo' value="<?php if (isset($_POST['guardar']))
            echo $_POST['equipo'] ?>">
        <?php if (isset($_POST['guardar']) && $equipoval == false)
            echo "Fallo en el equipo" ?>
            <br>
            Goles: <input type="number" name='goles' value="<?php if (isset($_POST['guardar']))
            echo $_POST['goles'] ?>">
        <?php if (isset($_POST['guardar']) && $golesval == false)
            echo "Fallo en los goles" ?>
            <br>
            <input type="submit" name="guardar" value="Guardar">
        </form>
    </body>

>>>>>>> f94b01f6267d3c5706f2f6cd382322f8042ce4c4
    </html>