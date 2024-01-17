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
            //$resultado = $stmt->get_result();
            if ($stmt->fetch_object()) {
                $usuario = true;
            } else {
                $usuario = null;
            }
            $conn->close();
        } catch (Exception $ex) {
            $usuario = false;
        }
        return $usuario;
    }

    public static function getUsuariosByDniAndPass($dni, $pass)
    {
        try {
            $conn = new conexion();
            $stmt = $conn->query("SELECT * from usuarios where DNI = '$dni' and clave = '$pass'");
            //$resultado = $stmt->get_result();
            if ($fila = $stmt->fetch_object()) {
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
            $valor = 0;
            $conn = new Conexion();
            $stmt = $conn->query("SELECT * from usuarios where DNI = '$dni'");
            while ($fila = $stmt->fetch_object()) {
                if (($fila->intentos) > 0) {
                    $conn->query("UPDATE usuarios set intentos = intentos - 1 WHERE DNI = '$dni'");
                    //return true;
                    $valor = $fila->intentos - 1;
                }
            }
            $conn->close();
            if ($valor == 0) {
                try {
                    $conn = new Conexion();
                    $conn->query("UPDATE usuarios set bloqueado= 1 WHERE DNI='$dni'");
                    $conn->close();
                    print "Cuanta Bloqueada";
                } catch (\Exception $ex) {
                    return false;
                }
            } else {
                print "Te quedan $valor intentos";
            }

        } catch (\Exception $ex) {
            return false;
        }
    }
    public static function updateIntentosCorrecto($dni)
    {
        try {
            $conn = new Conexion();
            $conn->query("UPDATE usuarios set intentos= 3 WHERE DNI='$dni'");
            $conn->close();
        } catch (\Exception $ex) {
            return false;
        }
    }

    public static function getBloqueado($dni)
    {
        try {
            $conn = new Conexion();
            $stmt = $conn->query("SELECT * from usuarios where DNI = '$dni'");
            while ($fila = $stmt->fetch_object()) {
                if (($fila->bloqueado) == 0) {
                    return true;
                }
            }
            $conn->close();
        } catch (\Exception $ex) {
            return false;
        }
    }



}








?>