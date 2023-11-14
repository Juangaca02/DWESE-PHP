<html>

<head>
    <meta charset="UTF8">
</head>

<body>
    <?php
    require_once("funciones.php");
    $conex = crearConexion();
    if (isset($_POST['enviar'])) {
        try {
            $result = $conex->query("SELECT * from autos where matricula = '$_POST[matricula]'");
            $row = $result->fetchObject();
            if (($row->Num_plazas >= $_POST["plazas"])) {
                $conex->exec("INSERT into viajes values ('$_POST[date]', '$_POST[matricula]', '$_POST[origen]', '$_POST[destino]', $_POST[plazas])");
                echo "Viaje insertado";
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    ?>

    <h1>Añadir Autobus</h1>
    <form action="" method="post">
        Fecha: <input type="date" name="date"><br>
        <?php
        echo "<br>Matrícula";
        try {
            $res = $conex->query("SELECT matricula from autos");
            echo "<select name='matricula'>";
            while ($row = $res->fetchObject()) {
                echo "<option value='$row->matricula'>$row->matricula</option>";
            }
            echo "</select>";
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        echo "<br><br>";
        ?> Origen:<input type="text" name="origen">
        <?php
        echo "<br><br>";
        ?> Destino:<input type="text" name="destino">
        <?php
        echo "<br><br>";
        ?> Nº de plazas<input type="number" name="plazas">
        <?php if (isset($_POST['enviar'])) {
            $result = $conex->query("SELECT num_plazas from autos where matricula = '$_POST[matricula]'");
            $row = $result->fetchObject();
            if (isset($_POST['enviar']) && !($row->num_plazas >= $_POST['plazas'])) {
                echo "El numero de plazas es mayor al posible";
            }
        }
        ?>
        <input type="submit" name="enviar" value="enviar"><br>
        <a href="index.php">Volver</a>
    </form>
</body>

</html>