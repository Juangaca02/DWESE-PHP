<?php

function generarMazo($cantidadCartas)
{
    $baraja = array(
        'Oros' => array('As', '2', '3', '4', '5', '6', '7', 'Sota', 'Caballo', 'Rey'),
        'Copas' => array('As', '2', '3', '4', '5', '6', '7', 'Sota', 'Caballo', 'Rey'),
        'Espadas' => array('As', '2', '3', '4', '5', '6', '7', 'Sota', 'Caballo', 'Rey'),
        'Bastos' => array('As', '2', '3', '4', '5', '6', '7', 'Sota', 'Caballo', 'Rey')
    );

    $mazo = array();
    $contador = 0;

    while ($contador < $cantidadCartas) {
        $palo = array_rand($baraja);
        $indiceFigura = array_rand($baraja[$palo]);
        $figura = $baraja[$palo][$indiceFigura];

        if (!in_array("$palo - $figura", $mazo)) {
            $mazo[] = "$palo - $figura";
            $contador++;
        }
    }

    return $mazo;
}

if (isset($_GET['numCartas'])) {
    $numCartas = $_GET['numCartas'];

    if ($numCartas >= 1 && $numCartas <= 40) {
        $mazo_generado = generarMazo($numCartas);
        echo json_encode($mazo_generado);
    } else {
        echo json_encode(array('error' => 'El número de cartas debe estar entre 1 y 40.'));
    }
} else {
    echo json_encode(array('error' => 'Escribe un número.'));
}
?>