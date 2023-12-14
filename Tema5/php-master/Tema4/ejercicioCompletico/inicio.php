<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    session_start();
    ?>
    <style>
        body {

            color:
                <?php echo "$_SESSION[color_letra]"; ?>
            ;
            background-color:
                <?php echo "$_SESSION[color_fondo]"; ?>
            ;
            font-family:
                <?php echo "$_SESSION[tipo_letra]"; ?>
            ;
            font-size:
                <?php echo "$_SESSION[tam_letra]px" ?>
            ;
        }

        a {
            text-decoration: none;
            color:
                <?php echo "$_SESSION[color_letra]"; ?>
            ;
            background-color:
                <?php echo "$_SESSION[color_fondo]"; ?>
            ;
            font-family:
                <?php echo "$_SESSION[tipo_letra]"; ?>
            ;
            font-size:
                <?php echo "$_SESSION[tam_letra]px" ?>
            ;
        }

        input {
            background-color:
                <?php echo "$_SESSION[color_fondo]"; ?>
            ;
            color:
                <?php echo "$_SESSION[color_letra]"; ?>
            ;
        }
    </style>
</head>

<body>
    <?php if (isset($_SESSION['user'])) { ?>
        <a href="cerrarSession.php">cerrar sesion</a>
        <br>
        hola
        <?php echo "$_SESSION[nombre], $_SESSION[apellidos]"; ?>
        <form action="datos.php" method="post">
            <input type="submit" name="ver" value="Ver mis datos">
        </form>
        <form action="modificar.php" method="post">
            <input type="submit" name="mod" value="Modificar mis datos">
        </form>
        <?php
    } else
        header('Location: index.php');
    ?>
</body>

</html>