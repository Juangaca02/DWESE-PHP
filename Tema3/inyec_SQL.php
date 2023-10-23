<form action="" method="POST">
    Usuario:<input type="text" name="usu"><br>
    Password: <input type="text" name="pass"><br>
    <input type="submit" name="enviar" value="SQL">
    <input type="submit" name="enviar2" value="PREPARADA"><br><br>
</form>
<?php

if(isset($_POST['enviar'])){
    try {
        $conex=new mysqli('localhost','dwes',"abc123.","prueba");
        $result=$conex->query("SELECT * FROM empleados WHERE usuario='$_POST[usu]' && pass='$_POST[pass]'");
    } catch (Exception $ex) {
        die($ex->getMessage());
    }
    if($result->num_rows>0)
        echo "Has entrado";
    else
        echo "Usuario o clave incorrecta";
}
