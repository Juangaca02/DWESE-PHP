<html>

<head>
    <meta charset="UTF8">
</head>

<body>
    <?php
    try {
        $conex = new PDO("mysql:host=localhost;dbname=autobuses;charset=utf8mb4", "dwes", "abc123.");
        $result1 = $conex->query("SELECT distint origen from viajes");
        $result2 = $conex->query("SELECT distint destino from viajes");
    } catch (Exception $ex) {
        die($ex->getMessage());
    }
    ?>
    <h1>Jugador</h1>
    <form action="" method="POST">
        Fecha: <input type="date" name="fecha" value="fechas"><br>
        Origen: <select name="origen">
            <?php
            while ($reg = $result->fetch(PDO::FETCH_OBJ)) {
                echo '<option value = "' . $reg->Matricula . '"';
                if (isset($_POST['consultar']) && $_POST['origen'] == $reg->Matricula) {
                    echo ' selected';
                }
                echo '>' . $reg->Origen . '</option>';
            }
            ?>
        </select>
        Destino: <select name="destino">
            <?php
            try {
                $result = $conex->query("Select * from viajes where Origen = '$_POST[origen]';");
            } catch (Exception $ex) {
                die($ex->getMessage());
            }

            while ($reg = $result->fetch(PDO::FETCH_OBJ)) {
                echo '<option value = "' . $reg->Matricula . '"';
                if (isset($_POST['consultar']) && $_POST['destino'] == $reg->Matricula) {
                    echo ' selected';
                }
                echo '>' . $reg->Destino . '</option>';
            }
            ?>
        </select>
        <input type="submit" name="consultar" value="Consultar"><br><br>
        <a href="index.php">Volver al Menu</a>
    </form>
    <?php

    if (isset($_POST['consultar'])) {
        $result = $conex->query("SELECT * from viajes where Fecha='$_POST[fecha]' and Fecha='$_POST[fecha]' abd Fecha='$_POST[fecha]'");
        if ($result->rowCount()) {
            echo "Fecha: $_POST[fecha] <br>";
            echo "Origen: $_POST[origen] <br>";
            echo "Destino: $_POST[destino] <br>";
            echo "Plazas Libres: $_POST[destino] <br>";
        }
    }







    ?>
</body>

</html>