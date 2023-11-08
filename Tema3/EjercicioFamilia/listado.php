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
        $conex = new PDO("mysql:host=localhost;dbname=dwes;charset=utf8mb4", "dwes", "abc123.");
        $result = $conex->query("SELECT * from familia");
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
    ?>
    <div class="encabezado">
        <h1>Ejercicio Ver Familias</h1>
        <form action="" method="post">
            Familia: <select name="familia">
                <?php
                while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                    echo '<option value = "' . $row->cod . '"';
                    if (isset($_POST['mostrar']) && $_POST['familia'] == $row->cod) {
                        echo ' selected';
                    }
                    echo '>' . $row->nombre . '</option>';

                }
                ?>
            </select>
            <input type="hidden" name="codfa" value="$reg->cod">
            <input type="submit" name="mostrar" value="Mostrar Stock">
        </form>
    </div>

    <?php
    if (isset($_POST['mostrar'])) {
        try {
            $result = $conex->query("SELECT * from producto  where familia ='" . $_POST['familia'] . "';");
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        ?>
        <div class="contenido">
            <?php
            while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                ?>
                <form action="" method="POST">
                    <?php
                    echo "Producto: $row->nombre_corto , Precio $row->PVP €";
                    echo "<input type='submit' name='modificar' value='Modificar'>";
                    ?>
                </form>
                <?php
            }
            ?>
            <?php
    } ?>
    </div>
</body>

</html>