<<<<<<< HEAD <html>

    <head>
        <title>title</title>
        <style>
            h1 {
                margin-bottom: 0;
            }

            .encabezado {
                background-color: #ddf0a4;
            }

            .contenido {
                background-color: #EEEEEE;
                height: 600px;
            }

            .pie {
                background-color: #ddf0a4;
                color: #ff0000;
                height: 30px;
            }
        </style>
    </head>

    <body>
        <?php
        try {
            $conex = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
            $conex->set_charset("utf8mb4");
            $result = $conex->query("select * from producto");
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        ?>
        <div class="encabezado">
            <h1>Ejercicio: Conjuntos de resultados en Mysqli</h1>
            <p>Producto</p>
            <form action="" method="post">
                <select id="opciones" name="opcion">
                    <?php
                    try {
                        while ($fila = $result->fetch_object()) {
                            echo "<option value='$fila->cod'";
                            if (isset($_POST['opcion']) && $_POST['opcion'] == $fila->cod) {
                                echo " selected";
                            }
                            echo ">$fila->nombre_corto</option>";
                        }
                    } catch (Exception $ex) {
                        echo 'FALLO';
                    }
                    ?>
                </select>
                <input type="submit" name="enviar" value="enviar">
            </form>
        </div>
        <div class="contenido">
            <h2>Stock del producto en las tiendas: </h2>
            <?php
            if (isset($_POST['enviar'])) {
                try {
                    $resultado = $conex->query("select * from stock s, tienda t where s.tienda = t.cod and s.producto = '$_POST[opcion]'");
                    ?>
                    <form action="" method="post">
                        <?php
                        while ($fila = $resultado->fetch_object()) {
                            echo "Tienda: $fila->nombre : <input type='number' name='$fila->nombre' value='$fila->unidades'> unidades<br>";
                        }
                        ?>
                        <input type="hidden" name="producto" value="<?php echo $_POST['opcion'] ?>">
                        <input type="submit" value="enviar2" name="enviar2">
                    </form>
                    <?php
                } catch (Exception $exc) {
                    echo $ex->getMessage();
                }
            }

            if (isset($_POST["enviar2"])) {
                try {
                    $stmt = $conex->prepare("update stock s, tienda t set s.unidades = ? where s.producto = ? and s.tienda = t.cod and t.nombre = ?");
                    $result = $conex->query("select nombre from tienda");
                    while ($fila = $result->fetch_object()) {
                        if (isset($_POST[$fila->nombre])) {
                            $stmt->bind_param("iss", $_POST[$fila->nombre], $_POST['producto'], $fila->nombre);
                            $stmt->execute();
                        }
                    }
                } catch (Exception $exc) {
                    echo $ex->getMessage();
                }
                $stmt->close();
            }
            ?>
        </div>

        <?php $conex->close(); ?>
    </body>

    =======html>

    <head>
        <title>title</title>
        <style>
            h1 {
                margin-bottom: 0;
            }

            .encabezado {
                background-color: #ddf0a4;
            }

            .contenido {
                background-color: #EEEEEE;
                height: 600px;
            }

            .pie {
                background-color: #ddf0a4;
                color: #ff0000;
                height: 30px;
            }
        </style>
    </head>

    <body>
        <?php
        try {
            $conex = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
            $conex->set_charset("utf8mb4");
            $result = $conex->query("select * from producto");
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        ?>
        <div class="encabezado">
            <h1>Ejercicio: Conjuntos de resultados en Mysqli</h1>
            <p>Producto</p>
            <form action="" method="post">
                <select id="opciones" name="opcion">
                    <?php
                    try {
                        while ($fila = $result->fetch_object()) {
                            echo "<option value='$fila->cod'";
                            if (isset($_POST['opcion']) && $_POST['opcion'] == $fila->cod) {
                                echo " selected";
                            }
                            echo ">$fila->nombre_corto</option>";
                        }
                    } catch (Exception $ex) {
                        echo 'FALLO';
                    }
                    ?>
                </select>
                <input type="submit" name="enviar" value="enviar">
            </form>
        </div>
        <div class="contenido">
            <h2>Stock del producto en las tiendas: </h2>
            <?php
            if (isset($_POST['enviar'])) {
                try {
                    $resultado = $conex->query("select * from stock s, tienda t where s.tienda = t.cod and s.producto = '$_POST[opcion]'");
                    ?>
                    <form action="" method="post">
                        <?php
                        while ($fila = $resultado->fetch_object()) {
                            echo "Tienda: $fila->nombre : <input type='number' name='$fila->nombre' value='$fila->unidades'> unidades<br>";
                        }
                        ?>
                        <input type="hidden" name="producto" value="<?php echo $_POST['opcion'] ?>">
                        <input type="submit" value="enviar2" name="enviar2">
                    </form>
                    <?php
                } catch (Exception $exc) {
                    echo $ex->getMessage();
                }
            }

            if (isset($_POST["enviar2"])) {
                try {
                    $stmt = $conex->prepare("update stock s, tienda t set s.unidades = ? where s.producto = ? and s.tienda = t.cod and t.nombre = ?");
                    $result = $conex->query("select nombre from tienda");
                    while ($fila = $result->fetch_object()) {
                        if (isset($_POST[$fila->nombre])) {
                            $stmt->bind_param("iss", $_POST[$fila->nombre], $_POST['producto'], $fila->nombre);
                            $stmt->execute();
                            //numero de filas devueltas con mysqli
                            $result = $stmt->get_result();
                            $result->num_rows;
                        }
                    }
                } catch (Exception $exc) {
                    echo $ex->getMessage();
                }
                $stmt->close();
            }
            ?>
        </div>

        <?php $conex->close(); ?>
    </body>

    >>>>>>> f94b01f6267d3c5706f2f6cd382322f8042ce4c4

    </html>