<?php

require_once './funciones.php';

if (!isset($_POST["enviar"])) {
    PedirFilasYColumnas($_GET["operacion"]);
    
}else {
    $matriz = crearMatriz($_POST["filas"], $_POST["columnas"]);
    $operacion = $_POST["operacion"];
    mostrarMatriz($matriz);
    echo "<br>";
    switch ($operacion){
        case "sumaFilas":
            $array = sumaFilas($matriz);
            mostrarArray($array);
            break;
        case "sumaColumnas":
            $array = sumaColumnas($matriz);
            mostrarArray($array);
            break;
        case "sumaFilasYColumnas":
            $array = sumaFilasYColumnas($matriz);
            mostrarArray($array);
            break;
        case "sumaDiagonal":
            if ($_POST["filas"] == $_POST["columnas"]) {
                $suma = sumaDiagonal($matriz);
                echo $suma;
            } else {
                echo 'Las filas y las columnas no son iguales, para calcular la diagonal es necesario que sean iguales<br> <a href="index.php">Volver al inicio</a>';
            }
            break;
        case "matrizTraspuesta":
            $traspuesta = matrizTraspuesta($matriz);
            mostrarMatriz($traspuesta);
            break;
    }
    echo "<br><a href='index.php'>Volver al inicio</a>";
}






