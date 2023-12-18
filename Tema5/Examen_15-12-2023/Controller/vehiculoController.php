<?php
require_once '../Controller/Connection.php';
require_once '../Model/Vehiculo.php';

class vehiculoController
{

    public static function comprobarMatricula($matricula)
    {
        try {
            $conex = new conexion();
            $stmt = $conex->prepare("SELECT * from vehiculo where matricula = ?");
            $stmt->execute([$matricula]);
            $conex = null;
            $vehiculoBuscado = null;
            if ($resultado = $stmt->fetchObject()) {
                //$coche = new Vehiculo($resultado->matricula, $resultado->marca, $resultado->modelo, $resultado->color, $resultado->plazas, $resultado->fecha_ultima_revision);
                $vehiculoBuscado[] = array("matricula" => $resultado->matricula, "marca" => $resultado->marca,
                    "modelo" => $resultado->modelo, "color" => $resultado->color, "plazas" => $resultado->plazas,
                    "fecha_ultima_revision" => $resultado->fecha_ultima_revision);
            }
        } catch (PDOException $ex) {
            echo "Fallo en el Comprobar CLiente";
            return false;
        }
        return $vehiculoBuscado;
    }
}