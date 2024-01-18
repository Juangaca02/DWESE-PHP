<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <form action="" method="POST">
        <label>Cuantas Cartas Desas optener?</label>
        <input type="number" name="numCartas" value="1" required>
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>
<?php
if (isset($_POST['enviar'])) {
    $datos = file_get_contents("http://localhost/DWESE-PHP/Tema6/REST/Actividades/ejercicio4/myserver.php?numCartas=$_POST[numCartas]");
    $productos = json_decode($datos);
    foreach ($productos as $value) {
        echo $value . "<br>";
    }
}
?>

</html>