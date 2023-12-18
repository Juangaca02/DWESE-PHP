<?php
require_once '../Controller/Connection.php';
class itvsController
{
    public static function itvsPorProvincia($provincia)
    {
        try {
            $conex = new Conexion();
            $stmt = $conex->query("SELECT * from itvs where provincia = '$provincia'");
            $conex = null;
            $cita = null;
            while ($resultado = $stmt->fetchObject()) {
                $cita[] = array("id" => $resultado->id, "provincia" => $resultado->provincia, "localidad" => $resultado->localidad,
                    "direccion" => $resultado->direccion, "telefono" => $resultado->telefono, );
            }

        } catch (\Exception $ex) {
            echo "Fallo citasProvincia";
            return false;
        }
        return $cita;
    }
}
