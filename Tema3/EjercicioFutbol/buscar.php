<a href="index.php">Menu</a>
<h1>Buscar</h1>
<form action="" method="post">
    <select name="parametro">
        <option value="dni" <?php if (isset($_POST["enviar"]) && $_POST["parametro"] == "dni")
            echo "selected" ?>>DNI
            </option>
            <option value="equipo" <?php if (isset($_POST["enviar"]) && $_POST["parametro"] == "equipo")
            echo "selected" ?>>
                Equipo</option>
            <option value="posicion" <?php if (isset($_POST["enviar"]) && $_POST["parametro"] == "posicion")
            echo "selected" ?>>Posicion</option>
        </select><br>
    <?php if (isset($_POST['enviar'])) {
            echo "Introduce $_POST[parametro] <br>" ?>
        <input type='text' name='buscador' value="<?php if (isset($_POST["buscador"]))
            echo "$_POST[buscador]" ?>">
    <?php } ?>
    <br><input type="submit" name="enviar" value="enviar">
</form>
<?php
if (isset($_POST["buscador"])) {
    require_once "funciones.php";
    $conex = crearConexion();
    if ($_POST["parametro"] == "dni") {
        $result = $conex->query("select * from jugador where dni = '$_POST[buscador]'");
        $fila = $result->fetch_object();
        mostrarJugador($fila);

    }
    if ($_POST["parametro"] == "equipo") {
        $result = $conex->query("select * from jugador where equipo = '$_POST[buscador]'");
        while ($fila = $result->fetch_object()) {
            mostrarJugador($fila);
        }
    }
    if ($_POST["parametro"] == "posicion") {
        $result = $conex->query("select * from jugador where posicion like '%$_POST[buscador]%'");
        while ($fila = $result->fetch_object()) {
            mostrarJugador($fila);
        }
    }
    $conex->close();
}