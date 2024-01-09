<?php
$dato = file_get_contents("https://api.openweathermap.org/data/2.5/weather?lat=37.43732326985545&lon=-4.1972685747899&units=metric&appid=b49804be4dc3fedea367f4899cc3ad3c");
$tiempo = json_decode($dato);
var_dump($tiempo);

echo "<br>Temperatura: " . $tiempo->main->temp;
