<html>
    <head>
        <title>matriz</title>
    </head>
    <body>
        <table border="1px">
            <?php
            $arrayDatos = ["Nombre", "Apellidos", "Salario", "Edad"];
            $departamentos = ["Contabilidad", "Marketing", "Ventas", "Informatica", "Direccion"];
            $tabla;

            for ($i = 0; $i < count($departamentos); $i++) {
                $tabla[$departamentos[$i]] = [
                    $arrayDatos[0] => "",
                    $arrayDatos[1] => "",
                    $arrayDatos[2] => "",
                    $arrayDatos[3] => ""
                ];
            }
            echo "<td></td>";
            foreach ($tabla["Contabilidad"] as $key => $value) {
                echo "<td>$key</td>";
             }
            foreach ($tabla as $departamento => $datos) {
                echo "<tr><td>$departamento</td>";
                foreach ($datos as $key => $value) {
                    echo "<td>$value</td>";
                }
                echo '</tr>';
            }
            ?>
        </table>
    </body>
</html>
