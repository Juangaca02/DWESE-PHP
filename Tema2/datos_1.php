<?php
if (isset($_POST['enviar'])) {
    if (!empty($_POST['nombre']) && !empty($_POST['apell']) && isset($_POST['modulos'])) {
        echo "<br>Nombre: " . $_POST["nombre"];
        echo "<br>Apellidos: " . $_POST["apell"];
        foreach ($_POST["modulos"] as $value) {
            echo "<br>$value";
        }
        echo '<br><a href="ejem_form.php">Atras</a>';
    } else {
        ?>
        <form action="" method="POST">
            Nombre: <input type="text" name="nombre" 
                           value="<?php if (!empty($_POST['nombre'])) echo $_POST['nombre']; ?>"><?php if (empty($_POST['nombre'])) {
            echo '<span style=color:red> El nombre es incorecto</span>';
        } ?><br>
            Apellidos: <input type="text" name="apell" 
                              value="<?php
                              if (!empty($_POST['apell']))
                                  echo $_POST['apell'];
                              ?>">
                              <?php
                              if (empty($_POST['nombre'])) {
                                  echo '<span style=color:red> El apell es incorecto</span>';
                              }
                              ?><br>
            Modulos:<?php if (!isset($_POST['modulos'])) echo '<span style=color:red> Debe elegir algun campo</span>'; ?><br>
            Desarrollo web entorno servidor:<input type="checkbox" name="modulos[]" value="DWES" <?php if(isset($_POST['modulos']) && (in_array("DWES", $_POST['modulos']))) echo 'checked =checked' ?>><br>
            Desarrollo web entorno cliente:<input type="checkbox" name="modulos[]" value="DWEC" <?php if(isset($_POST['modulos']) && (in_array("DWEC", $_POST['modulos']))) echo 'checked =checked' ?>><br>
            Despliegue de aplicaciones web:<input type="checkbox" name="modulos[]" value="Despliegue" <?php if(isset($_POST['modulos']) && (in_array("Despliegue", $_POST['modulos']))) echo 'checked =checked' ?>><br>
            <input type="submit" name="enviar" value="Enviar">
        </form>
        <?php
    }
} else {
    ?>
    <form action="" method="POST">
        Nombre: <input type="text" name="nombre"><br>
        Apellidos: <input type="text" name="apell"><br>
        Modulos:<br>
        Desarrollo web entorno servidor:<input type="checkbox" name="modulos[]" value="DWES"><br>
        Desarrollo web entorno cliente:<input type="checkbox" name="modulos[]" value="DWEC"><br>
        Despliegue de aplicaciones web:<input type="checkbox" name="modulos[]" value="Despliegue"><br>
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <?php
}
?>
