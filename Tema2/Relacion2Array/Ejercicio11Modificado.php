<!DOCTYPE html>
<html>

<head>
    <title>Operaciones con Arrays en PHP</title>
</head>

<body>
    <?php
    for ($i = 0; $i < 4; $i++) {
        $array1[] = rand(1, 100);
        $array2[] = rand(1, 100);
    }

    echo '<h2>Arrays originales:</h2>';
    echo 'Array 1';
    mostrarArray($array1);
    echo 'Array 2';
    mostrarArray($array2);

    echo '<h2>Array unido con array_merge:</h2>';
    $mergedArray = array_merge($array1, $array2);
    mostrarArray($mergedArray);

    echo '<h2>Array unido manualmente:</h2>';
    $manualMergedArray = $array1;
    foreach ($array2 as $element) {
        $manualMergedArray[] = $element;
    }
    mostrarArray($manualMergedArray);

    echo '<h2>Array unido ordenado con sort:</h2>';
    sort($mergedArray);
    mostrarArray($mergedArray);

    echo '<h2>Array unido ordenado manualmente:</h2>';
    for ($i = 0; $i < count($manualMergedArray); $i++) {
        for ($j = $i + 1; $j < count($manualMergedArray); $j++) {
            if ($manualMergedArray[$i] > $manualMergedArray[$j]) {
                $temp = $manualMergedArray[$i];
                $manualMergedArray[$i] = $manualMergedArray[$j];
                $manualMergedArray[$j] = $temp;
            }
        }
    }
    mostrarArray($manualMergedArray);

    function mostrarArray($array)
    {
        echo '<table border="1">';
        echo '<tr><th>Índice</th><th>Valor</th></tr>';
        foreach ($array as $indice => $valor) {
            echo '<tr>';
            echo '<td>' . $indice . '</td>';
            echo '<td>' . $valor . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    ?>
</body>

</html>