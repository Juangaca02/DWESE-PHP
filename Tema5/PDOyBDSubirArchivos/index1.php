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
        Selecionar Fichero: <input type="file" name="foto"><br><br>
        <input type="submit" value="Subir Fichero" name="subir">
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
    } else {
        echo "Error al subir el ficehro";
    }
}

if (isset($_POST['buscar'])) {
    ?>
    <form action="" method="post">
        Codigo del Producto: <input type="text" name="cod"><br>
        <input type="submit" name="buscarcod" value="Buscar">
    </form>
    <?php
}

if (isset($_POST['buscarcod'])) {
    $p = ProductoController::buscarProductos($_POST["cod"]);
    if ($p === false) {
        echo "Error en la base de datos";
    } elseif ($p) {
        echo $p;
    } else {
        echo "No existe el producto";
    }
}


if (isset($_POST['mostrar'])) {
    $products = ProductoController::recuperaTodo();
    if ($products === false) {
        echo "Error en la base de datos";
    } elseif ($products) {
        ?>
        <table border="1">
            <tr>
                <?php
                foreach ($products as $p) {
                    echo "<td>$p->codigo</td>";
                    echo "<td>$p->nombre</td>";
                    echo "<td>$p->precio</td></tr>";
                }
                ?>
        </table>
        <?php
    } else {
        echo "No hay producto en la base de datos";
    }
}
?>