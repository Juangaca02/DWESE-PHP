<<<<<<< HEAD
<a href="index.php">Menu</a>
<h1>Borrar</h1>
<?php
require_once "funciones.php";
if (isset($_POST['borrar'])) {
    $conex = crearConexion();
    try {
        $conex->query("delete from jugador where '$_POST[dni]' = dni");
        echo "Borrado realizado";
    } catch (Exception $ex) {
        echo "fallo en el borrado";
        die($ex->getMessage());
    }
    $conex->close();
}
?>
<form action="" method="post">
    <input type="text" name="dni">
    <input type="submit" name="borrar" value="borrar">
=======
<a href="index.php">Menu</a>
<h1>Borrar</h1>
<?php
require_once "funciones.php";
if (isset($_POST['borrar'])) {
    $conex = crearConexion();
    try {
        $conex->query("delete from jugador where '$_POST[dni]' = dni");
        echo "Borrado realizado";
    } catch (Exception $ex) {
        echo "fallo en el borrado";
        die($ex->getMessage());
    }
    $conex->close();
}
?>
<form action="" method="post">
    <input type="text" name="dni">
    <input type="submit" name="borrar" value="borrar">
>>>>>>> f94b01f6267d3c5706f2f6cd382322f8042ce4c4
</form>