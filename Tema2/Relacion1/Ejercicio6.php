<?php
// Estructura A
$b = 0;
for ($a = 1; $a <= 100; $a++) {
    $b = $b + $a;
}
echo "$b<br>";
// Estructura B
$d = 0;
$c = 0;
while ($c != 100) {
    $c++;
    $d = $d + $c;
}
echo "$d<br>";
// Estructura C
$e = 0;
$f = 0;
do {
    $f += $e;
    $e++;
} while ($e <= 100);
echo $f;
?>