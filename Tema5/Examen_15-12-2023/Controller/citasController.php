<?php
require_once '../Model/Cita.php';
require_once '../Controller/Connection.php';
class citasController
{
    public static function comprobarCita($matricula, $provincia)
    {

        try {
            $conex = new Conexion();
            $stmt = $conex->prepare("SELECT * from citas c join vehiculo v on c.matricula = v.matricula join itvs i on c.id_itv = i.id where c.matricula=?and i.provincia = ?");
            $stmt->execute([$matricula, $provincia]);
            $conex = null;
            $cita = null;
            while ($resultado = $stmt->fetchObject()) {
                $cita[] = array("matricula" => $resultado->matricula, "id_itv" => $resultado->id_itv, "fecha" => $resultado->fecha,
                    "hora" => $resultado->hora, "ficha" => $resultado->ficha, "marca" => $resultado->marca, "modelo" => $resultado->modelo,
                    "color" => $resultado->color, "plazas" => $resultado->plazas, "fecha_ultima_revision" => $resultado->fecha_ultima_revision,
                    "id" => $resultado->id, "provincia" => $resultado->provincia, "localidad" => $resultado->localidad, "direccion" => $resultado->direccion,
                    "telefono" => $resultado->telefono);
            }

        } catch (PDOException $ex) {
            echo "Fallo citasProvincia";
            return false;
        }
        return $cita;
    }
}
