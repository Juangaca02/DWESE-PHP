<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <?php
    require_once '../Controller/citasController.php';
    require_once '../Model/Usuario.php';
    session_start();
    if (isset($_SESSION['usuario'])) {
        $citas = citasController::citasPorProvincia($_SESSION['usuario']->provincia);
        foreach ($citas as $c) {
            echo $c . "<br>";
        }
        ?>
        <?php
    } else {
        header("Location: login.php");
    }
    ?>

</body>

</html>