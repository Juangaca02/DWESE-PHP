<!-- 
Almacena en un array los 10 primeros números pares. Muéstralos cada uno en una
línea.
-->

<?php
$numeroPar = 0;

while ($numeroPar < 10) {
    $numeroPar = $numeroPar + 2;
    $a[] = $numeroPar;
}
foreach ($a as $ind) {
    echo '<br>' . $ind . '</br>';
}
?>
   