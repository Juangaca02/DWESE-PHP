<!DOCTYPE html>
<html>

<head>
    <title>Operaciones con Arrays en PHP</title>
</head>

<body>

    <?php
    // Rellena dos arrays con números aleatorios
    $array1 = array();
    $array2 = array();

    for ($i = 0; $i < 4; $i++) {
        $array1[] = rand(1, 100); // Genera números aleatorios entre 1 y 100
        $array2[] = rand(1, 100);
    }

    echo '<h2>Arrays originales:</h2>';
    echo '<pre>';
    print_r($array1);
    print_r($array2);
    echo '</pre>';

    // Une los dos arrays usando array_merge
    $mergedArray = array_merge($array1, $array2);

    echo '<h2>Array unido con array_merge:</h2>';
    echo '<pre>';
    print_r($mergedArray);
    echo '</pre>';

    // Une los dos arrays manualmente
    $manualMergedArray = $array1;
    foreach ($array2 as $element) {
        $manualMergedArray[] = $element;
    }

    echo '<h2>Array unido manualmente:</h2>';
    echo '<pre>';
    print_r($manualMergedArray);
    echo '</pre>';

    // Ordena el array unido con sort
    sort($mergedArray);

    echo '<h2>Array unido ordenado con sort:</h2>';
    echo '<pre>';
    print_r($mergedArray);
    echo '</pre>';

    // Ordena el array unido manualmente intercambiando valores
    for ($i = 0; $i < count($manualMergedArray); $i++) {
        for ($j = $i + 1; $j < count($manualMergedArray); $j++) {
            if ($manualMergedArray[$i] > $manualMergedArray[$j]) {
                // Intercambia los valores
                $temp = $manualMergedArray[$i];
                $manualMergedArray[$i] = $manualMergedArray[$j];
                $manualMergedArray[$j] = $temp;
            }
        }
    }

    echo '<h2>Array unido ordenado manualmente:</h2>';
    echo '<pre>';
    print_r($manualMergedArray);
    echo '</pre>';
    ?>

</body>

</html>