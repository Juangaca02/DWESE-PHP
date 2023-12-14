<?php
if (isset($_POST["volver"])) {
    header("Location:index.php");
}
if (isset($_POST["enviar"])) {
    require_once '../Controller/ClienteController.php';
    $cliente = ClienteController::buscarCliente($_POST["dni"], $_POST["clave"]);
    if ($cliente === false)
        echo "Error en la base de datos";
    if ($cliente === null)
        echo "El usuario no existe en la base de datos o contraseña incorrecta";
    if ($cliente) {
        session_start();
        $_SESSION["usuario"] = $cliente;
        header("Location:index.php");
    }
}
?>
<form action="" method="post">
    Dni: <input type="text" name="dni"><br>
    Clave: <input type="text" name="clave"><br>
    <input type="submit" name="volver" value="Volver">
    <input type="submit" name="enviar" value="Enviar">
</form>