<?php
require_once '../Controller/conexion.php';
require_once '../Model/Cliente.php';

class ClienteController
{
    public static function buscarCliente($dni, $clave)
    {
        try {
            $conn = new Conexion();
            //$resultado = $conn->query("select * from cliente where DNI like '$dni';");
            $stmt = $conn->prepare("SELECT * from cliente where DNI like ?;");
            $stmt->execute([$dni]);
            if ($fila = $stmt->fetchObject()) {
                if (password_verify($clave, $fila->Clave)) {
                    $cliente = new Cliente(
                        $fila->DNI,
                        $fila->Nombre,
                        $fila->Apellidos,
                        $fila->Direccion,
                        $fila->Localidad,
                        $fila->Clave,
                        $fila->Tipo
                    );
                } else {
                    $cliente = null;
                }
            } else {
                $cliente = null;
            }
        } catch (Exception $ex) {
            $cliente = false;
            //throw $th;
        }
        $conn = null;
        return $cliente;
    }

    public static function insertarCliente(Cliente $cliente)
    {
        try {
            $conn = new Conexion();
            $resultado = $conn->exec("INSERT into cliente values('$cliente->dni', '$cliente->nombre', '$cliente->apellidos', '$cliente->direccion', '$cliente->localidad', '$cliente->clave', '$cliente->tipo')");
            $conn = null;
            if ($resultado) {
                return true;
            }
        } catch (\Exception $ex) {
            return false;
        }
    }
}