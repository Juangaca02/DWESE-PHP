<?php
require_once '../Controller/Connection.php';
class provinciaController
{
    public static function idProvincia($provincia)
    {
        $id = null;
        try {
            $conex = new conexion();
            $stmt = $conex->query("SELECT id from itvs where provincia = '$provincia'");
            if ($resultado = $stmt->fetchObject()) {
                $id = $resultado->id;
            }
        } catch (PDOException $ex) {
            echo "Fallo en idProvincia";
        }
        return $id;
    }

    public static function provinciaID($id)
    {
        $provincia = null;
        try {
            $conex = new conexion();
            $stmt = $conex->query("select provincia from itvs where id = '$id'");
            if ($resultado = $stmt->fetchObject()) {
                $provincia = $resultado->provincia;
            }
        } catch (PDOException $ex) {
            echo "Fallo en idProvincia";
        }
        return $provincia;
    }
}
