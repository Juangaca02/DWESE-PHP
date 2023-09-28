<?php

$a = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
$b = 0;
$sumaPares = 0;
echo 'Impares<br>';
foreach ($a as $ind => $valor) {
    if ($valor % 2 == 0) {
        $sumaPares += $valor;
        $b++;
    } else {
        echo "$valor<br>";
    }
}
echo "Media de los nunmeros pares es ".$sumaPares/(count($a)/2)."<br>";
echo "Media de los nunmeros pares es ".$sumaPares/$b;
?>
