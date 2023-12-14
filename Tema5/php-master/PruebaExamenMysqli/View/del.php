<?php
require_once "../Controller/JuegoController.php";
if (isset($_POST["borrar"])) {
    JuegoController::borrarJuego($_POST["codigo"]);
    session_start();
    $_SESSION['mensaje'] = 'Se ha eliminado el juego correctamente';
    header("Location:index.php");
}
if (!isset($_POST["cod"]))
    header("Location:index.php");
$juego = JuegoController::dameUnJuego($_POST["cod"]);
?>
<img src="<?php echo $juego->imagen; ?>" width="500px" height="500px" /><br>
<?php
echo "Nombre: $juego->nombreJuego Nombre Consola: $juego->nombreConsola Año: $juego->anno Precio: $juego->precio Alquilado: $juego->alquilado Descripcion: $juego->descripcion<br>";
?>
<form action="" method="post">
    <input type="hidden" name="codigo" value="<?php echo $juego->codigo ?>" />
    <input type="submit" name="borrar" value="Borrar juego">
</form>
<a href="index.php">Volver</a>