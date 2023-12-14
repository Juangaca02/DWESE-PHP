<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <form action="datos.php" method="POST">
            Nombre: <input type="text" name="nombre"><br>
            Apellidos: <input type="text" name="apell"><br>
            <input type="submit" name="enviar" value="Enviar">
        </form>
        /*
        ejemplo GET
        */
        <a href="datos.php?nombre=Antonio&apell=Rosa">Ir a datos.php</a>
    </body>
</html>
