<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<?php
if (isset($_POST["entrar"])) {
    require_once '../Controller/ControllerUsuarios.php';
    $usuario = ControllerUsuarios::getUsuariosByDni($_POST["dni"]);
    if ($usuario === false)
        echo "Error en la base de datos";
    if ($usuario === null)
        echo "El usuario no existe en la base de datos";
    if ($usuario) {
        $usuario = ControllerUsuarios::getUsuariosByDniAndPass($_POST["dni"], md5($$_POST["clave"]));
        if ($usuario === false)
            echo "Error en la base de datos";
        if ($usuario === null) {
            $usuario = ControllerUsuarios::updateIntentos($_POST["dni"]);
            echo "Clave incorrecta";
        }




    }
}
?>

<body>
    <h1>Login</h1>
    <form action="" method="post">
        <input type="text" name="dni" placeholder="Dni"><br>
        <input type="text" name="clave" placeholder="Contraseña"><br><br>
        <input type="submit" name="entrar" value="Entrar">
    </form>
</body>

</html>