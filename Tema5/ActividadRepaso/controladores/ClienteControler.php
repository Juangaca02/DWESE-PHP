<?php
require_once '../controladores/Connection.php';
require_once '../clases/Cliente.php';

class ClienteControler
{
    public static function comprobarCliente($dni, $pass)
    {
        try {
            $conex = new conexion();
            $stmt = $conex->prepare("SELECT * from cliete where DNI = ?");
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

    public static function nuevoCLiente($cliente)
    {
        try {
            $conex = new conexion();
            $stmt = $conex->prepare("INSERT into cliente values (?,?,?,?,?,?,?)");
            $stmt->execute([$cliente->dni, $cliente->nombre, $cliente->apellido, $cliente->direccion, $cliente->localidad, $cliente->clave, $cliente->tipo]);
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            echo "Fallo en el insert Cliente";
            return false;
        }
    }





}