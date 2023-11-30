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

    .centro {
        text-align: center;
    }
</style>

<body>
    <form action="" method="POST">
        <div class="row centro">
            <a href="index1.php">Salir</a><br><br>
            <div class="col">
                <p class="">
                    Hola
                    <?php echo $_SESSION['nombre'], " ", $_SESSION['apellido']; ?><br>
                </p>
            </div>
            <div class="col">
                <h2 class="">Tus datos son....</h2>
            </div>
            <div class="col">
                Nombre <input type="text" name="nombre" value=" <?php echo $_SESSION['nombre'] ?>"><br>
                Apellidos <input type="text" name="apellidos" value="<?php echo $_SESSION['apellido'] ?>"><br>
                Direccion <input type="text" name="direccion" value="<?php echo $_SESSION['direccion'] ?>"><br>
                Localidad <input type="text" name="localidad" value="<?php echo $_SESSION['localidad'] ?>"><br>
                Usuario <input type="text" name="usuario" value="<?php echo $_SESSION['usuario'] ?>"><br>
                Clave <input type="text" name="clave" value=""><br>
                Repetir clave <input type="text" name="repClave" value=""><br>
                Color Letra
                <select name="colorLetra">
                    <option value="black" selected>black</option>
                    <option value="white">white</option>
                    <option value="red">red</option>
                    <option value="blue">blue</option>
                    <option value="green">green</option>
                </select><br>
                Color fondo
                <select name="colorFondo">
                    <option value="white" selected>white</option>
                    <option value="black">black</option>
                    <option value="red">red</option>
                    <option value="blue">blue</option>
                    <option value="green">green</option>
                </select><br>
                Tipo de letra
                <select name="tipoLetra">
                    <option value="Times New Roman" selected>Times New Roman</option>
                    <option value="Arial">Arial</option>
                    <option value="calibri">Calibri</option>
                </select><br>
                Tamaño Letra
                <select name="tamañoLetra">
                    <option value="16">16</option>
                    <option value="18" selected>18</option>
                    <option value="20">20</option>
                    <option value="24">24</option>
                    <option value="26">26</option>
                </select><br>
                <a href="inicio.php">Volver</a><br>
                <input type="submit" name="modificar" value="Modificar">
            </div>
        </div>


    </form>
</body>

</html>