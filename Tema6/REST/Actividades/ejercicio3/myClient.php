<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <form action="" method="POST">
        <label>Selecciones que opcion desea:</label>
        <select name="option">
            <option value="1" <?php
            if (isset($_POST['Consultar']) && $_POST['option'] == 1) {
                echo ' selected';
            } ?>>Euro
                a Dolar</option>
            <option value="2" <?php
            if (isset($_POST['Consultar']) && $_POST['option'] == 2) {
                echo ' selected';
            } ?>>Euro
                a Libra</option>
            <option value="3" <?php
            if (isset($_POST['Consultar']) && $_POST['option'] == 3) {
                echo ' selected';
            } ?>>Dolar
                a Euro</option>
            <option value="4" <?php
            if (isset($_POST['Consultar']) && $_POST['option'] == 4) {
                echo ' selected';
            } ?>>Dolar
                a Libra</option>
            <option value="5" <?php
            if (isset($_POST['Consultar']) && $_POST['option'] == 5) {
                echo ' selected';
            } ?>>Libra
                a Dolar</option>
            <option value="6" <?php
            if (isset($_POST['Consultar']) && $_POST['option'] == 6) {
                echo ' selected';
            } ?>>Libra
                a Euro</option>
        </select>
        <br>
        <label>Introduzca la cantidad a convetir</label>
        <input type="text" name="dinero" value="0">
        <input type="submit" name="Consultar" value="Consultar">
    </form>
</body>
<?php
if (isset($_POST['Consultar'])) {
    if (isset($_POST['option'])) {
        $conversion = $_POST['option'];
        $dinero = $_POST['dinero'];
        $datos = file_get_contents("http://localhost/DWESE-PHP/Tema6/REST/Actividades/ejercicio3/myserver.php?conversion=" . $conversion . "&dinero=" . $dinero);
        $productos = json_decode($datos);
        echo $productos;

    }
}

?>

</html>