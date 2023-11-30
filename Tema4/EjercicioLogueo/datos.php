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
            <strong></strong>
            <div class="col">
                <h2 class="">Tus datos son....</h2>
            </div>
            <div class="col">
                <?php echo "<strong>Nombre: </strong>", $_SESSION['nombre'],
                    "<br><strong>Apellido: </strong>", $_SESSION['apellido'],
                    "<br><strong>Direccion: </strong>", $_SESSION['direccion'],
                    "<br><strong>Localidad: </strong>", $_SESSION['localidad'],
                    "<br><strong>Usuario: </strong>", $_SESSION['usuario'],
                    "<br><strong>ColorLetra: </strong>", $_SESSION['colorLetra'],
                    "<br><strong>ColorFondo: </strong>", $_SESSION['colorFondo'],
                    "<br><strong>TipoLetra: </strong>", $_SESSION['tipoLetra'],
                    "<br><strong>TamañoLetra: </strong>", $_SESSION['tamañoLetra']; ?><br>
                <a href="inicio.php">Volver</a><br><br>
                <p style="font-size:12px">No le mostramos su contraseñaporseguridad,para cambiar, valla atras y
                    modificala</p>
            </div>
        </div>


    </form>
</body>

</html>