<?php
require_once '../Model/Usuario.php';
require_once '../Controller/ControllerCuentas.php';
session_start();
if (isset($_SESSION["usuario"])) {
    echo 'Hola ' . $_SESSION["usuario"]->Nombre;
    echo '<br><form action="" method="post"><input type="submit" name="cerrarSession" value="Cerrar Session"></form>';
}
if (isset($_POST["cerrarSession"])) {
    header("Location:cerrarSession.php");
}
if (isset($_POST["transferencia"])) {
    header("Location:transferencias.php");
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
            echo '<table border="1"><tr><th>IBAN</th> <th>Saldo</th> <th>Historial</th><th>Transferencia</th></tr>';
            foreach ($cuentas as $cuenta) {
                ?>
                <tr>
                    <td>
                        <?php echo $cuenta->iban ?>
                    </td>
                    <td>
                        <?php echo $cuenta->saldo ?>
                    </td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="iban" value="<?php echo $cuenta->iban ?>">
                            <input type="submit" name="historial" value="Historial">
                        </form>
                    </td>
                    <td>
                        <form action="transferencias.php" method="post">
                            <input type="hidden" name="iban" value="<?php echo $cuenta->iban ?>">
                            <input type="hidden" name="saldo" value="<?php echo $cuenta->saldo ?>">
                            <input type="submit" name="transferencia" value="Transferencia">
                        </form>
                    </td>
                </tr>
                <?php
            }
            echo "</table>";
        } else {
            echo "No se encontraron cuentas para el DNI proporcionado.";
        }
    } else {
        echo "Ocurrió un error al obtener las cuentas.";
    }

    if (isset($_POST["historial"])) {
        $ibanSeleccionado = $_POST["iban"]; // Obtener el IBAN de la cuenta seleccionada
        $historial = ControllerCuentas::getHistorialByIBAN($ibanSeleccionado); // Obtener el historial correspondiente a la cuenta seleccionada
        // Verificar si se obtuvieron cuentas
        if ($historial !== false) {
            // Verificar si hay cuentas para mostrar
            if ($historial !== null) {
                // Iterar sobre las cuentas y mostrar la información
                // Mostrar el historial
                echo "Historial de la cuenta $ibanSeleccionado:<br>";
                echo '<table border="1"><tr><th>Origen</th> <th>Destino</th> <th>Fecha</th><th>Cantidad</th></tr>';
                foreach ($historial as $registro) {
                    ?>
                    <tr>
                        <form action="" method="post">
                            <input type="hidden" name="iban" value="<?php echo $cuenta->iban ?>">
                            <td>
                                <?php echo $registro->iban_origen ?>
                            </td>
                            <td>
                                <?php echo $registro->iban_destino ?>
                            </td>
                            <td>
                                <?php
                                $fechaHora = date("d/m/Y - H:i:s", $registro->fecha);
                                echo $fechaHora;
                                ?>
                            </td>
                            <td>
                                <?php echo $registro->cantidad ?>
                            </td>
                        </form>
                    </tr>
                    <?php
                }
                echo "</table>";
            } else {
                echo "No se encontraron cuentas para el DNI proporcionado.";
            }
        } else {
            echo "Ocurrió un error al obtener las cuentas.";
        }
    }
    ?>
</body>

</html>