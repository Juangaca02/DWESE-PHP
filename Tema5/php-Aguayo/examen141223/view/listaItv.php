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
        require_once '../controller/ItvController.php';
        session_start();
        if(isset($_SESSION['usuario'])){
            //controlamos el boton de las citas
            if(isset($_POST['cita'])){
                $_SESSION['idItv'] = $_POST['id'];
                header("Location: ../view/citas.php");
            }
            echo "<h1>Bienvenido Administrador de ".$_SESSION['usuario']->provincia."</h1>";
            echo "<p>Telefono: ".$_SESSION['usuario']->telefono."</p>";
            echo "<a href='../controller/CerrarSesion.php'>Cerrar Sesion</a><br>";
            echo "<a href='../view/menu.php'>Volver al menú</a>";  
            $itvs = ItvController::listadoItvProvincia($_SESSION['usuario']->provincia);
            if($itvs != null){
        ?>
        <div>
            <table border = '1' style='text-align: center; margin: 0 auto;'>
            <tr>
                <th>Localidad</th>
                <th>Direccion</th>
                <th>Citas</th>
            </tr>
            <?php  
            
            foreach ($itvs as $itv){
                echo "<tr>";
                    echo "<td>$itv->localidad</td>";
                    echo "<td>$itv->direccion</td>";
                    echo "<td><form action='' method='post'>
                        <input type='hidden' name='id' value='$itv->id'>
                        <input type='submit' name='cita' value='Citas'>
                        </form></td>";
                echo "</tr>";
            }
            ?>
        </table>
        </div>
        
        <?php
            }
            if($itvs == null){
                echo "<p style='text-aling: center'>No existen ITV para esta localidad</p>";
            }
        }
        else{
            header("Location: ../view/index.php");
        }
        ?>
    </body>
</html>
