<style>
    body {
        text-align: center;
    }
</style>
<?php
session_start();
require_once '../Controller/usuarioController.php';

$incorrecto = false;
if (isset($_COOKIE['sesionCerrada'])) {
    session_unset();
    setcookie("sesionCerrada", 0, time() - 1, "/");
    session_destroy();
    echo 'Sesion Cerrada';
}
if (isset($_POST['acceder'])) {
    $usuario = usuarioController::comprobarUsuario($_POST['usuario'], $_POST['clave']);

    if ($usuario != null) {
        session_start();
        $_SESSION['usuario'] = $usuario;
        header("Location:menu.php");
    } else {
        $incorrecto = true;
    }
}

?>

<body>
    <h1>Gestion de citas ITV Andalucia</h1>
    <form action="" method="post">
        Usuario: <input type="text" name="usuario"><br>
        Clave: <input type="text" name="clave"><br>
        <input type="submit" value="Acceder" name="acceder">
    </form>
    <?php
    if ($incorrecto) {
        echo 'Usuario o contraseña incorrecta';
    }
    ?>
</body>