<?php
require_once '../Model/Cliente.php';
session_start();
if (isset($_SESSION["usuario"]) && $_SESSION["usuario"]->tipo == "admin") {
    if (isset($_POST["nuevo"])) {
        if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
            require_once '../Controller/JuegoController.php';
            $codigo = JuegoController::obtenerCodigo($_POST["nombre"], $_POST["consola"]);
            $fich = time() . "-" . $_FILES['foto']['name'];
            $ruta = "../fotos/$fich";
            move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);
            $juego = new Juego($codigo, $_POST["nombre"], $_POST["consola"], $_POST["anno"], $_POST["precio"], "NO", $ruta, $_POST["desc"]);
            if (JuegoController::insertarJuego($juego) === false)
                echo "Error al insertar el juego";
            else
                header("Location:index.php");
        }
    }
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        Nombre: <input type="text" name="nombre"><br>
        Consola: <select name="consola">
            <option value="ps4">PlayStation 4</option>
            <option value="xbox">Xbox One</option>
            <option value="nintendo">Nintendo Switch</option>
        </select><br>
        Año <input type="date" name="anno"><br>
        Precio: <input type="number" name="precio"><br>
        Descipción: <input type="text" name="desc"><br>
        Foto: <input type="file" name="foto"><br>
        <input type="submit" name="nuevo" value="Crear juego">
    </form>
    <?php
} else
    header("Location:index.php");
?>