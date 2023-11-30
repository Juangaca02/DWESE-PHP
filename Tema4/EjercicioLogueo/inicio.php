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
    <form action="" method="POST">
        <div class="row" style=" text-align: center; font-size: 20px;">
            <a href="index1.php">Salir</a><br><br>
            <div class="col">
                <p class="">
                    Hola
                    <?php echo $_SESSION['nombre'], " ", $_SESSION['apellido']; ?><br>
                </p>
            </div>
            <div class="col">
                <h2 class="">Bienvenido a nuestra Web</h2>
            </div>
            <div class="col">
                <a href="datos.php">Ver mis datos</a><br><br>
                <a href="modificar.php">Modificar mis datos</a>
            </div>
        </div>


    </form>
</body>

</html>