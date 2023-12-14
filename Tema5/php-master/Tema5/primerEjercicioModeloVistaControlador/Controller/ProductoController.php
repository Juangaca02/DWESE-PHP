<?php
require_once '../Model/Producto.php';
require_once '../Controller/conexion.php';

class ProductoController
{
    public static function insertar(Producto $producto)
    {
        try {
            $conex = new Conexion();
            $conex->query("insert into producto values ($producto->codigo, '$producto->nombre', $producto->precio)");
            $filasAfectadas = $conex->affected_rows;
            $conex->close();
        } catch (Exception $ex) {
            echo $ex->getTraceAsString();
            $filasAfectadas = false;
        }
        return $filasAfectadas;
    }

    public static function busarProducto($codigo)
    {
        try {
            $conex = new Conexion();
            $resultado = $conex->query("select * from producto where codigo = $codigo");
            if ($producto = $resultado->fetch_object()) {
                $conex->close();
                $p = new Producto($producto->codigo, $producto->nombre, $producto->precio);
            } else {
                $conex->close();
                $p = 0;
            }

        } catch (Exception $ex) {
            $p = false;
            echo $ex->getTraceAsString();
        }
        return $p;
    }

    public static function recuperaTodos()
    {
        try {
            $conex = new Conexion();
            $resutado = $conex->query("select * from producto");
            if ($resutado->num_rows) {
                while ($row = $resutado->fetch_assoc()) {
                    $array[] = new Producto($row['codigo'], $row['nombre'], $row['precio']);
                }
            } else {
                $array = 0;
            }
            $conex->close();
        } catch (Exception $ex) {
            $array = false;
            echo $ex->getTraceAsString();

        }
        return $array;

    }
}
?>