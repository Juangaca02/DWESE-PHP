<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of CitasController
 *
 * @author Aguayo
 */
require_once '../controller/Conexion.php';
require_once '../model/Cita.php';
class CitasController {
    //traemos todas las citas de una itv usando la id
    public static function getCitasByLocalidad($itv) {
        $cita = null;
        try{
            $conex = new Conexion();
            $stmt = $conex->prepare("select * from citas where id_itv = ?");
            $stmt->execute([$itv]);
            if($result = $stmt->fetchObject()){
                $cita[] = new Cita($result->matricula, $result->id_itv, $result->fecha, $result->hora, $result->ficha);
            }
        } catch (PDOException $ex) {
            echo "Fallo en getCitaByLocalidad";
        }
        return $cita;
    }
    
    //devolvemos la cita que tiene un coche
    public static function getCitaByMatricula($matricula) {
        $cita = null;
        try{
            $conex = new Conexion();
            $stmt = $conex->prepare("select * from citas where matricula = ?");
            $stmt->execute([$matricula]);
            if($result = $stmt->fetchObject()){
                $cita = new Cita($result->matricula, $result->id_itv, $result->fecha, $result->hora, $result->ficha);
            }
        } catch (PDOException $ex) {
            echo "Fallo en getCitaVyMatricula";
        }
        return $cita;
    }
    
    //agregamos las citas
    public static function addCita($cita) {
        try{
            $conex = new Conexion();
            $stmt = $conex->exec("insert into citas values ('$cita->matricula', '$cita->id_itv', '$cita->fecha', '$cita->hora', '$cita->ficha')");
            if($stmt > 0){
                return true;
            }
        } catch (PDOException $ex) {
            echo "Fallo en getCitaVyMatricula";
        }
        return false;
    }
    
    //borramos las citas
    public static function deleteCita($cita) {
        try{
            $conex = new Conexion();
            $stmt = $conex->exec("delete from citas where matricula = '$cita->matricula' and id_itv = '$cita->id_itv' and fecha = '$cita->fecha' and hora = '$cita->hora'");
            if($stmt > 0){
                return true;
            }
        } catch (PDOException $ex) {
            echo "Fallo en getCitaVyMatricula";
        }
        return false;
    }
}
