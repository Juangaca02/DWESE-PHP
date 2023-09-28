<?php

$numeroPar = 0;

while ($numeroPar < 10) {
    $numeroPar = $numeroPar + 2;
    $a[] = $numeroPar;
}
$b = array_reverse($a);
foreach ($b as $ind) {
    echo '<br>' . $ind . '</br>';
}
?>