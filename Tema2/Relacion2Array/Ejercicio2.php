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
<br>
<!--Reformulado -->
<?php
$cont = 0;
$numero = 2;

while ($cont < 10) {
    $numeroPar2[] = $numero;
    $numero += 2;
    $cont++;
}
$b2 = array_reverse($numeroPar2);
foreach ($b2 as $ind) {
    echo '<br>' . $ind . '</br>';
}
?>