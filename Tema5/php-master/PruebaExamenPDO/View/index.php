Bienvenido
<?php
require_once '../Model/Cliente.php';
session_start();
if (isset($_POST["misJuegosAlquilados"]))
    header("Location:misJuegosAlquilados.php");
if (isset($_POST['nuevo']))
    header("Location:nuevoJuego.php");
if (isset($_SESSION["usuario"]))
    echo $_SESSION["usuario"]->nombre;
else
    echo "Persona generica numero 1"; ?>
<br>

<a href="login.php">Login</a>
<a href="register.php">Register</a>
<a href="cerrarSession.php">Cerrar Session</a>

<?php if (isset($_SESSION["mensaje"])) {
    echo $_SESSION["mensaje"];
    unset($_SESSION["mensaje"]);
} ?>

<form action="" method="post">
    <input type="submit" name="todos" value="Todos">
    <input type="submit" name="alquilados" value="Alquilados">
    <input type="submit" name="noAlquilados" value="No Alquilados">
    <input type="submit" name="misJuegosAlquilados" value="Mis Juegos Alquilados">
    <?php
    if (isset($_SESSION["usuario"]) && $_SESSION["usuario"]->tipo == "admin") {
        ?>
        <input type="submit" name="nuevo" value="Nuevo Juego">
        <?php
    }
    ?>
</form>

<?php
if (isset($_POST["todos"])) {
    require_once "../Controller/JuegoController.php";
    $resultado = JuegoController::dameJuegos();
    if ($resultado) {
        while ($fila = $resultado->fetchObject()) {
            echo "<a href='detalles.php?codigo=$fila->Codigo&imagen=$fila->Imagen' target='_blank'><img src='$fila->Imagen' width='50px' height='50px' /></a><br>";
            echo "<p><strong>$fila->Nombre_juego</strong>";
            if (isset($_SESSION["usuario"]) && $_SESSION["usuario"]->tipo == "admin") {
                ?>
                <form action="mod.php" method="post">
                    <input type="hidden" name="cod" value="<?php echo $fila->Codigo; ?>">
                    <input type="submit" name="mod" value="Modificar">
                </form>
                <form action="del.php" method="post">
                    <input type="hidden" name="cod" value="<?php echo $fila->Codigo; ?>">
                    <input type="submit" name="del" value="Borrar">
                </form>
                <?php
            }
        }
    }
    if ($resultado === null)
        echo "No hay juegos";
    if ($resultado === false)
        echo "Fallo en la base de datos";
}
if (isset($_POST["alquilados"])) {
    require_once "../Controller/JuegoController.php";
    $resultado = JuegoController::dameJuegosAlquilados();
    if ($resultado) {
        while ($fila = $resultado->fetchObject()) {
            echo "<a href='detalles.php?codigo=$fila->Codigo&imagen=$fila->Imagen' target='_blank'><img src='$fila->Imagen' width='50px' height='50px'/></a><br>";
            echo "<p><strong>$fila->Nombre_juego</strong>";
            if (isset($_SESSION["usuario"]) && $_SESSION["usuario"]->tipo == "admin") {
                ?>
                <form action="mod.php" method="post">
                    <input type="hidden" name="cod" value="<?php echo $fila->Codigo; ?>">
                    <input type="submit" name="mod" value="Modificar">
                </form>
                <form action="del.php" method="post">
                    <input type="hidden" name="cod" value="<?php echo $fila->Codigo; ?>">
                    <input type="submit" name="del" value="Borrar">
                </form>
                <?php
            }
        }
    }
    if ($resultado === null)
        echo "No hay juegos Alquilados";
    if ($resultado === false)
        echo "Fallo en la base de datos";
}
if (isset($_POST["noAlquilados"])) {
    require_once "../Controller/JuegoController.php";
    $resultado = JuegoController::dameJuegosNOAlquilados();
    if ($resultado) {
        while ($fila = $resultado->fetchObject()) {
            echo "<a href='detalles.php?codigo=$fila->Codigo&imagen=$fila->Imagen' target='_blank'><img src='$fila->Imagen' width='50px' height='50px' /></a><br>";
            echo "<p><strong>$fila->Nombre_juego</strong>";
            if (isset($_SESSION["usuario"]) && $_SESSION["usuario"]->tipo == "admin") {
                ?>
                <form action="mod.php" method="post">
                    <input type="hidden" name="cod" value="<?php echo $fila->Codigo; ?>">
                    <input type="submit" name="mod" value="Modificar">
                </form>
                <form action="del.php" method="post">
                    <input type="hidden" name="cod" value="<?php echo $fila->Codigo; ?>">
                    <input type="submit" name="del" value="Borrar">
                </form>
                <?php
            }
        }
    }
    if ($resultado === null)
        echo "No hay juegos libres";
    if ($resultado === false)
        echo "Fallo en la base de datos";
}
?>