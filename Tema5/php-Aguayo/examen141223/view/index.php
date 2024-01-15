<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once '../controller/UsuarioController.php';
        if(isset($_SESSION['usuario'])){
            header("Location: ../view/menu.php");
        }
        if(isset($_POST['login'])){
            session_start();
            $user = UsuarioController::esUsuario($_POST['usuario'], $_POST['pass']);
            if($user != null){
                $_SESSION["usuario"] = $user;
                header("Location: ../view/menu.php");
            }
            if($user == null){
                $_SESSION['userPassIncorrect'] = "Usuario o contraseña incorrecta";
            }
        }
        ?>
        <div style="text-align: center">
            <h1>Gestion de citas ITV Andalucía</h1>
        <form action="" method="POST">
            Usuario: <input type="text" name="usuario" required><br>
            Clave: <input type="password" name="pass" required><br>
            <input type="submit" name="login" value="Iniciar Sesion">
        </form>
        <?php 
            if(isset($_SESSION['userPassIncorrect'])){
                print_r($_SESSION['userPassIncorrect']);
                unset($_SESSION['userPassIncorrect']);
                
            }
        ?>
        </div>
    </body>
</html>
