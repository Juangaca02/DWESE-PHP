
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
    </form>
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
            <form action="action">
                <?php
                while ($reg = $result->fetch_object()) {
                    echo "Tienda: $reg->nombre :<input type=text name=unidades[] value=$reg->unidades> unidades <br>";
                    echo "<input type=hidden name=codigotienda[] value=$reg->cod>";
                }

                echo "<input type='hidden' name='codigoPrd' value=$_POST[producto]>";
                echo '<input type="submit" name="Actualizar" value="Actualizar">';
                ?>
            </form>
        </div>
        <?php
    }
    if (isset($_POST['Actualizar'])) {
        try {
            $stmt = $conex->prepare("UPDATE stock s tienda t set unidades = ? where t.cod = s.tienda and s.producto= ? and s.tienda= ?");
            $resultado = $conex->query("SELECT * FROM tienda;");
            while ($tienda = $resultado->fetch_object()) {
                if (isset($_POST[$tienda->nombre])) {
                    $stmt->bind_param('iss', $_POST[$tienda->nombre], $_POST['codigoPrd'], $tienda->nombre);
                    $stmt->execute();
                }
            }
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        try {
            $result = $conex->query("SELECT * FROM producto;");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    ?>
</body>
</html>
