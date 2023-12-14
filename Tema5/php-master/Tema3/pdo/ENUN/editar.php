<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Plantilla para Ejercicios Tema 3</title>
    <link href="dwes.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
    if (isset($_POST['cancelar']))
        header("Location: index.php");
    require_once("funciones.php");
    $conex = crearConexion();
    var_dump($_POST);
    if (isset($_POST['actualizar'])) {
        try {
            $conex->exec("update producto set nombre = '$_POST[nombre]', descripcion = '$_POST[descripcion]', pvp = $_POST[pvp] WHERE cod = '$_POST[codigo]'");
        } catch (PDOException $e) {
            echo "" . $e->getMessage() . "";
        }
    }
    ?>


    <div id="encabezado">
        <h1>Tarea: Edición de producto

    </div>

    <div id="contenido">
        <?php
        if (isset($_POST['cod'])) {
            $result = $conex->query("select * from producto where cod like '$_POST[cod]'");
            $producto = $result->fetchObject();
            ?>
            <h2>Producto:</h2>
            <form action="editar.php" method="POST">
                <?php
                echo "<input type='hidden' name='codigo' value='$producto->cod'>";
                echo "<h4>Nombre corto</h4><input type='text' name='nombre' value='$producto->nombre_corto'>";
                echo "<h4>Nombre</h4><textarea name='nombre'>$producto->nombre</textarea><br>";
                echo "<h4>Descripción</h4><textarea name='descripcion'>$producto->descripcion</textarea><br>";
                echo "<h4>PVP</h4><input type='text' name='pvp' value='$producto->pvp'><br>";
                ?>
                <br><input type="submit" name="actualizar" value="Actualizar"><input type="submit" name="cancelar"
                    value="Cancelar">
            </form>
        <?php }
        if (isset($_POST['codigo'])) {
            echo "Modificación realizada";
            ?>
            <form action="editar.php" method="post">
                <input type="submit" name="cancelar" value="Volver">
            </form>
            <?php
        }

        ?>
    </div>

    <div id="pie">
    </div>
</body>

</html>