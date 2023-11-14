<?php
if (isset($_COOKIE["registro"])) {
    $cookieValue = $_COOKIE['registro'];
    $arrayRecuperado = unserialize($cookieValue);
    foreach ($arrayRecuperado as $valor) {
        $popo[] = $valor;
    }
    setcookie('registrado', 'si', time() - 1);
    echo "Usuario añadido Correctamente";
}

if (isset($_POST["acceder"])) {
    try {
        $conex = new PDO("mysql:host=localhost;dbname=ejercicios;charset=utf8mb4", "dwes", "abc123.");
        $result = $conex->prepare("SELECT * from usuario where ");
        if ($fila = $result->fetchObject()) {
            if (password_verify($_POST['pass'], $fila->password)) {
                setcookie("nombre", $fila->Nombre);
                setcookie("apellido", $fila->Apellido);
                if (isset($_POST["recordar"])) {
                    setcookie("usuario", $_POST["usuario"]);
                    setcookie("pass", $_POST["pass"]);
                    setcookie("recordarDatos", "");
                } else {
                    setcookie("usuario", $_POST["usuario"], time() - 1);
                    setcookie("pass", $_POST["pass"], time() - 1);
                }
                header("Location:datos.php");
            } else {
                print("Contraseña Incorrecto");
            }
        } else {
            print("Usuario Incorrecto");
        }
    } catch (PDOException $ex) {
        die($ex->getMessage());
    }
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
    <h1>Iniciar Sesion</h1>
    <form action="Register.php" method="POST">
        Nombre de usuario:<input type="text" name="usuario" values="<?php if (isset($_COOKIE["recordarDatos"]) || isset($_COOKIE['registro'])) {
            if (isset($_COOKIE["recordarDatos"])) {
                print $_COOKIE["usuario"];
            }
            if (isset($_COOKIE['registro'])) {
                echo $popo[2];
            }
        } ?>"><br>
        Contraseña:<input type="text" name="pass" values="<?php if (isset($_COOKIE["recordarDatos"])) {
            print $_COOKIE["pass"];
        } ?>"><br>
        Recordarme<input type="checkbox" <?php if (isset($_COOKIE["recordarDatos"])) {
            ?> checked <?php
        } ?>><br>
        <input type="submit" name="register" value="Registrarse"> <input type="submit" name="acceder" value="Acceder">
    </form>



</body>

</html>