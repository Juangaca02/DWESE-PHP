<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
</head>

<body>
    <?php
    function crearCookie($nombre)
    {
        if (!isset($_COOKIE['registro'])) {
            setcookie("registro", $nombre);
        }
    }
    if (isset($_POST["registrarse"])) {
        try {
            $conex = new PDO("mysql:host=localhost;dbname=ejercicios;charset=utf8mb4", "dwes", "abc123.");
            $hash_password = password_hash($_POST['contra'], PASSWORD_DEFAULT);
            $result = $conex->exec("INSERT INTO usuario VALUES ('$_POST[nombre]','$_POST[apellido]','$_POST[usuario]','$hash_password')");
            $array = array("$_POST[nombre]", "$_POST[apellido]", "$_POST[usuario]", "$_POST[contra]", $hash_password);
            $arrayCookie = serialize($array);
            crearCookie($arrayCookie);
            header("Location:IniciarSesion.php");
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }
    ?>
    <h1>Registrar</h1>
    <form action="" method="POST">
        Nombre:<input type="text" name="nombre"><br>
        Apellido:<input type="text" name="apellido"><br>
        Usuario:<input type="text" name="usuario"><br>
        Contraseña:<input type="password" name="contra"><br>
        <input type="submit" name="registrarse" value="Registrarse">
    </form>
    <br>
    <a href="IniciarSesion.php">Iniciar Sesion</a>

</body>

</html>