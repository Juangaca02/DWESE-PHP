<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        p {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_POST["register"])) {
        preg_match('/^[1-9]{8}[A-Z]$/i', $_POST["dni"]) ? $dnival = true : $dnival = false;
        preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{1,50}$/u', $_POST['nombre']) ? $nombreVal = true : $nombreVal = false;
        preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{1,50}$/u', $_POST['apellidos']) ? $apellidosVal = true : $apellidosVal = false;
        preg_match('/^[a-zA-Z0-9\s.,#-]{1,100}$/u', $_POST['direccion']) ? $direccionVal = true : $direccionVal = false;
        preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{1,50}$/u', $_POST['localidad']) ? $localidadVal = true : $localidadVal = false;
        !empty($_POST["clave"]) ? $claveVal = true : $claveVal = false;

        if ($dnival && $nombreVal && $apellidosVal && $direccionVal && $localidadVal && $claveVal) {
            require_once '../Controller/ClienteController.php';
            $has = password_hash($_POST["clave"], PASSWORD_DEFAULT);
            $cliente = new Cliente($_POST["dni"], $_POST["nombre"], $_POST["apellidos"], $_POST["direccion"], $_POST['localidad'], $has, $_POST["tipo"]);
            if (ClienteController::insertarCliente($cliente)) {
                session_start();
                $_SESSION["usuario"] = $cliente;
                header("Location:index.php");
            } else
                echo "<p>El DNI ya existe</p>";
        }
    }
    ?>

    <form action="" method="post">
        DNI: <input type="text" name="dni" <?php if (isset($dnival) && $dnival)
            echo "value='$_POST[dni]'"; ?>>
        <?php if (isset($dnival) && !$dnival)
            echo "<p>Dni en formato incorrecto o vacio</p>"; ?><br>
        Nombre: <input type="text" name="nombre" <?php if (isset($nombreVal) && $nombreVal)
            echo "value='$_POST[nombre]'"; ?>>
        <?php if (isset($nombreVal) && !$nombreVal)
            echo "<p>Nombre vacio</p>"; ?><br>
        Apellidos: <input type="text" name="apellidos" <?php if (isset($apellidosVal) && $apellidosVal)
            echo "value='$_POST[apellidos]'"; ?>>
        <?php if (isset($apellidosVal) && !$apellidosVal)
            echo "<p>Apellidos vacios</p>"; ?><br>
        Direccion: <input type="text" name="direccion" <?php if (isset($direccionVal) && $direccionVal)
            echo "value='$_POST[direccion]'"; ?>>
        <?php if (isset($direccionVal) && !$direccionVal)
            echo "<p>Direccion vacia</p>"; ?><br>
        Localidad: <input type="text" name="localidad" <?php if (isset($localidadVal) && $localidadVal)
            echo "value='$_POST[localidad]'"; ?>>
        <?php if (isset($localidadVal) && !$localidadVal)
            echo "<p>Localidad vacia</p>"; ?><br>
        Clave: <input type="text" name="clave" <?php if (isset($claveVal) && $claveVal)
            echo "value='$_POST[clave]'"; ?>>
        <?php if (isset($claveVal) && !$claveVal)
            echo "<p>Clave vacia</p>"; ?><br>
        Tipo:<select name="tipo">
            <option value="cliente">Cliente</option>
            <option value="admin">Admin</option>
        </select><br>
        <input type="submit" name="register" value="Registrarse">
    </form>
    <a href="index.php">index</a>
</body>

</html>