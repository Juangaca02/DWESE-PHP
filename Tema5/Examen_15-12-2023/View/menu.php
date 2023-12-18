<style>
</style>
<?php
require_once '../Model/Usuario.php';
session_start();
if (isset($_SESSION['usuario'])) {
    echo "Hola Administrador de : " . $_SESSION['usuario']->provincia;
    echo "<br>Telefono : " . $_SESSION['usuario']->telefono;
    echo "<br><a href='cerrar.php'>Cerrar Sesion</a> <h1>Gestion de citas de la ITV de " . $_SESSION['usuario']->provincia . '</h1>';
}
?>

<body>
    <br><a href="nuevaCita.php">Resgistrar Nueva Cita</a>
    <br><a href="listaitvs.php">Listado de Sedes de ITV</a>
</body>