<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <?php
        $nombre = true; $apell = true; $modulos = true; $enviar = false;
if (isset($_POST['enviar'])) {
    $enviar = true;
    if (empty($_POST['nombre'])) {
        $nombre = false;
    }
    if (empty($_POST['apell'])) {
        $apell = false;
    }
    if (!isset($_POST['modulos'])) {
        $modulos = false;
    }
}
if (isset($_POST['enviar']) && $nombre && $apell && $modulos) {
    echo "<br>Nombre: " . $_POST["nombre"];
    echo "<br>Apellidos: " . $_POST["apell"];
    foreach ($_POST["modulos"] as $value) {
        echo "<br>$value";
    }
    echo '<br><a href="ejem_form.php">Atras</a>';
} else {
    ?>
    <form action="" method="POST">
        Nombre: <input type="text" name="nombre" value="<?php if ($enviar && $nombre) echo $_POST['nombre'] ?>"> <?php if(!$nombre) echo '<span style=color:red> El nombre es incorecto</span>'; ?>
        <br>
        Apellidos: <input type="text" name="apell" value="<?php if ($enviar && $apell) echo $_POST['apell']; ?>"> <?php if(!$apell) echo '<span style=color:red> El apellido es incorecto</span>'; ?><br>
        Modulos:<br>
        <?php if($modulos == false) echo '<span style=color:red> Debe elegir minimo un módulo</span><br>'; ?>
        Desarrollo web entorno servidor:<input type="checkbox" name="modulos[]" value="DWES" <?php if ($modulos && $enviar && (in_array("DWES", $_POST['modulos']))) echo 'checked =checked' ?>><br>
        Desarrollo web entorno cliente:<input type="checkbox" name="modulos[]" value="DWEC" <?php if ($modulos && $enviar && (in_array("DWEC", $_POST['modulos']))) echo 'checked =checked' ?>><br>
        Despliegue de aplicaciones web:<input type="checkbox" name="modulos[]" value="Despliegue" <?php if ($modulos && $enviar && (in_array("Despliegue", $_POST['modulos']))) echo 'checked =checked' ?>><br>
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <?php
}
?>
    </body>
</html>
