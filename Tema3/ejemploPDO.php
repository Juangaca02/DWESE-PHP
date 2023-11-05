<?php
/*
try {
    $opciones = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ);
    $conex = new PDO("mysql:host=localhost;dbname=dwes;charset=utf8mb4", "dwes", "abc123.");
    $conex = new PDO('mysql:host=localhost;dbname=dwes', 'dwes', 'abc123.');
    $conex->beginTransaction();
    $reg = $conex->exec("UPDATE stock SET unidades = 100 WHERE producto = '3DSNG'");
    $conex->commit();
    $result = $conex->query("SELECT * FROM producto");
} catch (PDOException $e) {
    die("Fallido" . $e->getMessage());
}
echo "Filas afectadas $reg";


if ($result->rowCount()) {
    while ($fila = $result->fetch()) {
        echo "Producto <br>";
        echo "Nombre: $fila->nombre_corto  Codigo: $fila->cod <br>";
    }
}

*/
try {
    $opciones = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ);
    $conex = new PDO("mysql:host=localhost;dbname=dwes;charset=utf8mb4", "dwes", "abc123.");
    $result = $conex->prepare("SELECT * from producto where PVP>:pvp1 && PVP<:pvp2 ");
} catch (PDOException $ex) {
    die($ex->getMessage());
}

for ($i = 0; $i < 1000; $i += 100) {
    $j = $i + 100;
    $result->bindParam(":pvp1", $i);
    $result->bindParam(":pvp2", $j);
    $result->execute();

    echo "*******Productos $i y $j*******<br>";
    while ($fila = $result->fetch(PDO::FETCH_OBJ)) {
        echo "Nombre: $fila->nombre_corto <br>Codigo: $fila->cod <br>Precio $fila->PVP$<br>";
        echo "=====================================<br>";
    }
}
?>