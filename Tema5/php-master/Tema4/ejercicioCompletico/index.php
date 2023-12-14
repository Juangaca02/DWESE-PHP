<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['intentos']))
        $_SESSION['intentos'] = 0;
    if ($_SESSION['intentos'] == 2) {
        header('Location: maximoFallos.php');
    } else {
        if (isset($_POST['send'])) {
            $_SESSION['intentos']++;
            require "funciones.php";
            $conex = crearConexion();
            $passMd5 = md5($_POST['pass']);
            try {
                $result = $conex->query("select * from perfil_usuario where user = '$_POST[user]' and pass = '$passMd5'");
                if ($fila = $result->fetchObject()) {
                    $_SESSION['nombre'] = $fila->nombre;
                    $_SESSION['apellidos'] = $fila->apellidos;
                    $_SESSION['direccion'] = $fila->direccion;
                    $_SESSION['localidad'] = $fila->localidad;
                    $_SESSION['user'] = $fila->user;
                    $_SESSION['pass'] = $fila->pass;
                    $_SESSION['color_letra'] = $fila->color_letra;
                    $_SESSION['color_fondo'] = $fila->color_fondo;
                    $_SESSION['tipo_letra'] = $fila->tipo_letra;
                    $_SESSION['tam_letra'] = $fila->tam_letra;
                    header('Location: inicio.php');
                } else {
                    $bandera = true;
                }

            } catch (\PDOException $th) {
                echo "Error";
            }
        }
        ?>
        <form action="" method="post">
            <?php if (isset($bandera))
                echo "<p style='color:red;'>Ese usuario con esa contraseña no existe</p>"; ?>
            Usuario: <input type="text" name="user"><br>
            Contraseña: <input type="text" name="pass"><br>
            <input type="submit" name="send" value="Enviar">
        </form>
        <form action="register.php">
            <input type="submit" name="register" value="Registrate">
        </form>
        <?php
    } ?>

</body>

</html>