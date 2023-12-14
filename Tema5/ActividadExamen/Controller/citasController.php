<?php
require_once '../Controller/provinciaController.php';
require_once '../Model/Cita.php';
require_once '../Controller/Connection.php';
class citasController
{
    public static function citasPorProvincia($provincia)
    {
        $citas = null;
        try {
            $conex = new conexion();
            $idItv = provinciaController::idProvincia($provincia);
            $stmt = $conex->query("select * from citas where id_itv = '$idItv'");
            while ($resultado = $stmt->fetchObject()) {
                $citas[] = new Cita($resultado->matricula, $resultado->id_itv, $resultado->fecha, $resultado->hora, $resultado->ficha);
            }
        } catch (Exception $ex) {
            echo "Fallo citasProvincia";
        }
        return $citas;
    }
}
