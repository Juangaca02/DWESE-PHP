
<!DOCTYPE html>
<html>
    <head>
        <link href="dwes.css" rel="stylesheet" type="text/css">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php
        try {
            $conx = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
            $result = $conx->query("Select * from producto");
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        ?>
        <div class="encabezado">
            <h1>Ejercicio 3.1.4</h1>
            <form action="" method="post">
                Producto: <select name="producto" >
                    <?php
                    while ($reg = $result->fetch_object()) {
                        echo '<option value = "' . $reg->cod . '"';
                        if (isset($_POST['mostrar']) && $_POST['producto'] == $reg->cod) {
                            echo ' selected';
                        }
                        echo '>' . $reg->nombre_corto . '</option>';
                    }
                    ?>
                </select> 
                <input type="submit" name="mostrar" value="Mostrar Stock">
            </form>
        </div>

        <?php
        if (isset($_POST['mostrar'])) {
            try {
                $result = $conx->query("Select st.unidades, ti.nombre, ti.cod from stock st, tienda ti where st.producto ='" . $_POST['producto'] . "' and st.tienda = ti.cod");
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
            ?>
            <div class="contenido">
                <form action="" method="POST">
                    <?php
                    while ($reg = $result->fetch_object()) {
                        echo 'Tienda' . $reg->nombre . ': ';
                        echo "<input type=text name=unidades[] value=$reg->unidades> unidades<br>";
                        echo "<input type=hidden name=tiendacod[] value=$reg->cod>";
                    }
                    ?>

                    <input type="hidden" name="producto" value=<?php echo $_POST['producto']; ?>>
                    <input type="submit" name="actualizar" value="Actualizar">
                </form>            

                <?php
            }
            if (isset($_POST['actualizar'])) {
                try {
                    $stmt = $conx->prepare("UPDATE stock SET unidades=? WHERE tienda=? AND producto='$_POST[producto]'");
                    for ($i = 0; $i < count($_POST['tiendacod']); $i++) {
                        $stmt->bind_param('ii', $_POST['unidades'][$i], $_POST['tiendacod'][$i]);
                        $stmt->execute();
                    }
                } catch (Exception $ex) {
                    die($ex->getMessage());
                }
                echo "<h2>STOCK ACTUALIZADO";
                $stmt->close();
                /* echo $_POST['producto']."<br>";
                  print_r($_POST['unidades']);
                  print_r($_POST['tiendacod']); */
            }
            $conx->close();
            ?>

        </div>
    </body>
</html>
