<html>
    <head>
        <title>title</title>
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
                    try{
                        while($fila = $result->fetch_object()){
                            echo "<option value='$fila->cod'";
                            if(isset($_POST['opcion']) && $_POST['opcion'] == $fila->cod){
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
                if(isset($_POST['enviar'])){
                    try {
                        $resultado = $conex->query("select * from stock s, tienda t where s.tienda = t.cod and s.producto = '$_POST[opcion]'");
                        while($fila = $resultado->fetch_object()){
                            echo "Tienda: $fila->nombre : $fila->unidades unidades<br>";
                        }
                    } catch (Exception $exc) {
                        echo $ex->getMessage();
                    }
                }
            ?>
        </div>
        
        <?php $conex->close(); ?>
    </body>
</html>
