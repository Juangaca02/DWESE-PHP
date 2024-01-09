<?php
if (isset($_POST['Consultar'])) {
    if (isset($_POST['provincias'])) {
        $provincia = $_POST['provincias'];
        echo "<h2>La opción seleccionada es: " . $provincia . "</h2>";
        $dato = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=" . $provincia . ",ES&lang=sp&units=metric&APPID=b49804be4dc3fedea367f4899cc3ad3c");
        $tiempo = json_decode($dato);

        echo "<br><strong>Temperatura min:</strong> " . $tiempo->main->temp_min . " Celcius";
        echo "<br><strong>Temperatura Ahora</strong>: " . $tiempo->main->temp . " Celcius";
        echo "<br><strong>Temperatura max:</strong> " . $tiempo->main->temp_max . " Celcius";
        echo "<br><strong>Humedad:</strong> " . $tiempo->main->humidity . "%";
        echo "<br><strong>Precion Atmosferica:</strong> " . $tiempo->main->pressure . " hPa";
        echo "<br><strong>Icono:</strong><br><img src='https://openweathermap.org/img/wn/" . $tiempo->weather[0]->icon . "@2x.png'> ";
    } else {
        echo "No se seleccionó ninguna opción.";
    }
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <form action="" method="POST">
        <strong>De donde quieres saber el Clima?</strong>
        <select name="provincias" id="provincias">
            <option value="Huelva" <?php
            if (isset($_POST['Consultar']) && $_POST['provincias'] == "Huelva") {
                echo ' selected';
            }
            ?>>Huelva</option>
            <option value="Sevilla" <?php
            if (isset($_POST['Consultar']) && $_POST['provincias'] == "Sevilla") {
                echo ' selected';
            }
            ?>>Sevilla</option>
            <option value="Córdoba" <?php
            if (isset($_POST['Consultar']) && $_POST['provincias'] == "Córdoba") {
                echo ' selected';
            }
            ?>>Cordoba</option>
            <option value="Jaen" <?php
            if (isset($_POST['Consultar']) && $_POST['provincias'] == "Jaen") {
                echo ' selected';
            }
            ?>>Jaen</option>
            <option value="Cadiz" <?php
            if (isset($_POST['Consultar']) && $_POST['provincias'] == "Cadiz") {
                echo ' selected';
            }
            ?>>Cadiz</option>
            <option value="Málaga" <?php
            if (isset($_POST['Consultar']) && $_POST['provincias'] == "Málaga") {
                echo ' selected';
            }
            ?>>Malaga</option>
            <option value="Granada" <?php
            if (isset($_POST['Consultar']) && $_POST['provincias'] == "Granada") {
                echo ' selected';
            }
            ?>>Granada</option>
        </select>
        <input type="submit" name="Consultar" value="Consultar">
    </form>

</body>

</html>