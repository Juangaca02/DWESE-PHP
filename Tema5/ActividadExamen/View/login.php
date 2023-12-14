<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <?php

    require_once '../Controller/usuarioController.php';
    if (isset($_POST['login'])) {

        $usuario = usuarioController::esUsuario($_POST['usuario'], $_POST['pass']);

        if ($usuario != null) {
            session_start();
            $_SESSION['usuario'] = $usuario;
            header("Location: vistaAdmin.php");
        }
    }
    ?>
    <form action="" method="POST">
        Usuario: <input type="text" name="usuario"><br>
        Password: <input type="password" name="pass"><br>
        <input type="submit" name="login" value="Iniciar Sesion">
    </form>
</body>

</html>