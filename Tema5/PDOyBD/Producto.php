<?php
require_once "Connection.php";


class Producto
{

    public $codigo;
    public $nombre;
    public $precio;

    public function __construct($cod = 0, $nom = "", $pre = 0)
    {
        $this->codigo = $cod;
        $this->nombre = $nom;
        $this->precio = $pre;
    }

    public function modProducto($cod, $nom, $pre)
    {
        $this->codigo = $cod;
        $this->nombre = $nom;
        $this->pre = $pre;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __toString()
    {
        return "<br>-Codigo: $this->codigo <br>-Nombre: $this->nombre <br>-Precio: $this->precio";
    }


    public function insertar()
    {
        try {
            $conex = new Connection();
            $conex->query("INSERT into productos values ($this->codigo, '$this->nombre', $this->precio)");
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
                    return new self("$producto->codigo", "$producto->nombre", "$producto->precio");
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
                    $p = new self("$reg->codigo", "$reg->nombre", "$reg->precio");
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