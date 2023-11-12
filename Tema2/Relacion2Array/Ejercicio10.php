<?php

$numeros = array(3, 2, 8, 123, 5, 1);
asort($numeros);
echo '<table border="1">';
echo '<tr><th>Índice</th><th>Valor</th></tr>';

foreach ($numeros as $indice => $valor) {
    echo '<tr>';
    echo '<td>' . $indice . '</td>';
    echo '<td>' . $valor . '</td>';
    echo '</tr>';
}

echo '</table>';

$numeros2 = array(8, 46, 82, 3, 1, 75);
$arrayJuntos = array_merge($numeros, $numeros2);
asort($arrayJuntos);
echo '<table border="1">';
echo '<tr><th>Índice</th><th>Valor</th></tr>';

foreach ($arrayJuntos as $indice => $valor) {
    echo '<tr>';
    echo '<td>' . $indice . '</td>';
    echo '<td>' . $valor . '</td>';
    echo '</tr>';
}

echo '</table>';
?>