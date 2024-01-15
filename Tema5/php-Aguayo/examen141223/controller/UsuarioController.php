<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of UsuarioController
 *
 * @author Aguayo
 */
require_once '../controller/Conexion.php';
require_once '../model/Usuario.php';
class UsuarioController {
    
    //comprobamos que el usuario existe
    public static function esUsuario($user, $pass) {
        $user1 = null;
        try{
            $conex = new Conexion();
            $stmt  = $conex->prepare("select * from usuario where user = ?");
            $stmt->execute([$user]);
            if($result = $stmt->fetchObject()){
                //verificamos la contraseña
                if(password_verify($pass, $result->pass)){
                    $user1 = new Usuario($result->provincia, $result->nombre, $result->telefono, $result->user, $result->pass);
                }
            }
            $stmt = null;
            $conex = null;

        } catch (PDOException $ex) {
            echo "Error en esUsuario";
        }
        return $user1;
    }
}
