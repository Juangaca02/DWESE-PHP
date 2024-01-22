<?php
require_once '../Model/Usuario.php';
require_once '../Controller/ControllerCuentas.php';
require_once '../Controller/ControllerUsuarios.php';

session_start();
if (isset($_SESSION["usuario"])) {
    echo 'Hola ' . $_SESSION["usuario"]->Nombre;
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
    <?php
    if (isset($_POST['confirmar'])) {
        ControllerCuentas::doTransferencia($_POST['saldoPosterior'], $_POST['cantidadTrans'], $_POST['comisionTrans'], $_POST['origenTrans'], $_POST['destinoTrans']);
        header('Location:inicio_cliente.php');
    }
    $comision = $_POST['cantidad'] * 0.01;
    $SaldoMasComision = $_POST['cantidad'] + $comision;
    $saldoPosterior = $_POST['saldo'] - $SaldoMasComision;
    $cantidadTrans = $_POST['cantidad'];
    $origenTrans = $_POST["iban"];
    $destinoTrans = $_POST["cuentas"];
    $saldotrans = $_POST['saldo'];
    if ($saldoPosterior > $_POST['saldo']) {
        $negativo = true;
    } else {
        $negativo = false;
    }
    ?>
    <form action="" method="post">
        <br>
        Origen:
        <input type="text" name="origenTrans" readonly value="<?php echo $origenTrans ?>"><br>
        Destino:
        <input type="text" name="destinoTrans" readonly value="<?php echo $destinoTrans ?>"><br>
        Cantidad:
        <input type="number" name="cantidadTrans" readonly value="<?php echo $cantidadTrans ?>"><br>
        Comision:
        <input type="number" name="comisionTrans" readonly value="<?php echo $comision ?>"><br>
        Saldo Anterior:
        <input type="number" name="saldoAnterior" readonly value="<?php echo $saldotrans ?>"><br>
        <?php
        if ($negativo == true) {
            echo '<label style="color: red;">Saldo Posterior:</label> ';
        } else {
            echo 'Saldo Posterior:';
        }
        ?>
        <input type="number" name="saldoPosterior" readonly value="<?php echo $saldoPosterior ?>"><br>
        <?php
        if ($negativo == true) {
            echo '<input type="submit" name="confirmar" readonly value="Confirmar">';
        } else {
            echo '<input type="submit" name="confirmar" value="Confirmar">';
        }
        ?>
        <br>
        <input type="submit" name="cerrarSession" value="Cerrar Session">
    </form>
    <br>
    <form action="transferencias.php"><input type="submit" name="volver" value="Volver"></form>
    <?php

    ?>
</body>

</html>