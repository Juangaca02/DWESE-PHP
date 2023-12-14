<?php
require_once '../Controller/Connection.php';
require_once '../Model/Vehiculo.php';

class vehiculoController
{
    /*
    public static function comprobarCliente($dni, $pass)
    {
        try {
            $conex = new conexion();
            $stmt = $conex->prepare("SELECT * from vehiculo where DNI = ?");
            if ($result = $stmt->execute([$dni])) {
                $cliente = $stmt->fetchObject();
                if (password_verify($pass, $cliente->Clave)) {
                    return new Cliente($cliente->DNI, $cliente->Nombre, $cliente->Apellido,
                        $cliente->Direccion, $cliente->Localidad, $cliente->Clave, $cliente->Tipo);
                } else {
                    $cliente = null;
                }
            } else {
                $cliente = null;
            }
        } catch (PDOException $ex) {
            echo "Fallo en el Comprobar CLiente";
            $cliente = false;
        }
        return $cliente;
    }
    */

    public static function nuevoVehiculo($vehiculo)
    {
        try {
            $conex = new conexion();
            $stmt = $conex->prepare("INSERT into vehiculo values (?,?,?,?,?,?)");
            $stmt->execute([$vehiculo->matricula, $vehiculo->marca, $vehiculo->modelo, $vehiculo->color, $vehiculo->plazas, $vehiculo->fecha_ultima_revision]);
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            echo "Fallo en el insert vehiculo";
            return false;
        }
    }





}