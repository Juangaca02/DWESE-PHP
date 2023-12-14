<html>
    <head>
        <title>11</title>
    </head>
    <body>
        <?php
        for ($i = 0; $i < 4; $i++) {
            $a[] = rand(1, 100);
            $b[] = rand(1, 100);
        }
        echo "Primer array: ";
        foreach ($a as $value) {
            echo "$value, ";
        }

        echo "<br>Segundo array: ";
        foreach ($b as $value) {
            echo "$value, ";
        }

        $c = array_merge($a, $b);
        echo "<br>Uso de array_merge: ";
        foreach ($c as $value) {
            echo "$value, ";
        }

        $d = $a;
        foreach ($b as $value) {
            $d[] = $value;
        }
        echo "<br>Unión manual: ";
        foreach ($d as $value) {
            echo "$value, ";
        }

        sort($c);
        echo "<br>Ordenado con sort: ";
        foreach ($c as $value) {
            echo "$value, ";
        }

        for ($i = 0; $i < count($d) - 1; $i++) {
            for ($j = $i + 1; $j < count($d); $j++) {
                if ($d[$i] > $d[$j]) {
                    $aux = $d[$i];
                    $d[$i] = $d[$j];
                    $d[$j] = $aux;
                }
            }
        }
        echo "<br>Ordenado manualmente: ";
        foreach ($d as $value) {
            echo "$value, ";
        }
        ?>
    </body>
</html>
