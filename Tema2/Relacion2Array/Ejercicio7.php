<?php

$a = array("Pedro", "Ismael", "Sonia", "Clara", "Susana", "Alfonso", "Teresa");

echo "El Array tiene " . count($a) . " elementos";

echo "<ul>";
foreach ($a as $elementos) {
    echo "<li>$elementos</li>";
}
echo "</ul>";


?>