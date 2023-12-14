<<<<<<< HEAD <?php
function crearConexion()
{
    try {
        $conex = new mysqli('localhost', 'dwes', 'abc123.', 'jugadores');
        $conex->set_charset('utf8mb4');
        return $conex;
    } catch (Exception $ex) {
        die($ex->getMessage());
    }
}

function mostrarJugador($fila)
{
    echo "dni jugador $fila->dni<br>";
    echo "nombre jugador $fila->nombre<br>";
    echo "dorsal jugador $fila->dorsal<br>";
    echo "posicion jugador $fila->posicion<br>";
    echo "equipo jugador $fila->equipo<br>";
    echo "goles jugador $fila->goles<br>";
    echo "============================================================================================<br>";

}

function crearSelectPosicion($posicionesFormulario)
{
    echo '<select multiple="" name="posicion[]">';
    $posiciones = ['Portero', 'Defensa', 'Centrocampista', 'Delantero'];
    for ($i = 0; $i < count($posiciones); $i++) {
        echo '<option value="' . pow(2, $i) . '"';
        foreach ($posicionesFormulario as $form) {
            if (pow(2, $i) == $form)
                echo 'selected';
        }
        echo " >$posiciones[$i]</option>";
    }
    echo '</select>';
}

function crearSelectPosicionModificar($posicionesFormulario)
{
    echo '<select multiple="" name="posicion[]">';
    $posiciones = ['Portero', 'Defensa', 'Centrocampista', 'Delantero'];
    for ($i = 0; $i < count($posiciones); $i++) {
        echo '<option value="' . pow(2, $i) . '"';
        foreach ($posicionesFormulario as $form) {
            if (strtolower($posiciones[$i]) == $form)
                echo 'selected';
        }
        echo " >$posiciones[$i]</option>";
    }
    echo '</select>';
}