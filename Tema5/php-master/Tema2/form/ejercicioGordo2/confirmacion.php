<?php

if (isset($_POST['enviar'])) {
    //var_dump($_POST);
    echo "<br>Nombre: " . $_POST["nombre"];
    echo "<br>Apellidos: " .$_POST["apell"];
    echo "<br>Nº Matricula: " .$_POST["direccion"];
    echo "<br>Curso: " .$_POST["tarjeta"];
}
?>
        <form action="index.php" method="POST">
            <input type="hidden" name="nombre" value="<?php echo $_POST["nombre"] ?>">
            <input type="hidden" name="apell" value="<?php echo $_POST["apell"] ?>">
            <input type="hidden" name="direccion" value="<?php echo $_POST["direccion"] ?>">
            <input type="hidden" name="tarjeta"value="<?php echo $_POST["tarjeta"] ?>">
            <br>
            <input type="submit" name="cancelar" value="Cancelar"> <a href="index.php"><button type="button"> Confirmar</button></a>
        </form>
        
    

