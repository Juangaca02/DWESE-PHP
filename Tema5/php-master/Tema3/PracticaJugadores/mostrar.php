<<<<<<< HEAD <a href="index.php">Menu</a>
    <h1>Mostrar</h1>
    <?php
    require_once "funciones.php";
    $conex = crearConexion();
    try {
        $result = $conex->query("select * from jugador");
        while ($fila = $result->fetch_object()) {
            mostrarJugador($fila);
        }
    } catch (Exception $ex) {
        die($ex->getMessage());
    }

    $conex->close();

    ?>