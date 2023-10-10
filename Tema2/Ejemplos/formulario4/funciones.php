<html>
    <head>
        <title>Funciones</title>
    </head>
    <body>
        <?php

        function crearMatriz($filas, $columnas) {
            for ($i = 0; $i < $filas; $i++) {
                for ($j = 0; $j < $columnas; $j++) {
                    $matriz[$i][$j] = rand(1, 10);
                }
            }
            return $matriz;
        }

        function mostrarMatriz($matriz) {
            foreach ($matriz as $fila) {
                foreach ($fila as $valor) {
                    echo $valor . " ";
                }
                echo "<br>";
            }
        }

        function sumaFilas($matriz) {
            foreach ($matriz as $fila) {
                $sumaFilaActual = 0;
                foreach ($fila as $valor) {
                    $sumaFilaActual += $valor;
                }
                $sumaFilas[] = $sumaFilaActual;
            }
            foreach ($sumaFilas as $ind => $values){
                echo "Suma de la fila $ind: $values<br>";
            }
        }
        
        function sumaDiagonal($matriz){
            $sum = 0;
            for ($i = 0; $i < count($array); $i++) {
                for ($j = 0; $j < count($array); $j++) {
                    if ($i == $j) {
                        $sum += $matriz[$i][$j];
                    }
                }
            }
            return $sum;
        }
        
        
        
        ?>
    </body>
</html>