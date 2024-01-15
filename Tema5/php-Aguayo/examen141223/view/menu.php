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
        require_once '../model/Usuario.php';
        session_start();
        if(isset($_SESSION['usuario'])){
            echo "<h1 >Bienvenido Administrador de ".$_SESSION['usuario']->provincia."</h1>";
            echo "<p>Telefono: ".$_SESSION['usuario']->telefono."</p>";
            echo "<a href='../controller/CerrarSesion.php'>Cerrar Sesion</a>";
        ?>
        <div style="text-align: center">
        <h1>Gestion de citas de las ITV de <?php echo $_SESSION['usuario']->provincia ?></h1>
        <a href="../view/nuevacita.php">Registrar Nueva Cita</a><br><br>
        <a href="../view/listaitv.php">Listado de sedes de ITV</a>
        
        <?php
        //si se ha insertado una cita se trae hasta aqui y se imprime el valor de la sesion que es un string con los datos solicitados
             if(isset($_SESSION['datosCita'])){
                echo "<p>$_SESSION[datosCita]</p>";
                //el unset para que al recargar no aparezca de nuevo el mensaje
                unset($_SESSION['datosCita']);
            }
         echo "</div>";
        }
        else{
            header("Location: ../view/index.php");
        }
        ?>
    </body>
</html>
