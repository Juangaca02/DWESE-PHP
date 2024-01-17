<?php
require_once '../Controller/conexion.php';
require_once '../Model/Cuentas.php';

class ControllerCuentas
{
    public static function getCuentasByDNI($dni)
    {
        try {
            $conn = new conexion();
            $stmt = $conn->query("SELECT * from cuentas where dni_cuenta = '$dni'");
            //$resultado = $stmt->get_result();
            $cuentas = array(); // Crear un array para almacenar múltiples cuentas
            while ($fila = $stmt->fetch_object()) {
                $cuenta = new Cuentas(
                    $fila->iban,
                    $fila->saldo,
                    $fila->dni_cuenta
                );
                $cuentas[] = $cuenta; // Agregar cada usuario al array
            }
            if (empty($cuentas)) {
                $cuentas = null;
            }
        } catch (Exception $ex) {
            $cuentas = false;
        }

        $conn->close();
        return $cuentas;

    }
}