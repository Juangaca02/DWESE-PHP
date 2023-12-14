<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
</head>

<body>
    <?php
    if (isset($_POST['cancelar'])) {
        header('Location: index.php');
    }
    if (isset($_POST['registrarme'])) {
        require "funciones.php";
        if ($_POST["pass"] != $_POST["confirmar"]) {
            $bandera = true;
        } else {
            $conex = crearConexion();
            $result = $conex->query("select user from perfil_usuario where user = '$_POST[user]'");
            if ($fila = $result->fetchObject()) {
                $banderaUser = true;
            } else {
                session_start();
                foreach ($_POST as $key => $value) {
                    $_SESSION[$key] = $value;
                }
                $_SESSION['pass'] = md5($_SESSION['pass']);
                $_SESSION['confirmar'] = $_SESSION['pass'];
                try {
                    $conex->exec("insert into perfil_usuario values('$_SESSION[nombre]', '$_SESSION[apellidos]','$_SESSION[direccion]','$_SESSION[localidad]','$_SESSION[user]', '$_SESSION[pass]', '$_SESSION[color_letra]', '$_SESSION[color_fondo]', '$_SESSION[tipo_letra]', $_SESSION[tam_letra])");
                    header('Location: inicio.php');
                } catch (\PDOException $th) {
                    echo "Error";
                }
            }
        }

    }
    ?>

    <form action="" method="post">
        Nombre: <input type="text" name="nombre" required><br>
        Apellidos: <input type="text" name="apellidos" required><br>
        Direccion: <input type="text" name="direccion" required><br>
        Localidad: <input type="text" name="localidad" required><br>
        Usuario: <input type="text" name="user" required><br>
        <?php if (isset($banderaUser))
            echo "<p style='color:red;' >El nombre de usuario ya existe en la base de datos</p>" ?>
            Contraseña: <input type="password" name="pass" required><br>
            Confirmar contraseña: <input type="password" name="confirmar" required><br>
            <?php
        if (isset($bandera))
            echo "<p style='color:red;'>Las contraseñas deben ser iguales</p>";
        ?>
        Color letra: <select name="color_letra">
            <option value="black">Negro</option>
            <option value="white">Blanco</option>
            <option value="blue">Azul</option>
        </select><br>
        Color fondo: <select name="color_fondo">
            <option value="grey">Gris</option>
            <option value="green">Verde</option>
            <option value="yellow">Amarillo</option>
        </select><br>
        Tipo de letra: <select name="tipo_letra">
            <option value="arial">Arial</option>
            <option value="times new roman">Times New Roman</option>
            <option value="courier">Courier</option>
        </select><br>
        Tamaño de la fuente: <select name="tam_letra">
            <option value="10">10</option>
            <option value="20">20</option>
            <option value="30">30</option>
        </select><br><br>
        <input type="submit" name="registrarme" value="Registrarme">
    </form>
    <form action="" method="post">
        <input type="submit" name="cancelar" value="Cancelar">
    </form>

</body>

</html>