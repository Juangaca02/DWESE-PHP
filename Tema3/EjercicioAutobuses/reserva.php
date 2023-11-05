<html>

<head>
    <meta charset="UTF8">
</head>

<body>
    <?php
    try {
        $conex = new PDO("mysql:host=localhost;dbname=autobuses;charset=utf8mb4", "dwes", "abc123.");
        $result = $conex->query("Select * from viajes");
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
    ?>
</body>

</html>