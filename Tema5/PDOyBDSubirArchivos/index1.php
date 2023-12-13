<style>
    body {
        text-align: center;
        align-items: center;
    }

    table,
    tr {
        text-align: center;
        align-items: center;
    }
</style>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        Nombre: <input type="text" name="nombre">
        Selecionar Fichero: <input type="file" name="foto"><br><br>
        <input type="submit" value="Subir Fichero" name="subir">
        <input type="submit" name="mostrar" value="Mostrar">
    </form>

</body>

<?php

if (isset($_POST['subir'])) {
    echo "Nombre Original: " . $_FILES['foto']['name'] . "<br>";
    echo "Nombre Temporal: " . $_FILES['foto']['tmp_name'] . " <br>";
    echo "Tamaño: " . $_FILES['foto']['size'] . " bytes<br>";
    echo "Tipo:" . $_FILES['foto']['type'], " <br>";
    echo "Error: " . $_FILES['foto']['error'] . " <br>";

    if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
        $fich = time() . "-" . $_FILES['foto']['name'];
        $ruta = "fotos/" . $fich;
        move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);
        try {
            $conex = new mysqli('localhost', 'dwes', 'abc123.', 'ficheros');
            $conex->query("INSERT into fotos (nombre, ruta) values('$_POST[nombre]','$ruta')");
        } catch (Exception $ex) {
            die($ex->getTraceAsString());
        }
    } else {
        echo "Error al subir el ficehro";
    }
}

if (isset($_POST['mostrar'])) {
    try {
        $conex = new mysqli('localhost', 'dwes', 'abc123.', 'ficheros');
        $result = $conex->query("SELECT * from fotos");
        if ($result->num_rows) {
            while ($reg = $result->fetch_object()) {
                //echo "<a href='$reg->ruta' target='_blank'><img src='$reg->ruta' width='50px' height='50px'></a>";
                echo "<a href='mostrar.php?ruta=$reg->ruta'><img src='$reg->ruta' width='50px' height='50px'></a>";
            }
        } else {
            echo "No hay fotos en la BD";
        }
    } catch (\Throwable $th) {
        //throw $th;
    }
}
?>