<?php
if (isset($_COOKIE['register'])) {
    setcookie("register", "", 1);
    $textoDeFallo = $_COOKIE['register'];
}
if (isset($_POST['register']))
    header('Location: register.php');
$falloContraseña = $falloUsuario = false;
setcookie("fecha1", date('Y-m-d H:i:s'));
if (isset($_COOKIE['usuario'])) {
    $credenciales = explode(",", $_COOKIE['usuario']);
}
if (isset($_POST['access'])) {
    if (isset($_POST['check'])) {
        $array = array($_POST['user'], $_POST['pass'], $_POST['check']);
    } else {
        $array = array($_POST['user'], $_POST['pass']);
    }
    setcookie("usuario", implode(",", $array));
    $conex = crearConexion();
    $result = $conex->query("select * from users where user = '$_POST[user]'");
    if ($user = $result->fetchObject()) {
        if (password_verify($_POST['pass'], $user->pass)) {
            header('Location: datos.php');
        } else {
            $falloContraseña = true;
        }
    } else {
        $falloUsuario = true;
    }
}
?>
<form action="" method="post">
    Usuario: <input type="text" name="user" value="<?php if (isset($credenciales[2]))
        echo $credenciales[0] ?>">
        Password: <input type="password" name="pass" value="<?php if (isset($credenciales[2]))
        echo $credenciales[1] ?>">
        Recuerdame: <input type="checkbox" name="check" <?php if (isset($credenciales[2]))
        echo "checked"; ?>>
    <input type="submit" name="register" value="registrarse">
    <input type="submit" name="access" value="acceder">
</form>

<?php
if ($falloContraseña)
    echo "fallo en la contraseña";
if ($falloUsuario)
    echo "no existe el usuario";
if (isset($textoDeFallo))
    echo "$textoDeFallo";


function crearConexion()
{
    try {
        $atributos = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_CASE => PDO::CASE_LOWER
        );
        $conex = new PDO('mysql: host=localhost; dbname=prueba; charset=utf8mb4', 'dwes', 'abc123.', $atributos);
        return $conex;
    } catch (PDOException $e) {
        die($e->getMessage());
    }

}

function comprobaciones($falloContraseña, $falloUsuario, $textoDeFallo)
{

}
?>