<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of VehiculoController
 *
 * @author Aguayo
 */

require_once '../controller/Conexion.php';
require_once '../model/Vehiculo.php';
class VehiculoController
{

    //recojo el vehiculo por la matricula
    public static function getVehiculoByMatricula($matricula)
    {
        $vehiculo = null;
        try {
            $conex = new Conexion();
            $stmt = $conex->query("SELECT * from vehiculo where matricula = '$matricula'");
            if ($result = $stmt->fetchObject()) {
                $vehiculo = new Vehiculo(
                    $result->matricula,
                    $result->marca,
                    $result->modelo,
                    $result->color,
                    $result->plazas,
                    $result->fecha_ultima_revision
                );
            }
        } catch (PDOException $ex) {
            echo "Fallo en getvehiculobyMatricula";
        }
        return $vehiculo;
    }

    //modifico la fecha de la ultima revision
    public static function moficiarFechaRevision($fecha, $matricula)
    {
        try {
            $conex = new Conexion();
            $stmt = $conex->query("UPDATE vehiculo SET fecha_ultima_revision = '$fecha' WHERE matricula = '$matricula';");
            if ($stmt > 0) {
                return true;
            }
        } catch (PDOException $ex) {
            echo "Fallo en getvehiculobyMatricula";
        }
        return false;
    }
}
