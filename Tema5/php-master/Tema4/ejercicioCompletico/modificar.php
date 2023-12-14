<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    session_start();
    ?>
    <style>
        body {
            color:
                <?php echo "$_SESSION[color_letra]"; ?>
            ;
            background-color:
                <?php echo "$_SESSION[color_fondo]"; ?>
            ;
            font-family:
                <?php echo "$_SESSION[tipo_letra]"; ?>
            ;
            font-size:
                <?php echo "$_SESSION[tam_letra]px" ?>
            ;
        }

        a {
            text-decoration: none;
            color:
                <?php echo "$_SESSION[color_letra]"; ?>
            ;
            background-color:
                <?php echo "$_SESSION[color_fondo]"; ?>
            ;
            font-family:
                <?php echo "$_SESSION[tipo_letra]"; ?>
            ;
            font-size:
                <?php echo "$_SESSION[tam_letra]px" ?>
            ;
        }

        input {
            background-color:
                <?php echo "$_SESSION[color_fondo]"; ?>
            ;
            color:
                <?php echo "$_SESSION[color_letra]"; ?>
            ;
            font-family:
                <?php echo "$_SESSION[tipo_letra]"; ?>
            ;
            font-size:
                <?php echo "$_SESSION[tam_letra]px" ?>
            ;
        }

        select {
            background-color:
                <?php echo "$_SESSION[color_fondo]"; ?>
            ;
            color:
                <?php echo "$_SESSION[color_letra]"; ?>
            ;
            font-family:
                <?php echo "$_SESSION[tipo_letra]"; ?>
            ;
            font-size:
                <?php echo "$_SESSION[tam_letra]px" ?>
            ;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_SESSION['user'])) {
        $bandera = false;
        if (isset($_POST['modificar'])) {
            require 'funciones.php';
            $conex = crearConexion();
            if ($_SESSION['user'] == $_POST['user']) {
                try {
                    foreach ($_POST as $key => $value) {
                        $_SESSION[$key] = $value;
                    }
                    $_SESSION['pass'] = md5($_SESSION['pass']);
                    $conex->exec("update perfil_usuario set nombre='$_SESSION[nombre]', apellidos='$_SESSION[apellidos]', direccion='$_SESSION[direccion]', localidad='$_SESSION[localidad]', user='$_SESSION[user]', pass='$_SESSION[pass]', color_letra='$_SESSION[color_letra]', color_fondo='$_SESSION[color_fondo]', tipo_letra='$_SESSION[tipo_letra]', tam_letra=$_SESSION[tam_letra] where user = '$_POST[user]'");
                    header('Location: inicio.php');
                } catch (PDOException $th) {
                    echo "Error";
                }
            } else {
                try {
                    $result = $conex->query("select user from perfil_usuario where user = '$_POST[user]'");
                    if ($fila = $result->fetchObject()) {
                        $bandera = true;
                    } else {
                        $bandera = false;
                        $userAntiguo = $_SESSION['user'];
                        foreach ($_POST as $key => $value) {
                            $_SESSION[$key] = $value;
                        }
                        $_SESSION['pass'] = md5($_SESSION['pass']);
                        $conex->exec("update perfil_usuario set nombre='$_SESSION[nombre]', apellidos='$_SESSION[apellidos]', direccion='$_SESSION[direccion]', localidad='$_SESSION[localidad]', user='$_SESSION[user]', pass='$_SESSION[pass]', color_letra='$_SESSION[color_letra]', color_fondo='$_SESSION[color_fondo]', tipo_letra='$_SESSION[tipo_letra]', tam_letra=$_SESSION[tam_letra] where user = '$userAntiguo'");
                        header('Location: inicio.php');
                    }
                } catch (PDOException $th) {
                    echo "Error";
                }
            }
        }
        ?>
        <a href="inicio.php">volver</a><br>
        <form action="" method="post">
            <br>Nombre: <input type="text" name="nombre" value="<?php echo $_SESSION['nombre']; ?>">
            <br>Apellidos: <input type="text" name="apellidos" value="<?php echo $_SESSION['apellidos']; ?>">
            <br>Dirección: <input type="text" name="direccion" value="<?php echo $_SESSION['direccion']; ?>">
            <br>Localidad: <input type="text" name="localidad" value="<?php echo $_SESSION['localidad']; ?>">
            <br>User: <input type="text" name="user" value="<?php echo $_SESSION['user']; ?>">
            <?php if ($bandera == true)
                echo "<p style='color:red;' >El nombre de usuario ya existe en la base de datos</p>" ?>
                <br>Pass: <input type="password" name="pass" value="">
                <br>Color letra: <select name="color_letra">
                    <option value="black" <?php if ($_SESSION['color_letra'] == 'black')
                echo "selected" ?>>Negro</option>
                    <option value="white" <?php if ($_SESSION['color_letra'] == 'white')
                echo "selected" ?>>Blanco</option>
                    <option value="blue" <?php if ($_SESSION['color_letra'] == 'blue')
                echo "selected" ?>>Azul</option>
                </select>
                <br>Color de fondo: <select name="color_fondo">
                    <option value="grey" <?php if ($_SESSION['color_fondo'] == 'grey')
                echo "selected" ?>>Gris</option>
                    <option value="green" <?php if ($_SESSION['color_fondo'] == 'green')
                echo "selected" ?>>Verde</option>
                    <option value="yellow" <?php if ($_SESSION['color_fondo'] == 'yellow')
                echo "selected" ?>>Amarillo</option>
                </select>
                <br>Tipo de letra: <select name="tipo_letra">
                    <option value="arial" <?php if ($_SESSION['tipo_letra'] == 'arial')
                echo "selected" ?>>Arial</option>
                    <option value="times new roman" <?php if ($_SESSION['tipo_letra'] == 'times new roman')
                echo "selected" ?>>
                        Times New Roman</option>
                    <option value="courier" <?php if ($_SESSION['tipo_letra'] == 'counrier')
                echo "selected" ?>>Courier</option>
                </select>
                <br>Tamano de letra: <select name="tam_letra">
                    <option value="10" <?php if ($_SESSION['tam_letra'] == '10')
                echo "selected" ?>>10</option>
                    <option value="20" <?php if ($_SESSION['tam_letra'] == '20')
                echo "selected" ?>>20</option>
                    <option value="30" <?php if ($_SESSION['tam_letra'] == '30')
                echo "selected" ?>>30</option>
                </select><br><br>
                <input type="submit" name="modificar" value="Modificar mis datos">

            </form>
        <?php
    } else
        header('Location: index.php');
    ?>
</body>

</html>