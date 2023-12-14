<?php
try {
    $conex = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
    //$stmt = $conex->prepare("insert into tienda (nombre,tlf) values (?, ?)");
    $stmtSelec = $conex->prepare("select nombre_corto, descripcion, PVP from producto where PVP > ?");
} catch (Exception $ex) {
    die($ex->getMessage());
}

/*$nombre = "SUACURSAL3";
$tlf = "123456789";

$tienda = array(
    array(
        "nombre" => "sucursal3",
        "tlf" => 123456789,
    ),
    array(
        "nombre" => "sucursal4",
        "tlf" => 123456789,
    ),
    array(
        "nombre" => "sucursal5",
        "tlf" => 123456789,
    ),
    array(
        "nombre" => "sucursal6",
        "tlf" => 123456789,
    )
);

foreach ($tienda as $fila) {
    $stmt->bind_param("si", $fila["nombre"], $fila["tlf"]);
    try {
        $stmt->execute();
        echo "Registro insertado<br>";
    } catch (Exception $ex) {
        echo "Fallo al insertar";
    }
}*/

//Formato fetch
$precios = array(100, 200, 30, 400);

foreach ($precios as $value) {
    $stmtSelec->bind_param("i", $value);
    $stmtSelec->execute();
    $stmtSelec->bind_result($nombre, $desc, $precio);
    while ($stmtSelec->fetch()) {
        echo "$nombre, $desc, $precio<br><br>";
    }
}

//Formato objeto
$precios = array(100, 200, 30, 400);

foreach ($precios as $value) {
    $stmtSelec->bind_param("i", $value);
    $stmtSelec->execute();
    $result = $stmtSelec->get_result();
    while ($fila = $result->fetch_object()) {
        echo "$fila->nombre_corto, $fila->descripcion, $fila->PVP<br><br>";
    }
}


?>