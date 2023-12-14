<?php

function PedirFilasYColumnas($operación) {
    ?>
    <form action="calcula.php" method="POST">
        Introduce el número de filas<input type="number" name="filas"><br>
        Introduce el número de columnas<input type="number" name="columnas">
        <input type="hidden" name="operacion" value="<?php echo $operación ?>">
        <input type="submit" name="enviar" value="enviar">
    </form>
    <?php
}

function crearMatriz($filas, $columnas) {
    for ($i = 0; $i < $filas; $i++) {
        for ($j = 0; $j < $columnas; $j++) {
            $matriz[$i][$j] = rand(0, 100);
        }
    }  
    return $matriz;
}

function mostrarMatriz($matriz){
echo "<table border='1'>";
    for ($i = 0; $i < count($matriz); $i++) {
        echo "<tr>";
        for ($j = 0; $j < count($matriz[$i]); $j++) {
            echo "<td>" . $matriz[$i][$j] . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

function sumaFilas($matriz){
    for ($i = 0; $i < count($matriz); $i++) {
        $suma = 0;
        for ($j = 0; $j < count($matriz[$i]); $j++) {
            $suma += $matriz[$i][$j];
        }
      $array[] = $suma;
    }
    return $array;
}

function sumaColumnas($matriz){
    for ($i = 0; $i < count($matriz[0]); $i++) {
        $suma = 0;
        for ($j = 0; $j < count($matriz); $j++) {
            $suma += $matriz[$j][$i];
        }
      $array[] = $suma;
    }
    return $array;
    
}

function sumaFilasYColumnas($matriz){
    $filas = sumaFilas($matriz);
    $columnas = sumaColumnas($matriz);
    $sumaFilas = 0;
    $sumaColumnas = 0;
    foreach ($filas as $value) {
        $sumaFilas += $value;
    }
    foreach ($columnas as $value) {
        $sumaColumnas += $value;
    }
    $array[] = $sumaFilas;
    $array[] = $sumaColumnas;
    return $array;
    
}

function sumaDiagonal($matriz){
    $suma = 0;
    for ($i = 0, $j = 0; $i < count($matriz); $i++, $j++) {
        $suma += $matriz[$i][$j];
    }
    return $suma;
    
}

function matrizTraspuesta($matriz){
    for ($i = 0; $i < count($matriz[0]); $i++) {
        for ($j = 0; $j < count($matriz); $j++) {
            $traspuesta[$i][$j] = $matriz[$j][$i];
        }
    }
    return $traspuesta;
}

function mostrarArray($array){
    foreach ($array as $key => $value) {
        echo "$key: $value ";
     
    }
    
}

?>
