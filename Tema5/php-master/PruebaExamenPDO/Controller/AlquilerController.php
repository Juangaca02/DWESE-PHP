<?php
require_once '../Controller/conexion.php';
require_once '../Model/Alquiler.php';

class AlquilerController
{
    public static function insertarAlquiler(Alquiler $alquiler)
    {
        try {
            $conn = new Conexion();
            $resultado = $conn->exec("insert into alquiler values(null, '$alquiler->Cod_juego', '$alquiler->DNI_cliente', '$alquiler->Fecha_alquiler', null)");
            $conn = null;
            if ($resultado) {
                return true;
            }
        } catch (\Exception $ex) {
            return false;
        }
    }

    public static function devolverJuego($cod)
    {
        try {
            $conn = new Conexion();
            $date = date("Y-m-d");
            $conn->exec("update alquiler SET Fecha_devol = '$date' WHERE id = $cod;");
            $conn = null;
        } catch (\Exception $ex) {
            return false;
        }
    }

    public static function dameMisJuegosAlquilados($dni)
    {
        try {
            $conn = new Conexion();
            $resultado = $conn->query("select * from alquiler a join juegos j on a.Cod_juego = j.Codigo where a.DNI_cliente='$dni';");
            $conn = null;
            $tabla = null;
            while ($fila = $resultado->fetchObject()) {
                $tabla[] = array("imagen" => $fila->Imagen, "nombreJuego" => $fila->Nombre_juego, "nombreConsola" => $fila->Nombre_consola, "anno" => $fila->Anno, "Fecha_alquiler" => $fila->Fecha_alquiler, "Fecha_devol" => $fila->Fecha_devol, "id" => $fila->id, "codJuego" => $fila->Cod_juego);
            }
        } catch (\Exception $ex) {
            return false;
        }
        return $tabla;
    }
}
?>