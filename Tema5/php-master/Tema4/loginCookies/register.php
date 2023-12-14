<?php if (!isset($_POST['register'])) { ?>
    <form action="" method="post">
        Usuario: <input type="text" name="user">
        Contraseña: <input type="password" name="pass">
        <input type="submit" name="register" value="Registrarse">
    </form>
    <?php
} else {
    try {
        $conex = crearConexion();
        $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $conex->exec("INSERT INTO users (user, pass) VALUES ('$_POST[user]', '$pass')");
        setcookie("register", "Usuario registrado");
        header('Location: login.php');
    } catch (PDOException $e) {
        setcookie("register", "Algo ha fallado disculpe las molestias intentelo mas tarde");
        header('Location: login.php');
    }



}

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
?>