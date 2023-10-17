<html>
    <head>
        <meta charset="UTF8">
        <!-- <link rel="stylesheet" type="text/css" href="dwes.css"/> -->
        <style>
            h1 {
                margin-bottom:0;
            }
            .encabezado {
                background-color:#ddf0a4;
            }
            .contenido {
                background-color:#EEEEEE;
                height:600px;
            }
            .pie {
                background-color:#ddf0a4;
                color:#ff0000;
                height:30px;
            }
            
        </style>

    </head>
    <body>
        <div class="encabezado">
            <h1>Ejercicio: Conjunto de resultados de Mysqli </h1>
            <form action="" method="POST">
                Productos: 
                <select name="producto">
                    <?php
                    try {
                        $conex = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
                    } catch (Exception $exc) {
                        die($exc->getTraceAsString());
                    }
                    try {
                        $result = $conex->query("SELECT * FROM producto;");
                        while ($fila = $result->fetch_object()) {
                            echo "<option value='$fila->cod'>$fila->nombre_corto</option>";
                        }
                    } catch (Exception $exc) {
                        echo $exc->getTraceAsString();
                    }
                    ?>
                </select>
                <input type="submit" name="Mostrar" value="Mostrar Stock">
            </form>
        </div>
        <div class="contenido" >
            <h2>Stock del producto en las tiendas:</h2>
            <?php
            if (isset($_POST['Mostrar'])) {

                try {
                    $result = $conex->query("select t.nombre, s.unidades from tienda t, stock s where t.cod = s.tienda and s.producto='$_POST[producto]';");
                    //echo $result->num_rows;
                    while ($fila = $result->fetch_object()) {
                        echo "Tienda: $fila->nombre : $fila->unidades unidades <br>";
                    }
                } catch (Exception $exc) {
                    echo $exc->getTraceAsString();
                }
            }
            ?>
        </div>


    </body>
</html>
