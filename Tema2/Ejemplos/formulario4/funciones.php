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
            ?>
            <table border="1">
                <?php
                foreach ($matriz as $fila) {
                    echo "<tr>";
                    foreach ($fila as $valor) {
                        echo "<td>" . $valor . "</td>";
                    }
                    echo "<tr>";
                }
                ?>
            </table>
            <?php
        }

        function sumaFilas($matriz) {
            foreach ($matriz as $fila) {
                $sumaFilaActual = 0;
                foreach ($fila as $valor) {
                    $sumaFilaActual += $valor;
                }
                $sumaFilas[] = $sumaFilaActual;
            }
            foreach ($sumaFilas as $ind => $values) {
                echo "Suma de la fila $ind: $values<br>";
            }
        }

        function sumaColumnas($matriz) {
            
        }

        function sumaDiagonal($matriz) {
            if (count($matriz) == count($matriz[0])) {
                $sum = 0;
                for ($i = 0; $i < count($matriz); $i++) {
                    for ($j = 0; $j < count($matriz); $j++) {
                        if ($i == $j) {
                            $sum += $matriz[$i][$j];
                        }
                    }
                }
                echo "La suma de la diagonas es: $sum<br>";
            } else {
                echo "La matriz no es cuadrada, por favor, inserte una matriz cuadrada;";
            }
        }
        ?>


    </body>
</html>