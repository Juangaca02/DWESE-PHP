<?php
require_once '../Controller/conexion.php';
require_once '../Model/Cuentas.php';
require_once '../Model/Transferencias.php';

class ControllerCuentas
{
    public static function getAllCuentas()
    {
        try {
            $conn = new conexion();
            $stmt = $conn->query("SELECT * FROM cuentas");
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
    public static function getHistorialByIBAN($iban)
    {
        try {
            $conn = new conexion();
            $stmt = $conn->query("SELECT * FROM transferencias WHERE iban_origen = '$iban' OR iban_destino = '$iban'");
            //$resultado = $stmt->get_result();
            $transferencias = array(); // Crear un array para almacenar múltiples transferencias
            while ($fila = $stmt->fetch_object()) {
                $transferencia = new Transferencias(
                    $fila->iban_origen,
                    $fila->iban_destino,
                    $fila->fecha,
                    $fila->cantidad
                );
                $transferencias[] = $transferencia; // Agregar cada usuario al array
            }
            if (empty($transferencias)) {
                $transferencias = null;
            }
        } catch (Exception $ex) {
            $transferencias = false;
        }

        $conn->close();
        return $transferencias;

    }

    public static function doTransferencia($saldoPosterior, $cantidad, $comision, $iban_Origen, $iban_Destino)
    {

        try {
            $date = date("d/m/Y - H:i:s");
            $horaActualMilisegundos = strtotime($date);
            $conn = new Conexion();
            $conn->query("UPDATE cuentas set saldo = saldo - $saldoPosterior WHERE iban='$iban_Origen'");
            $conn->query("UPDATE cuentas set saldo = saldo + $cantidad WHERE iban='$iban_Destino'");
            $conn->query("UPDATE cuentas set saldo = saldo + $comision WHERE iban='ES2099999999999999999999'");
            $conn->query("INSERT into transferencias values('$iban_Origen','$iban_Destino','$horaActualMilisegundos','$cantidad')");
            $conn->close();
            print "Cuanta Bloqueada";
        } catch (\Exception $ex) {
            return false;
        }
    }

    //-------------------------------------------------------------------------------------------------------------------------------------

    public static function selectMatricula($matricula)
    {
        try {
            $conn = new Conexion();
            $stmt = $conn->prepare("SELECT citas., itvs. FROM citas JOIN itvs ON citas.id_itv = itvs.id WHERE citas.matricula = ?");
            if ($stmt->execute([$matricula])) {
                if ($o = $stmt->fetch()) {
                    return array("matricula" => $o->matricula, "hora" => $o->hora, "fecha" => $o->fecha, "localidad" => $o->localidad, "provincia" => $o->provincia);
                }
            }
        } catch (PDOException $ex) {
            echo $ex->getTraceAsString();
        }
        return null;
    }

    public static function dameMisJuegosAlquilados($dni)
    {
        try {
            $conn = new Conexion();
            $resultado = $conn->query("SELECT * from alquiler a join juegos j on a.Cod_juego = j.Codigo where a.DNI_cliente='$dni';");
            $conn->close();
            $tabla = null;
            while ($fila = $resultado->fetch_object()) {
                $tabla[] = array("imagen" => $fila->Imagen, "nombreJuego" => $fila->Nombre_juego, "nombreConsola" => $fila->Nombre_consola, "anno" => $fila->Anno, "Fecha_alquiler" => $fila->Fecha_alquiler, "Fecha_devol" => $fila->Fecha_devol, "id" => $fila->id, "codJuego" => $fila->Cod_juego);
            }
        } catch (\Exception $ex) {
            return false;
        }
        return $tabla;
    }
}
foreach ($tabla as $fila) {
    $nuevaFecha = date("Y-m-d", strtotime($fila["Fecha_alquiler"] . " +7 days"));
    echo "<tr>";
    echo "<td><img src='$fila[imagen]' width='50px' heigth='50px'></td>";
    echo "<td>$fila[nombreJuego]</td>";
    echo "<td>$fila[nombreConsola]</td>";
    echo "<td>$fila[anno]</td>";
    echo "<td>$fila[Fecha_alquiler]</td>";
    echo "<td>$nuevaFecha</td>";
    if ($fila["Fecha_devol"] == null)
        echo " <td>
                <form action='' method='POST'>
                    <input type='hidden' name='codAlquilar' value='$fila[id]'>
                        <input type='hidden' name='codJuego' value='$fila[codJuego]'>
                        <input type='submit' name='devolver' value='Devolver'>
                    </form>
            </td>";
    else
        echo "<td>$fila[Fecha_devol]</td>";
    echo "</tr>";

}

