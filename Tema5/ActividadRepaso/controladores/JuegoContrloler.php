<?php
require_once '../controladores/Connection.php';
require_once '../clases/Juego.php';
class JuegoControler
{
    public static function todosJuegos()
    {
        try {
            $conex = new conexion();
            $result = $conex->query("SELECT * from juegos");
            $juegos = null;
            while ($juego = $result->fetchObject()) {
                $juegos[] = new Juego($juego->Codigo, $juego->Nombre_juego, $juego->Nombre_consola,
                    $juego->Anno, $juego->Precio, $juego->Alguilado, $juego->Imagen, $juego->descripcion);
            }
        } catch (PDOException $ex) {
            echo 'Fallo en TodosJuegos';
        }

        return $juegos;
    }
}