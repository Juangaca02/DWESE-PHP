<?php

function crearConexion()
{
    try {
        $atributos = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_CASE => PDO::CASE_LOWER
        );
        $conex = new PDO('mysql: host=localhost; dbname=autobuses; charset=utf8mb4', 'dwes', 'abc123.', $atributos);
        return $conex;
    } catch (PDOException $e) {
        die($e->getMessage());
    }

}

function validarPlazas($conex, $n, $matricula)
{
    $result = $conex->query("select num_plazas from autos where matricula = '$matricula'");
    $row = $result->fetchObject();
    if ($row->num_plazas >= $n) {
        return true;
    } else {
        return false;
    }
}

function crearSelectOrigen($conex, $origenP)
{
    $result = $conex->query('select origen from viajes group by origen');
    echo "<select name='origen' >";
    while ($origen = $result->fetchObject()) {
        echo "<option value='$origen->origen' ";
        if ($origen->origen == $origenP)
            echo 'selected';
        echo ">$origen->origen</option>";
    }
    echo "</select>";
}

function crearSelectDestino($conex, $destinoP)
{
    $result = $conex->query('select destino from viajes group by destino');
    echo "<select name='destino' >";
    while ($destino = $result->fetchObject()) {
        echo "<option value='$destino->destino' ";
        if ($destino->destino == $destinoP)
            echo 'selected';
        echo ">$destino->destino</option>";
    }
    echo "</select>";
}


function crearSelectMatricula($conex)
{
    try {
        $result = $conex->query("select matricula from autos");
        echo "<select name='matricula'>";
        while ($row = $result->fetchObject()) {
            echo "<option value='$row->matricula'>$row->matricula</option>";
        }
        echo "</select>";
    } catch (PDOException $e) {
        die($e->getMessage());
    }

}

function crearSelectMatriculaSeleccionada($conex, $matricula)
{
    try {
        $result = $conex->query("select matricula from autos");
        echo "<select name='matricula'>";
        while ($row = $result->fetchObject()) {
            echo "<option value='$row->matricula'";
            if ($row->matricula == $matricula) {
                echo " selected";
            }
            echo ">$row->matricula</option>";
        }
        echo "</select>";
    } catch (PDOException $e) {
        die($e->getMessage());
    }

}

function mostrarViaje($viaje)
{
    echo "Fecha: $viaje->fecha<br>"
        . "Matricula: $viaje->matricula<br>"
        . "Origen: $viaje->origen<br>"
        . "Destino: $viaje->destino<br>"
        . "Plazas libres: $viaje->plazas_libres<br>";
}


?>