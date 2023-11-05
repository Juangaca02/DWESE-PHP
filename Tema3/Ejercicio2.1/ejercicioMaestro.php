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
    } catch (Exception $ex) {
        die($ex->getMessage());
    }
    ?>
    <div class="encabezado">
        <h1>Ejercicio 3.1.4</h1>
        <form action="" method="post">
            Producto: <select name="producto">
                <?php
                while ($reg = $result->fetch(PDO::FETCH_OBJ)) {
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

    </div>
</body>

</html>