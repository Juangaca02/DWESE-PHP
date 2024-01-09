<?php
$conex = new PDO("mysql:host=localhost;dbname=dwes;charset=utf8mb4", "dwes", "abc123.");

if (isset($_GET['pvp'])) {
    $result = $conex->query("SELECT * from producto where pvp > " . $_GET['pvp']);
} else {
    $result = $conex->query("SELECT * from producto");
}


$i = 0;
while ($reg = $result->fetchObject()) {
    $datos[$i]['codigo'] = $reg->cod;
    $datos[$i]['nombre'] = $reg->nombre_corto;
    $datos[$i]['pvp'] = $reg->PVP;
    $i++;
}
echo json_encode($datos);



?>