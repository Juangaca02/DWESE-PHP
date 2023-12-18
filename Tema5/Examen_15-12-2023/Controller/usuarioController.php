<?php
require_once '../Controller/Connection.php';
require_once '../Model/Usuario.php';
class usuarioController
{
    public static function comprobarUsuario($user, $pass)
    {
        $usuario = null;
        try {
            $conex = new conexion();
            $stmt = $conex->prepare("SELECT * from usuario where user = ?");
            $stmt->execute([$user]);
            if ($resultado = $stmt->fetchObject()) {
                if (password_verify($pass, $resultado->pass)) {
                    $usuario = new Usuario($resultado->provincia, $resultado->nombre, $resultado->telefono, $resultado->user, $resultado->pass);
                }
            }
            $stmt = null;
            $conex = null;
        } catch (PDOException $ex) {
            echo "Fallo en el Comprobar Usuario";
            echo "" . $ex->getMessage();
        }
        return $usuario;
    }
}