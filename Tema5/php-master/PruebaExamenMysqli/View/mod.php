<?php
require_once "../Controller/JuegoController.php";
if (isset($_POST["modificar"])) {
    JuegoController::modificarUnJuego(new Juego($_POST["cod"], $_POST["nombre"], $_POST["consola"], $_POST["fecha"], $_POST["precio"], $_POST["alquilado"], "", $_POST["descipcion"]));
    session_start();
    $_SESSION['mensaje'] = 'Se ha modificado el juego correctamente';
    header("Location:index.php");
}
if (!isset($_POST["mod"]))
    header("Location:index.php");
$juego = JuegoController::dameUnJuego($_POST["cod"]);
?>
<img src="<?php echo $juego->imagen; ?>" width="500px" height="500px" /><br>
<form action="" method="post">
    <input type="hidden" name="cod" value="<?php echo $juego->codigo ?>">
    Nombre del juego <input type="text" name="nombre" value="<?php echo $juego->nombreJuego ?>"><br>
    Consola Consola: <select name="consola">
        <option value="ps4" <?php if ($juego->nombreConsola == "ps4")
            echo "selected" ?>>PlayStation 4</option>
            <option value="xbox" <?php if ($juego->nombreConsola == "xbox")
            echo "selected" ?>>Xbox One</option>
            <option value="nintendo" <?php if ($juego->nombreConsola == "nintendo")
            echo "selected" ?>>Nintendo Switch
            </option>
        </select><br>
        Año <input type="text" name="fecha" value="<?php echo $juego->anno ?>"><br>
    Precio <input type="number" name="precio" value="<?php echo $juego->precio ?>"><br>
    Alquilado <select name="alquilado">
        <option value="SI" <?php if ($juego->alquilado == "SI")
            echo "selected" ?>>Si</option>
            <option value="NO" <?php if ($juego->alquilado == "NO")
            echo "selected" ?>>No</option>
        </select><br>
        Descripcion <input type="text" name="descipcion" value="<?php echo $juego->descripcion ?>"><br>
    <input type="submit" name="modificar" value="Modificar">
</form>

<a href=" index.php">Volver</a>