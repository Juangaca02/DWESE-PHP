<html>
<?php
session_name("usuario");
session_start();
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

<body>
    <?php
    if (isset($_POST['aceptar'])) {
        $usu = $igual = $errores = true;
        try {
            $conex = new PDO("mysql:host=localhost;dbname=tema4_logueo;charset=utf8mb4", "dwes", "abc123.");
            $result = $conex->query("SELECT * from perfil_usuario");
            while ($fila = $result->fetch(PDO::FETCH_OBJ)) {
                if ($_POST['usuario'] === $fila->user) {
                    $usu = false;
                    $errores = false;
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        if ($_POST['clave'] !== $_POST['repClave']) {
            $igual = false;
            $errores = false;
        }

        if ($errores) {
            $hash_md5 = md5($_POST['clave']);
            try {
                $conex = new PDO("mysql:host=localhost;dbname=tema4_logueo;charset=utf8mb4", "dwes", "abc123.");
                $result = $conex->exec("INSERT INTO perfil_usuario VALUES ('$_POST[nombre]','$_POST[apellidos]','$_POST[direccion]','$_POST[localidad]','$_POST[usuario]','$hash_md5','$_POST[colorLetra]','$_POST[colorFondo]','$_POST[tipoLetra]','$_POST[tamañoLetra]')");
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
            $_SESSION['nombre'] = $_POST['nombre'];
            $_SESSION['apellido'] = $_POST['apellidos'];
            $_SESSION['direccion'] = $_POST['direccion'];
            $_SESSION['localidad'] = $_POST['localidad'];
            $_SESSION['usuario'] = $_POST['usuario'];
            $_SESSION['clave'] = $hash_md5;
            $_SESSION['colorLetra'] = $_POST['colorLetra'];
            $_SESSION['colorFondo'] = $_POST['colorFondo'];
            $_SESSION['tipoLetra'] = $_POST['tipoLetra'];
            $_SESSION['tamañoLetra'] = $_POST['tamañoLetra'];
            header("Location:inicio.php");
        }
    }
    ?>
    <h1>Register</h1>
    <form action="" method="POST" class="m-0">
        Nombre <input type="text" name="nombre" value="<?php if (isset($_POST['nombre']))
            echo $_POST['nombre'] ?>" required><br>
            Apellidos <input type="text" name="apellidos" value="<?php if (isset($_POST['apellidos']))
            echo $_POST['apellidos'] ?>" required><br>
            Direccion <input type="text" name="direccion" value="<?php if (isset($_POST['direccion']))
            echo $_POST['direccion'] ?>" required><br>
            Localidad <input type="text" name="localidad" value="<?php if (isset($_POST['localidad']))
            echo $_POST['localidad'] ?>" required><br>
            Usuario <input type="text" name="usuario" value="<?php if (isset($_POST['usuario']))
            echo $_POST['usuario'] ?>" required>
            <?php
        if (isset($_POST['usuario']) && $usu == false) {
            echo "El usuario ya existe";
        }
        ?><br>
        Clave <input type="text" name="clave" value="<?php if (isset($_POST['clave']))
            echo $_POST['clave'] ?>" required><br>
            Repetir clave <input type="text" name="repClave" value="<?php if (isset($_POST['repClave']))
            echo $_POST['repClave'] ?>" required>
            <?php
        if (isset($_POST['repClave']) && $igual == false) {
            echo "Clave distinta a la introducida";
        }
        ?><br>
        Color Letra
        <select name="colorLetra">
            <option value="black" <?php if (isset($_POST['colorLetra']) && $_POST['colorLetra'] == "black")
                echo "selected" ?>>black</option>
                <option value="white" <?php if (isset($_POST['colorLetra']) && $_POST['colorLetra'] == "white")
                echo "selected" ?>>white</option>
                <option value="red" <?php if (isset($_POST['colorLetra']) && $_POST['colorLetra'] == "red")
                echo "selected" ?>>red</option>
                <option value="blue" <?php if (isset($_POST['colorLetra']) && $_POST['colorLetra'] == "blue")
                echo "selected" ?>>blue</option>
                <option value="green" <?php if (isset($_POST['colorLetra']) && $_POST['colorLetra'] == "green")
                echo "selected" ?>>green</option>
            </select><br>
            Color fondo
            <select name="colorFondo">
                <option value="black" <?php if (isset($_POST['colorFondo']) && $_POST['colorFondo'] == "black")
                echo "selected" ?>>black</option>
                <option value="white" <?php if (isset($_POST['colorFondo']) && $_POST['colorFondo'] == "white")
                echo "selected" ?>>white</option>
                <option value="red" <?php if (isset($_POST['colorFondo']) && $_POST['colorFondo'] == "red")
                echo "selected" ?>>red</option>
                <option value="blue" <?php if (isset($_POST['colorFondo']) && $_POST['colorFondo'] == "blue")
                echo "selected" ?>>blue</option>
                <option value="green" <?php if (isset($_POST['colorFondo']) && $_POST['colorFondo'] == "green")
                echo "selected" ?>>green</option>
            </select><br>
            Tipo de letra
            <select name="tipoLetra">
                <option value="Times New Roman" <?php if (isset($_POST['tipoLetra']) && $_POST['tipoLetra'] == "Times New Roman")
                echo "selected" ?>>Times New Roman</option>
                <option value="Arial" <?php if (isset($_POST['tipoLetra']) && $_POST['tipoLetra'] == "Arial")
                echo "selected" ?>>Arial</option>
                <option value="Calibri" <?php if (isset($_POST['tipoLetra']) && $_POST['tipoLetra'] == "Calibri")
                echo "selected" ?>>Calibri</option>
            </select><br>
            Tamaño Letra
            <select name="tamañoLetra">
                <option value="16" <?php if (isset($_POST['tamañoLetra']) && $_POST['tamañoLetra'] == "16")
                echo "selected" ?>>16</option>
                <option value="18" <?php if (isset($_POST['tamañoLetra']) && $_POST['tamañoLetra'] == "18")
                echo "selected" ?>>18</option>
                <option value="20" <?php if (isset($_POST['tamañoLetra']) && $_POST['tamañoLetra'] == "2 ")
                echo "selected" ?>>20</option>
                <option value="24" <?php if (isset($_POST['tamañoLetra']) && $_POST['tamañoLetra'] == "24")
                echo "selected" ?>>24</option>
                <option value="26" <?php if (isset($_POST['tamañoLetra']) && $_POST['tamañoLetra'] == "26")
                echo "selected" ?>>26</option>
            </select><br>
            <input type="submit" name="aceptar" value="Aceptar">
        </form>
        <form action="index1.php">
            <input type="submit" name="cancelar" value="Cancelar">
        </form>
    </body>

    </html>