<?php
if (isset($_GET['conversion'])) {
    if ($_GET['conversion'] == 1) {
        //Euro a Dolar 
        $datos = "La Cantidad de " . $_GET['dinero'] . "€ son: " . number_format($_GET['dinero'] * 1.0944682, 2) . "$";
    }
    if ($_GET['conversion'] == 2) {
        //Euro a Libra 
        $datos = "La Cantidad de " . $_GET['dinero'] . "€ son: " . number_format($_GET['dinero'] * 0.85914712, 2) . "£";
    }
    if ($_GET['conversion'] == 3) {
        //Dolar a Euro 
        $datos = "La Cantidad de " . $_GET['dinero'] . "$ son: " . number_format($_GET['dinero'] * 0.944682, 2) . "€";
    }
    if ($_GET['conversion'] == 4) {
        //Dolar a Libra 
        $datos = "La Cantidad de " . $_GET['dinero'] . "$ son: " . number_format($_GET['dinero'] * 0.7852173, 2) . "£";
    }
    if ($_GET['conversion'] == 5) {
        //Libra a Dolar 
        $datos = "La Cantidad de " . $_GET['dinero'] . "£ son: " . number_format($_GET['dinero'] * 1.27353, 2) . "$";
    }
    if ($_GET['conversion'] == 6) {
        //Libras a Euros 
        $datos = "La Cantidad de " . $_GET['dinero'] . "£ son: " . number_format($_GET['dinero'] * 1.16395, 2) . "€";
    }

    if ($_GET['dinero'] <= 0) {
        $datos = "No puedes dejar el campo a 0";
    }


}

echo json_encode($datos);



?>