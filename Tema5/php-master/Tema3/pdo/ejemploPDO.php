<?php
try {

    $conex = new PDO('mysql: host=localhost; dbname=dwes; charset=utf8mb4', 'dwes', 'abc123.');
    //    $conn->beginTransaction(); // Desabilita el autocommit
//   $row = $conn->exec("UPDATE stock SET unidades=100 WHERE producto='ACERAX3950'");
//    $row2 = $conn->exec("UPDATE stock SET unidades=200 WHERE producto='3DSNG'");
//    $conn->commit();
    $result = $conex->query("select * from producto");
} catch (PDOException $e) {
    // echo "" . $e->getMessage();
    // $conn->rollback();
}
while ($fila = $result->fetchObject()) {
    echo "Codigo $fila->cod<br>";
    echo "Nombre $fila->nombre<br>";
    echo "===============================<br>";
}
?>