<?php
require_once '../Controller/conexion.php';
require_once '../Model/Juego.php';

class JuegoController
{
    public static function obtenerCodigo($cadena, $consola)
    {
        $palabras = explode(" ", $cadena);

        $primerasLetras = "";
        foreach ($palabras as $palabra) {
            $primerasLetras .= substr($palabra, 0, 1);
        }

        return $primerasLetras . "-" . $consola;
    }

    public static function modificarUnJuego(Juego $juego)
    {
        try {
            $conn = new Conexion();
            $nuevoCod = JuegoController::obtenerCodigo($juego->nombreJuego, $juego->nombreConsola);
            $conn->exec("update juegos set Codigo= '$nuevoCod',Nombre_juego='$juego->nombreJuego',Nombre_consola='$juego->nombreConsola',Anno='$juego->anno',Precio='$juego->precio',Alguilado='$juego->alquilado',descripcion='$juego->descripcion' WHERE Codigo='$juego->codigo'");
            $conn = null;
        } catch (\Exception $ex) {
            return false;
        }
    }

    public static function alquilarJuego($cod)
    {
        try {
            $conn = new Conexion();
            $conn->exec("update juegos set Alguilado='SI' WHERE Codigo='$cod'");
            $conn = null;
        } catch (\Exception $ex) {
            return false;
        }
    }

    public static function devolverJuego($cod)
    {
        try {
            $conn = new Conexion();
            $conn->exec("update juegos set Alguilado='NO' WHERE Codigo='$cod'");
            $conn = null;
        } catch (\Exception $ex) {
            return false;
        }
    }

    public static function insertarJuego(Juego $juego)
    {
        try {
            $conn = new Conexion();
            $resultado = $conn->exec("insert into juegos values ('$juego->codigo', '$juego->nombreJuego', '$juego->nombreConsola','$juego->anno','$juego->precio','$juego->alquilado', '$juego->imagen', '$juego->descripcion')");
            $conn = null;
            if ($resultado) {
                return true;
            }
        } catch (\Exception $ex) {
            return false;
        }
    }


    public static function dameJuegos()
    {
        try {
            $conn = new Conexion();
            $resultado = $conn->query("select * from juegos");
            $conn = null;
            if ($resultado->rowCount())
                return $resultado;
            else
                return null;
        } catch (\Exception $ex) {
            return false;
        }
    }

    public static function dameJuegosAlquilados()
    {
        try {
            $conn = new Conexion();
            $resultado = $conn->query("select * from juegos where Alguilado='SI';");
            $conn = null;
            if ($resultado->rowCount())
                return $resultado;
            else
                return null;
        } catch (\Exception $ex) {
            return false;
        }
    }

    public static function dameJuegosNOAlquilados()
    {
        try {
            $conn = new Conexion();
            $resultado = $conn->query("select * from juegos where Alguilado='NO';");
            $conn = null;
            if ($resultado->rowCount())
                return $resultado;
            else
                return null;
        } catch (\Exception $ex) {
            return false;
        }
    }


    public static function borrarJuego($cod)
    {
        try {
            $conn = new Conexion();
            $conn->exec("delete from juegos where Codigo='$cod';");
            $conn = null;
            return true;
        } catch (\Exception $ex) {
            return false;
        }
    }

    public static function dameUnJuego($cod)
    {
        try {
            $conn = new Conexion();
            $resultado = $conn->query("select * from juegos where Codigo='$cod';");
            $conn = null;
            if ($fila = $resultado->fetchObject())
                return new Juego($fila->Codigo, $fila->Nombre_juego, $fila->Nombre_consola, $fila->Anno, $fila->Precio, $fila->Alguilado, $fila->Imagen, $fila->descripcion);
        } catch (\Exception $ex) {
            return false;
        }
    }
}