<?php
if (isset($_POST['subir'])) {
    var_dump($_FILES);
    echo "<br>Explicación de los elementos de la variable \$_FILES['foto']: <br>";
    echo "El nombre original del fichero en la máquina del cliente: " . $_FILES['foto']['name'] . "<br>";
    echo "El tipo MIME del fichero: " . $_FILES['foto']['type'] . "<br>";
    echo "El tamaño del fichero en bytes: " . $_FILES['foto']['size'] . "<br>";
    echo "El nombre temporal del fichero en el servidor: " . $_FILES['foto']['tmp_name'] . "<br>";
    echo "El código de error asociado a esta subida: " . $_FILES['foto']['error'] . "<br><br><br><br>";
    //Preguntamos si se ha subido el fichero al servidor
    if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
        //concatenamos el tiempo unix delante para que los ficheros sean unicos
        $fich = time() . "-" . $_FILES['foto']['name'];
        //variable que subimos
        $ruta = "fotos/$fich";
        //metodo para subir los ficheros, pasando primero el nombre temporal del servidor y luego la ruta que hemos creado
        move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);
        try {
            $conex = new mysqli('localhost', 'dwes', 'abc123.', 'ficheros');
            $conex->query("insert into fotos values (null,'$_POST[nombre]', '$ruta')");
            $conex->close();
        } catch (\Throwable $th) {
            //throw $th;
        }
    } else {
        echo "Fallo al subir el archivo";
    }
}
//enctype="multipart/form-data" es un atributo necesario del formulario para poder subir ficheros
?>
<form action="" method="post" enctype="multipart/form-data">
    nombre <input type="text" name="nombre"><br>
    Fichero <input type="file" name="foto"><br>
    <input type="submit" name="subir" value="Subir Fichero">
    <input type="submit" name="mostrar" value="Mostrar fotos">
</form>

<?php
if (isset($_POST['mostrar'])) {
    try {
        $conex = new mysqli('localhost', 'dwes', 'abc123.', 'ficheros');
        $result = $conex->query("select * from fotos");
        if ($result->num_rows) {
            while ($fila = $result->fetch_object()) {
                //target='_blank' par que saque la imagen en otra pestaña
                //echo "<a href='$fila->ruta' target='_blank'><img src='$fila->ruta'/></a>";
                echo "<a href='mostrar.php?ruta=$fila->ruta' target='_blank'><img src='$fila->ruta' width='50px' height='50px' /></a>";
            }
        } else
            echo "no hay fotos";
        $conex->close();
    } catch (\Throwable $th) {
        //throw $th;
    }
}
?>