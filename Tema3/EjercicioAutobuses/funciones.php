<?php
function crearConexion()
{
    try {
        $conex = new PDO("mysql:host=localhost;dbname=autobuses;charset=utf8mb4", "dwes", "abc123.");
        return $conex;
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}