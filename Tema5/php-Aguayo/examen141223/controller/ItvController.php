<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of ItvController
 *
 * @author Aguayo
 */
require_once '../controller/Conexion.php';
require_once '../model/Itv.php';
class ItvController
{
    //el listado de las itv por provincias
    public static function listadoItvProvincia($provincnia)
    {
        $itvs = null;
        try {
            $conex = new Conexion();
            $stmt = $conex->query("SELECT * from itvs where provincia = '$provincnia'");
            while ($result = $stmt->fetchObject()) {
                $itvs[] = new Itv(
                    $result->id,
                    $result->provincia,
                    $result->localidad,
                    $result->direccion,
                    $result->telefono
                );
            }
            $stmt = null;
            $conex = null;
        } catch (PDOException $ex) {
            echo "Fallo en listadoItvProcincia";
        }
        return $itvs;
    }

    //el listado de las itvs por su id
    public static function getItvById($id)
    {
        $itv = null;
        try {
            $conex = new Conexion();
            $stmt = $conex->query("SELECT * from itvs where id = '$id'");
            if ($result = $stmt->fetchObject()) {
                $itv = new Itv(
                    $result->id,
                    $result->provincia,
                    $result->localidad,
                    $result->direccion,
                    $result->telefono
                );
            }
            $stmt = null;
            $conex = null;
        } catch (PDOException $ex) {
            echo "Fallo en listadoItvProcincia";
        }
        return $itv;
    }

    //me equivoqué y realize este metodo por que creia que servia de algo
    public static function getAllItv()
    {
        $itvs = null;
        try {
            $conex = new Conexion();
            $stmt = $conex->query("SELECT * from itvs");
            while ($result = $stmt->fetchObject()) {
                $itvs[] = new Itv(
                    $result->id,
                    $result->provincia,
                    $result->localidad,
                    $result->direccion,
                    $result->telefono
                );
            }
            $stmt = null;
            $conex = null;
        } catch (PDOException $ex) {
            echo "Fallo en listadoItvProcincia";
        }
        return $itvs;
    }
}
