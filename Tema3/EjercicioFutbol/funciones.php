<?php
function crearConexion()
{
    try {
        $conex = new mysqli('localhost', 'dwes', 'abc123.', 'futbol');
        $conex->set_charset('utf8mb4');
        return $conex;
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

function mostrarJugador($fila)
{
    echo "<table border='1'>";
    echo "<tr><td>NombreJugador:</td><td>DNI:</td><td>Dorsal:</td><td>Posicion:</td><td>Equipo:</td><td>NumeroGoles:</td></tr>";
    echo "<tr><td>$fila->NombreJugador</td> <td>$fila->DNI</td><td>$fila->Dorsal</td><td>$fila->Posición</td><td>$fila->Equipo</td><td>$fila->NumeroGoles</td></tr>";
    echo "</table>";
    echo "<br>";
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