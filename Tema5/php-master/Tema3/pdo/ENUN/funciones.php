<?php
function crearConexion()
{
    try {
        $atributos = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_CASE => PDO::CASE_LOWER
        );
        $conex = new PDO('mysql: host=localhost; dbname=dwes; charset=utf8mb4', 'dwes', 'abc123.', $atributos);
        return $conex;
    } catch (PDOException $e) {
        die($e->getMessage());
    }

}

function crearSelectFamilias($conex, $familiaS)
{
    $result = $conex->query('select * from familia');
    echo "<select name='familia'>";
    while ($familia = $result->fetchObject()) {
        echo "<option value='$familia->cod' ";
        if ($familia->nombre == $familiaS)
            echo 'selected';
        echo ">$familia->nombre</option>";
    }
    echo "</select>";
}