<?php
require_once '../Model/Usuario.php';
require_once '../Controller/ControllerCuentas.php';
require_once '../Controller/ControllerUsuarios.php';

session_start();
if (isset($_SESSION["usuario"])) {
    echo 'Hola ' . $_SESSION["usuario"]->Nombre;
    echo '<br><form action="" method="post"><input type="submit" name="cerrarSession" value="Cerrar Session"></form>';
}
if (isset($_POST["cerrarSession"])) {
    header("Location:cerrarSession.php");
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
    <h2>Tramitar Transferecia</h2>
    <form action="validar_transferencia.php" method="post">
        <?php
        if (isset($_POST['transferencia'])) {
            echo 'Origen: ' . $_POST['iban'];
            echo '<br>Saldo: ' . $_POST['saldo'] . ' €';

            $cuentas = ControllerCuentas::getAllCuentas();
            // Verificar si se obtuvieron cuentas
            if ($cuentas !== false) {
                // Verificar si hay cuentas para mostrar
                if ($cuentas !== null) {
                    // Iterar sobre las cuentas y mostrar la información
                    echo '<br><br>Cuentas:<br><select name="cuentas">';
                    foreach ($cuentas as $cuenta) {
                        if ($cuenta->iban == $_POST['iban']) {
                            //No pongo nada porque no quiero mostrar la misma cuenta que la que quiere hacer la transferencia
                        } elseif ($cuenta->iban == 'ES2099999999999999999999') {
                            //No pongo nada porque no quiero mostrar la cuenta de comisiones del banco
                        } else {
                            echo "<option value='$cuenta->iban'";
                            if (isset($_POST['cuentas']) && $_POST['cuentas'] == $cuenta->iban) {
                                echo " selected ";
                            }
                            echo ">$cuenta->iban --- ";
                            $usuarios = ControllerUsuarios::usuarioForCuentas($cuenta->dni_cuenta);
                            echo $usuarios->Nombre . "</option>";
                        }

                    }
                    echo '</select>';
                } else {
                    echo "No se encontraron cuentas para el DNI proporcionado.";
                }
            } else {
                echo "Ocurrió un error al obtener las cuentas.";
            }
        } else {
            header('Location:inicio_cliente.php');
        }
        ?>
        <br><br>Cantidad:<br>
        <input type="number" name="cantidad"><br><br>
        <input type="hidden" name="iban" value="<?php echo $_POST['iban'] ?>">
        <input type="hidden" name="saldo" value="<?php echo $_POST['saldo'] ?>">
        <input type="submit" name="transferir" value="Transferir"><br>
    </form>
    <form action="inicio_cliente.php">
        <input type="submit" name="volver" value="Volver">
    </form>
</body>

</html>