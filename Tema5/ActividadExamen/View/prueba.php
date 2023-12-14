<?php

if(isset($_POST['reservar'])){
    var_dump($_POST);
    if(is_uploaded_file($_FILES["foto"]['tmp_name'])){
                $fich= time()."-".$_FILES['foto']['name'];
                $ruta = "arretratos/$fich";
                move_uploaded_file($_FILES["foto"]['tmp_name'], $ruta);
                
                try{
                    $conex = new mysqli("localhost", "dwes", "abc123.", "ficheros");
                    $conex->query("insert into fotos (nombre, ruta) values ('$_POST[nombre]', '$ruta')");
                    $conex->close();
                } catch (Exception $ex) {
                    echo "fallo";
                }
            }
}
?>


<form action="" method="post" enctype="multipart/form-data">
    Coche: <select id="coche">
    <option value="first">1111AAA</option>
    </select><br>

    ITV: <select id="itv">
        <option value="first">Almeria</option>
    </select><br>

    Fecha: <input type="date" name="fecha"><br>
    Hora: <input type="time" name="hora"><br>
    Ficha tecnica: <input type="file" name="foto"><br>
    <input type="submit" name="reservar" value="Reservar">
</form>
