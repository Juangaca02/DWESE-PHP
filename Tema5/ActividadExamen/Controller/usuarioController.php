<?php
require_once '../Controller/Connection.php';
require_once '../Model/Usuario.php';

class usuarioController
{
    public static function esUsuario($user, $pass)
    {
        $admin = null;
        try {
            $conex = new conexion();
            $stmt = $conex->prepare("SELECT * from usuario where user = ?");
            $stmt->execute([$user]);

            if ($resultado = $stmt->fetchObject()) {
                if (password_verify($pass, $resultado->pass)) {
                    $admin = new Usuario($resultado->provincia, $resultado->nombre, $resultado->telefono, $resultado->user, $resultado->pass);
                }
            }
            $stmt = null;
            $conex = null;
        } catch (PDOException $ex) {
            echo "Fallo en esUsuario";
        }
        return $admin;
    }
}
