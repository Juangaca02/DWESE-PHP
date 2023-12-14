<?php
function crearConexion()
{
    try {
        $atributos = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_CASE => PDO::CASE_LOWER
        );
        $conex = new PDO('mysql: host=localhost; dbname=practicalogueo; charset=utf8mb4', 'dwes', 'abc123.', $atributos);
        return $conex;
    } catch (PDOException $e) {
        die($e->getMessage());
    }

}