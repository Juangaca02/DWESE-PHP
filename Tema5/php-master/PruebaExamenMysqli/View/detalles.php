<?php
require_once '../Model/Cliente.php';
require_once '../Controller/JuegoController.php';
session_start();
if (isset($_POST["alquilar"])) {
    require_once '../Controller/AlquilerController.php';
    $alquiler = new Alquiler("", $_POST["cod"], $_SESSION["usuario"]->dni, date("Y-m-d"), null);
    AlquilerController::insertarAlquiler($alquiler);
    JuegoController::alquilarJuego($_POST["cod"]);
    $_SESSION["mensaje"] = "Juego alquilado con exto";
    header("Location:index.php");
}

?>
<img src="<?php echo "$_GET[imagen]"; ?>" width="500px" height="500px" /><br>
<?php
require_once "../Controller/JuegoController.php";
$juego = JuegoController::dameUnJuego($_GET["codigo"]);
if ($juego) {
    echo "Nombre: $juego->nombreJuego Nombre Consola: $juego->nombreConsola Año: $juego->anno Precio: $juego->precio Alquilado: $juego->alquilado Descripcion: $juego->descripcion<br>";
} else {
    echo "Fallo en la base de datos";
}
?>
<form action="" method="post">
    <input type="hidden" name="cod" value="<?php echo $juego->codigo; ?>" />
    <input type="submit" name="alquilar" value="Alquilar" <?php if ($juego->alquilado == "SI" || !isset($_SESSION["usuario"]))
        echo "disabled"; ?>>
</form>
<a href="index.php"><button>Vovler</button></a>