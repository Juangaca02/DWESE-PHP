<html>
    <head>
        <title>title</title>
    </head>
    <body>
        
        <?php

        //var_dump($_POST); Esta variable nos enseña todo el contenido de una variable, en este caso del formulario enviado

        if (isset($_POST['enviar'])) {
            if (!empty($_POST['nombre']) && !empty($_POST['nombre']) && isset($_POST['modulos'])) {
                echo "<br>Nombre: " . $_POST["nombre"];
                echo "<br>Apellidos: " . $_POST["apell"];
                foreach ($_POST["modulos"] as $value) {
                    echo "<br>$value";
                }
                echo "<br><a href='EjemploForm3.php'>Atras</a>";
            }else{
                ?>
                <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                    Nombre: <input type="text" name="nombre" value="<?php echo $_POST['nombre']; ?>">
                    <?php if(empty($_POST['nombre'])) echo "<span style=color:red>El nombre no puede estar vacío</span>"; ?>
                    <br>
                    Apellidos: <input type="text" name="apell" value="<?php echo $_POST['apell']; ?>">
                    <?php if(empty($_POST['apell'])) echo "<span style=color:red>El apellido no puede estar vacío</span>"; ?>
                    <br>
                    Modulos:<br>
                    Desarrollo web entorno servidor:<input type="checkbox" name="modulos[]" value="DWES" <?php if(isset($_POST["modulos"])) if (in_array("DWES", $_POST['modulos'])) echo "checked" ?>><br>
                    Desarrollo web entorno cliente:<input type="checkbox" name="modulos[]" value="DWEC" <?php if(isset($_POST["modulos"])) if (in_array("DWEC", $_POST['modulos'])) echo "checked" ?>><br>
                    Despliegue de aplicaciones web:<input type="checkbox" name="modulos[]" value="Despliegue" <?php if(isset($_POST["modulos"])) if (in_array("Despliegue", $_POST['modulos'])) echo "checked" ?>><br>
                    <?php if(!isset($_POST["modulos"])) echo "<span style=color:red>El checkbox no puede estar vacío</span><br>"; ?>
                    <input type="submit" name="enviar" value="Enviar">
                </form>
                <br>
                <?php
            }
        } else { 
            
        ?>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST"><!-- Las comillas vacias hacen que el fichero se llame a si mismo action="" -->
            Nombre: <input type="text" name="nombre"><br>
            Apellidos: <input type="text" name="apell"><br>
            Modulos:<br>
            Desarrollo web entorno servidor:<input type="checkbox" name="modulos[]" value="DWES"><br>
            Desarrollo web entorno cliente:<input type="checkbox" name="modulos[]" value="DWEC"><br>
            Despliegue de aplicaciones web:<input type="checkbox" name="modulos[]" value="Despliegue"><br>
            <input type="submit" name="enviar" value="Enviar">
        </form>
        <br>
        <?php
            }  
        ?>
    </body>
</html>
