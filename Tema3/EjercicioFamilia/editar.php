<!DOCTYPE html>
<html>

<head>
    <link href="dwes.css" rel="stylesheet" type="text/css">
    <meta charset="UTF-8">
    <title>Editar Producto</title>
</head>

<body>
    <h1>Editar producto</h1>
    <?php
    if (isset($_POST["modificar"])) {
        try {
            $conex = new PDO("mysql:host=localhost;dbname=dwes;charset=utf8mb4", "dwes", "abc123.");
            $result = $conex->query("SELECT * from familia");
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        ?>
        <div class="contenido">
            <form action="listado-php" method="POST">
                Nombre_Corto: <input type='text' name='nombre_Corto' values="<?php ?>"> <br>
                Nombre: <textarea name="nombre" cols="50" rows="5"></textarea><br>
                Descripcion: <textarea name="descripcion" cols="100" rows="10"></textarea><br>
                PVP: <input type='number' name='pvp'><br>
                <input type='submit' name='actualzar' values="Actualzar">
                <input type='submit' name='cancelar' values="Cancelar">
            </form>
        </div>
        <?php
    }
    ?>
</body>

</html>