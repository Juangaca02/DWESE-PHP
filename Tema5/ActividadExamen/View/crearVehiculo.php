<body>
    <?php
    require_once '../Controller/vehiculoController.php';
    if (isset($_POST["crear"])) {
        if (preg_match('/^\d{4}[A-Z]{3}$/', $_POST['matricula']) === 0) {
            $matricula = false;
        } else {
            $coche = new Vehiculo($_POST['matricula'], $_POST['marca'], $_POST['modelo'], $_POST['color'], $_POST['plazas'], $_POST['fecha']);
            if (vehiculoController::nuevoVehiculo($coche)) {
                session_start();
                $_SESSION['vehiculo'] = $coche;
                header("Location:index.php");
            }
            header("Location:index.php");
        }
    }
    ?>
    <h1>Vehiculo</h1>
    <form action="" method="post">
        Matricula: <input type="text" name="matricula">
        <?php
        if (isset($_POST['matricula']) && $matricula == false) {
            echo "Matricula Con Formato Incorrecto";
        }
        ?><br>
        Marca
        <select name="marca">
            <option value="Seat" select>Seat</option>
            <option value="Renault">Renault</option>
            <option value="Toyota">Toyota</option>
            <option value="Ford">Ford</option>
            <option value="Nissan">Nissan</option>
        </select><br>
        Modelo
        <select name="modelo">
            <option value="Ibiza" select>Ibiza</option>
            <option value="Megane">Megane</option>
            <option value="Yaris">Yaris</option>
            <option value="Kuga">Kuga</option>
            <option value="Qashqai">Qashqai</option>
        </select><br>
        Color
        <select name="color">
            <option value="Blanco" select>Blanco</option>
            <option value="Gris">Gris</option>
            <option value="Negro">Negro</option>
            <option value="Rojo">Rojo</option>
            <option value="Azul">Azul</option>
        </select><br>
        Plazas: <input type="text" name="plazas" required><br>
        Fecha Ultima Revision: <input type="date" name="fecha" required><br>
        <input type="submit" value="Crear" name="crear">
        <input type="submit" value="Volver" name="volver">
    </form>
</body>