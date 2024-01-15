<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <form action="" method="POST">
        <label>Cuantas Cartas Desas optener?</label>
        <input type="number" name="numCarta" value="1" min="0">
        <input type="submit" name="Consultar" value="Consultar">
    </form>
</body>
<?php
if (isset($_POST['Consultar'])) {
    if (isset($_POST['numCarta'])) {
        $datos = file_get_contents("http://localhost/DWESE-PHP/Tema6/REST/Actividades/ejercicio4/myserver.php?conversion=" . $_POST['numCarta']);
        echo $datos;
        $productos = json_decode($datos);
        echo $productos;
    }
}
?>

</html>