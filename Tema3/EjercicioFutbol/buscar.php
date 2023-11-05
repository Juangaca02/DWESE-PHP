<h1>Buscar</h1>
<?php
require_once "funciones.php";
$conex = crearConexion();
try {
    $result = $conex->query("select * from jugador where '$_POST[]' = ?");
    while ($fila = $result->fetch_object()) {
        mostrarJugador($fila);
    }
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$conex->close();

?>
<a href="index.php">Menu</a>