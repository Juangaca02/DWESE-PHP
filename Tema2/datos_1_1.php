<?php
$nombre = true;
$apell = true;
$modulo = true;
$errores = true;
if (isset($_POST['enviar'])) {
    $errores = false;
    if (empty($_POST['nombre'])) {
        $nombre = false;
    }
    if (empty($_POST['apell'])) {
        $apell = false;
    }
    if (!isset($_POST['modulos'])) {
        $modulo = false;
    }
}
if (isset($_POST['enviar']) && $nombre && $apell && $modulo) {
    echo "<br>Nombre: " . $_POST["nombre"];
    echo "<br>Apellidos: " . $_POST["apell"];
    foreach ($_POST["modulos"] as $value) {
        echo "<br>$value";
    }
    echo '<br><a href="ejem_form.php">Atras</a>';
} else {
    ?>
    <form action="" method="POST">                                                                                        <!--Tambin sirve !$nombre, ya que el valor original es True-->
        Nombre: <input type="text" name="nombre" value="<?php if (!$errores && $nombre) echo $_POST['nombre']; ?>"><?php if ($nombre == false) echo '<span style=color:red> El nombre es incorecto</span>'; ?><br>
        Apellidos: <input type="text" name="apell" value="<?php if (!$errores && $apell) echo $_POST['apell']; ?>"><?php if (!$apell) echo '<span style=color:red> El apell es incorecto</span>'; ?><br>
        Modulos:<?php if ($modulo == false) echo '<span style=color:red> Debe elegir algun campo</span>'; ?><br>
        Desarrollo web entorno servidor:<input type="checkbox" name="modulos[]" value="DWES" <?php if (!$errores && $modulo && in_array("DWES", $_POST['modulos'])) echo 'checked =checked' ?>><br>
        Desarrollo web entorno cliente:<input type="checkbox" name="modulos[]" value="DWEC" <?php if (!$errores && $modulo && (in_array("DWEC", $_POST['modulos']))) echo 'checked =checked' ?>><br>
        Despliegue de aplicaciones web:<input type="checkbox" name="modulos[]" value="Despliegue" <?php if (!$errores && $modulo && (in_array("Despliegue", $_POST['modulos']))) echo 'checked =checked' ?>><br>
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <?php
}
?>
