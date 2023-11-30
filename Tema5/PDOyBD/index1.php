<style>
    body {
        text-align: center;
        align-items: center;
    }

    table {
        text-align: center;
        align-items: center;
    }
</style>

<body>
    <form action="" method="post">
        Codigo: <input type="text" name="codigo"><br>
        Nombre: <input type="text" name="nombre"><br>
        Precio: <input type="text" name="precio"><br>
        <input type="submit" value="Insertar" name="insertar">
        <input type="submit" value="Mostrar" name="mostrar">
        <input type="submit" value="Buscar" name="buscar">
    </form>

</body>

<?php
require_once "Producto.php";
if (isset($_POST['insertar'])) {
    $p = new Producto($_POST['codigo'], $_POST['nombre'], $_POST['precio']);
    $result = $p->insertar();
    if ($result === false) {
        echo "Error en la base de datos";
    } else {
        if ($result === 0) {
            echo "No se ha insertado nada";
        } else {
            echo "Se han insertado $result registros";
        }
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
    $p = Producto::buscarProductos($_POST["cod"]);
    if ($p === false) {
        echo "Error en la base de datos";
    } elseif ($p) {
        echo $p;
    } else {
        echo "No existe el producto";
    }
}


if (isset($_POST['mostrar'])) {
    $products = Producto::recuperaTodo();
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