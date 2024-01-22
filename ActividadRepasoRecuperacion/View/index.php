<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<?php

// if (!isset($_SESSION['usuario'])) {
//     header('Location:inicio_cliente.php');
// }


if (isset($_POST["entrar"])) {
    require_once '../Controller/ControllerUsuarios.php';
    if ((ControllerUsuarios::getBloqueado($_POST["dni"])) == false) {
        echo "Cuenta bloqueada<br>Solicite su desbloqueamiento al Admin";
    } else {
        $usuarioDni = ControllerUsuarios::usuarioForCuentas($_POST["dni"]);
        if ($usuarioDni === false)
            echo "Error en la base de datos1";
        if ($usuarioDni === null)
            echo "El usuario no existe en la base de datos";
        if ($usuarioDni) {
            $usuario = ControllerUsuarios::getUsuariosByDniAndPass($_POST["dni"], md5($_POST["clave"]));
            if ($usuario === false)
                echo "Error en la base de datos2";
            if ($usuario === null) {
                ControllerUsuarios::updateIntentos($_POST["dni"]);
            }
            if ($usuario) {
                ControllerUsuarios::updateIntentosCorrecto($_POST["dni"]);
                session_start();
                $_SESSION["usuario"] = $usuario;
                header("Location:inicio_cliente.php");
            }
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