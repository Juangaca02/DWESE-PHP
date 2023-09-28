<?php
$a = array("Enero" => 9, "Febrero" => 12, "Marzo" => 0, "Abril" => 17);

foreach ($a as $ind => $valor) {
    if ($valor != 0) {
        echo $ind . "<br>";
    }
}
?>