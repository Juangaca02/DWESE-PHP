<?php
require_once 'Producto.php';
if (isset($_POST['insertar'])) {
    $p = new Producto($_POST['codigo'], $_POST["nombre"], $_POST["precio"]);
    $resultado = $p->insertar();
    if ($resultado === false) {
        echo "error en la base de datos";
    } else {
        echo "todo correcto";
    }

}

?>

<form action="" method="post">
    Código: <input type="text" name="codigo"><br>
    Nombre: <input type="text" name="nombre"><br>
    Précio: <input type="text" name="precio"><br>
    <input type="submit" name="insertar" value="insertar"><br>
    <input type="submit" name="mostrar" value="mostrar"><br>
    <input type="submit" name="buscar" value="buscar"><br>
</form>
<br>
<?php
if (isset($_POST["buscar"])) {
    ?>
    <form action="" method="post">
        Busqueda por codigo: <input type="text" name="codigo"><br>
        <input type="submit" name="buscarCodigo" value="Buscar">
    </form>
    <?php
}
if (isset($_POST["buscarCodigo"])) {
    $p = Producto::busarProducto($_POST["codigo"]);
    if ($p === false) {
        echo "Error en la base de datos";
    } else {
        if ($p) {
            echo $p;
        } else {
            echo "No se encontraron resultados";
        }
    }

}

if (isset($_POST["mostrar"])) {
    $productos = Producto::recuperaTodos();
    if ($productos === false) {
        echo "Error en la bd";
    } else {
        if ($productos) {
            foreach ($productos as $producto) {
                echo $producto;
            }
        } else {
            echo "no hay productos";
        }
    }
}
?>