<html>

<head>
    <meta charset="UTF-8">
    <title>Generar Usuario</title>
</head>

<body>
    <form action="" method="POST">
        Cuantos Clientes desea Generar y guardar en la base de datos?
        <input type="number" min="0" value="1" name="valor">
        <input type="submit" name="Consultar" value="Consultar">
    </form>
</body>

</html>
<?php
if (isset($_POST['Consultar'])) {
    if (isset($_POST['valor'])) {
        $numUsu = $_POST['valor'];

        $dato = file_get_contents("https://randomuser.me/api/?results=" . $numUsu);
        $usuarios = json_decode($dato)->results;

        $host = "localhost";
        $user = "dwes";
        $pass = "abc123.";
        $db = "apirandomuser";

        $conn = new mysqli($host, $user, $pass, $db);

        foreach ($usuarios as $usuario) {
            $id = $usuario->login->uuid;
            $nombre = $usuario->name->first;
            $apellidos = $usuario->name->last;
            $direccion = $usuario->location->street->name;
            $ciudad = $usuario->location->city;
            $pais = $usuario->location->country;
            $telefono = $usuario->phone;
            $email = $usuario->email;
            $username = $usuario->login->username;
            $password = $usuario->login->password;

            $result = $conn->query("INSERT INTO user VALUES ('$id', '$nombre', '$apellidos', '$direccion', '$ciudad', '$pais', '$telefono', '$email', '$username', '$password')");

            if ($result === TRUE) {
                echo "<br>Datos de usuario insertados correctamente en la base de datos.";
            } else {
                echo "<br>Error al insertar datos de usuario: " . $conn->error;
            }
        }
        $conn->close();
    } else {
        echo "No se seleccionó ninguna opción o no se proporcionó la cantidad de usuarios.";
    }
}
?>