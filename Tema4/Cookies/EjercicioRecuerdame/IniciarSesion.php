<?php
if (isset($_COOKIE['registro'])) {
    $cookieValue = $_COOKIE['registro'];
    $arrayRecuperado = unserialize($cookieValue);
    foreach ($arrayRecuperado as $valor) {
        $popo[] = $valor;
    }
    setcookie('registrado', 'si', time() - 1);
    echo "Usuario añadido Correctamente";
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php
    try {
        $opciones = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ);
        $conex = new PDO("mysql:host=localhost;dbname=ejercicios;charset=utf8mb4", "dwes", "abc123.");
        $result = $conex->prepare("SELECT * from usuario");
    } catch (PDOException $ex) {
        die($ex->getMessage());
    }
    ?>
    <div class="container">
        <h1>Iniciar Sesion</h1>
        <form action="Register.php" method="POST">
            Nombre de usuario:<input type="text" name="usuario" value="<?php
            if (isset($_COOKIE['registro'])) {
                echo $popo[2];
            }

            ?>"><br>
            Contraseña:<input type="text" name="contraseña" value="<?php
            if (isset($_COOKIE['registro'])) {
                echo $popo[3];
            }

            ?>"><br>
            Recordarme<input type="checkbox"><br>
            <input type="submit" name="register" value="Registrarse"> <input type="submit" name="acceder"
                value="Acceder">
        </form>
        <?php
        if (isset($_POST["aceder"])) {

        }

        if (isset($_POST["aceder"]) && isset($_COOKIE['registro'])) {

        }


        ?>

    </div>
</body>

</html>