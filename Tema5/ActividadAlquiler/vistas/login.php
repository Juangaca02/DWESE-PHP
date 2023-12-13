<body>

    <?php
    require_once '../controladores/Connection.php';
    require_once '../clases/Cliente.php';
    if (isset($_POST['volver'])) {
        header("Location:index.php");
    }
    if (isset($_POST['login'])) {
        session_name("cliente");
        session_start();
        //$hashPass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    
        try {
            $conex = new conexion();
            $result = $conex->query("SELECT * from cliente where DNI= '$_POST[dni]'");
            $datosUsuario = null;
            while ($cliente = $result->fetchObject()) {
                if (password_verify($_POST['pass'], $cliente->Clave)) {
                    $Usuario = new Cliente($cliente->DNI, $cliente->Nombre, $cliente->Apellido,
                        $cliente->Direccion, $cliente->Localidad, $cliente->Clave, $cliente->Tipo);
                    /*
                                        echo 'Hola';
                                        $datosUsuario = array('DNI' => $cliente->DNI, 'Nombre' => $cliente->Nombre, 'Apellido' => $cliente->Apellidos,
                                            'Direccion' => $cliente->Direccion, 'Clave' => $cliente->Clave, 'Tipo' => $cliente->Tipo);
                                            */
                } else {
                    echo "Contraseña Incorrecto <br>";
                }
            }
            $_SESSION['cliente'] = $Usuario;
            //$_SESSION['cliente'] = $datosUsuario;
            header("Location:index.php");
        } catch (PDOException $ex) {
            echo "Error Select Clientes en Login" + $ex;
        }



        /* 
                $datosUsuario = array(
                    'dni' => $_POST['dni'],
                    'contaseña' => $hashPass
                );
        */
        // Almacenar el array en $_SESSION
    

        // Puedes acceder a los valores individuales así:
        //$nombre = $_SESSION['cliente']['nombre'];
    







    }
    ?>

    <h1>Login</h1>
    <form action="" method="post">
        Dni: <input type="text" name="dni"><br>
        Contraseña: <input type="text" name="pass"><br>
        <input type="submit" value="Login" name="login">
        <input type="submit" value="Volver" name="volver">
    </form>
</body>