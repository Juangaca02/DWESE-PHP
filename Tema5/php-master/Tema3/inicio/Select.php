<?php

try {
    $conex = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
    $conex->set_charset("utf8mb4");
} catch (Exception $ex) {
    die($ex->getMessage());
}

try {
    $result = $conex->query("select * from producto");
    echo $result->num_rows;
    while ($fila = $result->fetch_array())
        echo $fila[0] . " " . $fila['nombre_corto'] . "<br>";
    while ($fila = $result->fetch_object()) {
        echo $fila->cod;
    }
    //data_seek(5) devolveria el puntero a la posicion 5
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$conex->close();
?>