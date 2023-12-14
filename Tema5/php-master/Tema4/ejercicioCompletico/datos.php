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
        <a href="inicio.php">volver</a>
        <br>Tus datos son:
        <br>Nombre:
        <?php echo $_SESSION['nombre']; ?>
        <br>Apellidos:
        <?php echo $_SESSION['apellidos']; ?>
        <br>Dirección:
        <?php echo $_SESSION['direccion']; ?>
        <br>Localidad:
        <?php echo $_SESSION['localidad']; ?>
        <br>Nombre de ususario:
        <?php echo $_SESSION['user']; ?>
        <br>Color de letra:
        <?php echo $_SESSION['color_letra']; ?>
        <br>Color de fondo:
        <?php echo $_SESSION['color_fondo']; ?>
        <br>Tipo de letra:
        <?php echo $_SESSION['tipo_letra']; ?>
        <br>Tamaño de letra:
        <?php echo $_SESSION['tam_letra']; ?>
        <?php
    } else
        header('Location: index.php');
    ?>
</body>

</html>