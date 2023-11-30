<html>
<?php

if (!isset($_COOKIE['intentos'])) {
    setcookie('intentos', '2');
} else {
    if (!$_COOKIE['intentos'] == 0) {
        echo "Te quedan " . $_COOKIE['intentos'] . " intentos";
    } else {
        setcookie("intentos", "eliminada", time() - 20);
        header("Location:intentos.php");
    }
}

if (isset($_SESSION['usuario'])) {
    session_unset();
    session_destroy();
} else {
    session_name("usuario");
    session_start();
    $_SESSION['colorLetra'] = 'white';
    $_SESSION['colorFondo'] = 'black';
    $_SESSION['tipoLetra'] = 'Times New Roman';
    $_SESSION['tamañoLetra'] = '26px';
}
?>

<head>
    <meta charset="UTF8">
</head>
<style>
    body {
        color:
            <?php echo $_SESSION['colorLetra']; ?>
        ;
        background-color:
            <?php echo $_SESSION['colorFondo']; ?>
        ;
        font-family:
            <?php echo $_SESSION['tipoLetra']; ?>
        ;
        font-size:
            <?php echo $_SESSION['tamañoLetra']; ?>
        ;

    }
</style>
<?php

if (isset($_POST['registrar'])) {
    header("Location:register.php");
}

if (isset($_POST['entrar'])) {
    try {
        $conex = new PDO("mysql:host=localhost;dbname=tema4_logueo;charset=utf8mb4", "dwes", "abc123.");
        $result = $conex->query("SELECT * from perfil_usuario");
        /* 
        $conex = new msqli('localhost','dwes','abc123.','tema4_logueo');
        $stmt = $conexprepare("SELECT * from perfil_usuario where user=? and pass=?;")
        $hash_md5->$md5($_POST['clave']);
        $stmt->brind_param("ss",$_POST['usaurio'],$hash_md5);
        $stmt->execute();
        $result = $stmt->get_result();

        
        if($result->num_rows >0){
            session_name("usuario");
            session_start();
            $_SESSION['usuario']= $result->fetchObject();
            header("Location:inicio.php);
        }else{
            if($_COOKIE['intentos'] == 0){
                header("Location:intentos.php");
            }
            setcookie('intentos',$_COOKIE['intentos']-1);
            $mensaje = "Usuario o contraseña incorrectos";
        }

        */
        while ($fila = $result->fetch(PDO::FETCH_OBJ)) {
            if ($_POST['usuario'] === $fila->user) {
                $hash_md5 = md5($_POST['clave']);
                $result = $conex->query("SELECT * from perfil_usuario where user='$_POST[usuario]' and pass='$hash_md5';");
                /*while ($fila = $result->fetchObject()) {}
                $_SESSION['usuario']= $result->fetchObject();
                */
                if ($fila = $result->fetch(PDO::FETCH_OBJ)) {
                    $_SESSION['nombre'] = $fila->nombre;
                    $_SESSION['apellido'] = $fila->apellidos;
                    $_SESSION['direccion'] = $fila->direccion;
                    $_SESSION['localidad'] = $fila->localidad;
                    $_SESSION['usuario'] = $fila->user;
                    $_SESSION['clave'] = $fila->pass;
                    $_SESSION['colorLetra'] = $fila->color_letra;
                    $_SESSION['colorFondo'] = $fila->color_fondo;
                    $_SESSION['tipoLetra'] = $fila->tipo_letra;
                    $_SESSION['tamañoLetra'] = $fila->tam_letra;
                    header("Location:inicio.php");
                }
            } else {
                if (!$_COOKIE['intentos'] == 0) {
                    setcookie('intentos', $_COOKIE['intentos'] - 1);
                    $mensaje = "Usuario o contraseña incorrectos";
                }
            }
        }
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}


?>

<body>
    <h1>Login</h1>
    <form action="" method="POST">
        Usuario <input type="text" name="usuario" value=""><br>
        Clave <input type="text" name="clave" value=""><br>
        <input type="submit" name="registrar" value="Registrarse">
        <input type="submit" name="entrar" value="Entrar">
    </form>
</body>

</html>