<?php
require_once '../Controller/conexion.php';
require_once '../Model/Usuario.php';

class ControllerUsuarios
{
    public static function getUsuariosByDni($dni)
    {
        try {
            $conn = new conexion();
            $stmt = $conn->query("SELECT * from usuarios where DNI like '$dni'");
            $resultado = $stmt->get_result();
            if ($resultado->fetch_object()) {
                $usuario = true;
            } else {
                $usuario = null;
            }
        } catch (Exception $ex) {
            $usuario = false;
        }
        $conn->close();
        return $usuario;
    }

    public static function getUsuariosByDniAndPass($dni, $pass)
    {
        try {
            $conn = new conexion();
            $stmt = $conn->query("SELECT * from usuarios where DNI = '$dni' and clave = '$pass'");
            $resultado = $stmt->get_result();
            if ($fila = $resultado->fetch_object()) {
                $usuario = new Usuario(
                    $fila->Nombre,
                    $fila->Direccion,
                    $fila->Telefono,
                    $fila->DNI,
                    $fila->clave,
                    $fila->intentos,
                    $fila->bloqueado
                );
            } else {
                $usuario = null;
            }
        } catch (Exception $ex) {
            $usuario = false;
        }
        $conn->close();
        return $usuario;
    }
    public static function updateIntentos($dni)
    {
        try {
            $conn = new Conexion();
            $stmt = $conn->query("SELECT intentos from usuarios where DNI = '$dni'");
            if ($stmt > 0) {
                $conn->query("UPDATE usuarios set intentos= -1 WHERE DNI='$dni'");
                $conn->close();
                return true;
            }
            if ($stmt = 0) {
                return null;
            }
        } catch (\Exception $ex) {
            return false;
        }
    }
    public static function updateBloqueado($dni)
    {
        try {
            $conn = new Conexion();
            $conn->query("UPDATE usuarios set bloqueado= 0 WHERE DNI='$dni'");
            $conn->close();
        } catch (\Exception $ex) {
            return false;
        }
    }



}








?>