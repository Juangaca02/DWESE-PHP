<?php
require_once '../Model/Usuario.php';
require_once '../Controller/ControllerCuentas.php';
session_start();
if (isset($_SESSION["usuario"])) {
    echo 'Hola ' . $_SESSION["usuario"]->Nombre;
    echo '<br><input type="submit" value="Cerrar Session">';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Mis Cuentas</h1>
    <?php
    $cuentas = ControllerCuentas::getCuentasByDNI($_SESSION["usuario"]->DNI);

    // Verificar si se obtuvieron cuentas
    if ($cuentas !== false) {
        // Verificar si hay cuentas para mostrar
        if ($cuentas !== null) {
            // Iterar sobre las cuentas y mostrar la información
            echo '<form action="" method="post"><table border="1"><tr><th>IBAN</th>
        <th>Saldo</th>
        <th>Historial</th><th>Transferencia</th></tr><tr>';
            foreach ($cuentas as $cuenta) {
                echo "<td>" . $cuenta->iban . "</td>";
                echo "<td>" . $cuenta->saldo . "</td>";
                echo '<td><input type="submit" value="Historial"></td><td><input type="submit" value="Transferencia"></td>';
            }
            echo "</tr></table></form>";
        } else {
            echo "No se encontraron cuentas para el DNI proporcionado.";
        }
    } else {
        echo "Ocurrió un error al obtener las cuentas.";
    }
    ?>
</body>

</html>