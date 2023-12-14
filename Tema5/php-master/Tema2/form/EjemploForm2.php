<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <form action="datos2.php" method="POST">
            Nombre: <input type="text" name="nombre"><br>
            Apellidos: <input type="text" name="apell"><br>
            Modulos:<br>
            Desarrollo web entorno servidor:<input type="checkbox" name="modulos[]" value="DWES"><br>
            Desarrollo web entorno cliente:<input type="checkbox" name="modulos[]" value="DWEC"><br>
            Despliegue de aplicaciones web:<input type="checkbox" name="modulos[]" value="Despliegue"><br>
            <input type="submit" name="enviar" value="Enviar">
        </form>
    </body>
</html>
