<?php
/*if (isset($_GET['numCarta'])) {
    for ($i = 0; $i < 3; $i++) {
        $num = rand(1, 4);
        if ($num == 1) {
            $carta = rand(1, 12);
            if ($carta > 0 && $carta < 10) {
                echo "";
            }
        }
        if ($num == 2) {
            $carta = rand(1, 12);
        }
        if ($num == 3) {
            $carta = rand(1, 12);
        }
        if ($num == 4) {
            $carta = rand(1, 12);
        }
    }

}
*/
function obtener_cartas($numCarta)
{
    $palos = ['Oros', 'Copas', 'Espadas', 'Bastos'];
    $figuras = ['As', '2', '3', '4', '5', '6', '7', 'Sota', 'Caballo', 'Rey'];

    if ($numCarta < 1 || $numCarta > 40) {
        return json_encode(["error" => "El número de cartas debe estar entre 1 y 40"]);
    }

    $mazo = [];

    while (count($mazo) < $numCarta) {
        $carta = [
            "palo" => $palos[array_rand($palos)],
            "figura" => $figuras[array_rand($figuras)]
        ];

        if (!in_array($carta, $mazo)) {
            $mazo[] = $carta;
        }
    }

    return json_encode(["cartas" => $mazo]);
}

if (isset($_GET['numCarta'])) {
    $numCarta = intval($_GET['numCarta']);
    echo obtener_cartas($numCarta);
} else {
    echo json_encode(["error" => "Debes proporcionar el numero de cartas como parametro en la URL"]);
}





?>