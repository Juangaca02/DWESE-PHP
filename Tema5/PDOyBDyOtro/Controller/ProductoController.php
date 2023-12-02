<?php
require_once "../Model/Producto.php";
require_once "../Controller/Connection.php";
class ProductoController
{
    public static function insertar(Producto $producto)
    {
        try {
            $conex = new Connection();
            $conex->query("INSERT into productos values ($producto->codigo, '$producto->nombre', $producto->precio)");
            $reg = $conex->affected_rows;
            $conex->close();
        } catch (Exception $ex) {
            //die($ex->getTraceAsString());
            $reg = false;
        }
        return $reg;
    }

    public static function buscarProductos($cod)
    {
        try {
            $conex = new Connection();
            $result = $conex->query("SELECT * from productos where codigo='$cod'");
            if ($result->num_rows) {
                if ($producto = $result->fetch_object()) {
                    return new Producto("$producto->codigo", "$producto->nombre", "$producto->precio");
                }
                //$p = $result->fetch_object()
                //$p = new self("$producto->codigo", "$producto->nombre", "$producto->precio");
            } else {
                $p = 0;
            }
        } catch (Exception $ex) {
            //die($ex->getTraceAsString());
            $p = false;
        }
        //return $p;
    }

    public static function recuperaTodo()
    {
        try {
            $conex = new Connection();
            $result = $conex->query("SELECT * from productos");
            if ($result->num_rows) {
                while ($reg = $result->fetch_object()) {
                    $p = new Producto("$reg->codigo", "$reg->nombre", "$reg->precio");
                    $products[] = $p;
                }
            } else {
                $products = 0;
            }
        } catch (Exception $ex) {
            //die($ex->getTraceAsString());
            $p = false;
            $products = false;
        }
        return $products;
    }
}

?>