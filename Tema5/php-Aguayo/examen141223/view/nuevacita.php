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
         require_once '../model/Cita.php';
         require_once '../controller/VehiculoController.php';
         require_once '../controller/CitasController.php';
         require_once '../controller/ItvController.php';
        session_start();
        if(isset($_SESSION['usuario'])){
            //controlamos el boton de las citas
            if(isset($_POST['buscar'])){
                $coche = VehiculoController::getVehiculoByMatricula($_POST['matricula']);
                //si la matricula no coincide con ningun vehiculo
                if($coche == null){
                    $_SESSION['noCoche'] = "La matricula introducida no corresponde con ningun vehiculo";
                }
                //si la matricula ha coincidido
                if($coche != null){
                    $citaItv = CitasController::getCitaByMatricula($coche->matricula);
                    //si tiene citas 
                    if($citaItv != null){
                        $itv = ItvController::getItvById($citaItv->id_itv);
                        $_SESSION['hayCita'] = "Ya tienes una cita el dia $citaItv->fecha a las $citaItv->hora en la ITV de $itv->localidad en la provincia de $itv->provincia";
                        $_SESSION['cita'] = $citaItv;
                        
                    }
                    //si no tiene citas
                    if($citaItv == null){
                        $_SESSION['coche'] = $coche;
                        $_SESSION['noCita'] = "no";
                    }
                    
                }
            }
            
            //controlamos el boton de registrar nueva cita
            if(isset($_POST['registrar'])){
                //comprobamos que la imagen se haya subido al servidor y que sea de tipo .jpg
                if(is_uploaded_file($_FILES["foto"]['tmp_name']) && $_FILES["foto"]['type'] == "image/jpeg"){
                    //asignamos el nombre al archivo
                    $fich= time()."-".$_SESSION['coche']->matricula."-ficha.jpg";
                    //asignamos la ruta
                    $ruta = "../img/$fich";
                    //movemos la imagen hacia la ruta seleccionada
                    move_uploaded_file($_FILES["foto"]['tmp_name'], $ruta);
                    
                    //creamos el objeto cita para pasarselo al insert
                    $cita = new Cita($_SESSION['coche']->matricula, $_POST['itv'], $_POST['fecha'], $_POST['hora'], $ruta);
                    
                    //comprobamos que se haya insertado
                    if(CitasController::addCita($cita)){
                        //updateamos la fecha de revision del coche
                        VehiculoController::moficiarFechaRevision($cita->fecha, $cita->matricula);
                        $itv = ItvController::getItvById($cita->id_itv);
                        $_SESSION['datosCita'] = "El vehiculo con la matricula ".$_SESSION['coche']->matricula." tiene una cita el día $cita->fecha a las $cita->hora en la sede de $itv->localidad en la provincia de $itv->provincia";
                        header("Location: ../view/menu.php");
                    }
                }
                else{
                    $_SESSION['noFoto'] = "Error al cargar la imagen, solo admite archivos .jpg";
                }
            }
            
            //controlamos si anula la cita
            if(isset($_POST['cancelar'])){
                //borramos la imagen de la carpeta de nuestro servidor
                unlink($_SESSION['cita']->ficha);
                //comprovaoms que se haya borrado
                if(CitasController::deleteCita($_SESSION['cita'])){
                    $_SESSION['eliminadoCita'] = "La cita se ha cancelado correctamente";
                    //cancelamos la sesion cita para que no nos de conflicto 
                    unset($_SESSION['cita']);
                }
                else{
                    echo 'error al eliminar la cita';
                }
            }
            
            echo "<h1>Bienvenido Administrador de ".$_SESSION['usuario']->provincia."</h1>";
            echo "<p>Telefono: ".$_SESSION['usuario']->telefono."</p>";
            echo "<a href='../controller/CerrarSesion.php'>Cerrar Sesion</a><br>";
            echo "<a href='../view/menu.php'>Volver al menú</a>";  
        ?>
        <div style="text-align: center">
            <form action="" method="post">
                Matricula: <input type="text" name="matricula">
                <input type="submit" name="buscar" value="Buscar">
            </form>
            
            <?php 
            //si no hay coche mostramos el mensaje y quitaos la sesion
            if(isset($_SESSION['noCoche'])){
                echo "<p>$_SESSION[noCoche]</p>";
                unset($_SESSION['noCoche']);
            }
            
            //si no hay cita mostramos el mensaje y el boton pa cancelarla y quitaos la sesion
            if(isset($_SESSION['hayCita'])){
                echo "<p>$_SESSION[hayCita]</p>";
            ?>
            <form action="" method="post">
                <input type="submit" name="cancelar" value="Cancelar Cita">
            </form>
            <?php
                unset($_SESSION['hayCita']);
            }
            //si no hay foto mostramos el mensaje y quitaos la sesion
            if(isset($_SESSION['noFoto'])){
                echo "<p>$_SESSION[noFoto]</p>";
                unset($_SESSION['noFoto']);
            }
            //si has eliminado la cita mostramos el mensaje y quitaos la sesion
            if(isset($_SESSION['eliminadoCita'])){
                echo "<p>$_SESSION[eliminadoCita]</p>";
                unset($_SESSION['eliminadoCita']);
            }
            
            //si no hay cita registrada aparece el formulario para que podemos crearla
            if(isset($_SESSION['noCita'])){
            ?>
            
            <h3 style="text-decoration: underline">Datos del vehiclo</h3>
            <form action="" method="post" enctype="multipart/form-data">
                Matricula: <input type="text" name="matricula" value="<?php echo $_SESSION['coche']->matricula ?>" readonly>
                Marca: <input type="text"  name="matricula" value="<?php echo $_SESSION['coche']->marca ?>" readonly><br>
                Modelo: <input type="text" name="matricula" value="<?php echo $_SESSION['coche']->modelo ?>" readonly>
                Color: <input type="text" name="matricula" value="<?php echo $_SESSION['coche']->color ?>" readonly><br>
                Plazas: <input type="text" name="matricula" value="<?php echo $_SESSION['coche']->plazas ?>" readonly>
                Fecha Ultima Revision: <input type="text" name="matricula" value="<?php echo $_SESSION['coche']->fecha_ultima_revision ?>" readonly><br>
                <h4>Elegir ITV</h4>  
                <select name="itv">
                    <?php 
                        foreach (ItvController::listadoItvProvincia($_SESSION['usuario']->provincia) as $itv){
                            echo "<option value='$itv->id'>$itv->localidad - $itv->direccion</option>";
                        }
                    ?>
                </select><br>
                Fecha <input type="date" name="fecha" required>      Hora <input type="time" name="hora" required><br>
                Ficha tecnoca del vehiculo: <input type="file" name="foto" required><br>
                <input type="submit" name="registrar" value="Registrar Nueva Cita">
            </form>
            
            <?php
            //borramos la sesion para que no aparezca siempre el formulario
                unset($_SESSION['noCita']);
            }
            ?>
        </div>
        <?php
        }
        else{
            header("Location: ../view/index.php");
        }
        ?>
    </body>
</html>
