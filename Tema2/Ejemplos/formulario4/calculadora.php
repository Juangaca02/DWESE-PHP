

<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <form action="" method="POST">
            Numero de Filas de la matriz: <input type="number" name="filas"><br>
            Numero de Columnas de la matriz: <input type="number" name="columnas"><br>
            <input type="submit" name="Enviar1" value="Enviar">
        </form>
        <?php
        require_once './funciones.php';
        if (isset($_POST['Enviar1'])) {
            switch ($_GET) {
                case "sumaFilas":
                    break;
                case "sumaColumnas":
                    break;
                case "sumaAmbas":
                    break;
                case "sumaDiagonal":
                    break;
                case "matriz":
                    break;

                default:
                    break;
            }
        }



        if (isset($_POST['Enviar1'])) {
            $m = crearMatriz($_POST['filas'], $_POST['columnas']);
            if (isset($_GET['sumaFilas']) && isset($_POST['Enviar1'])) {
                mostrarMatriz($m);
                sumaFilas($m);
                echo '<a href="index.php">Menu</a>';
            }
            if (isset($_GET['sumaColumnas']) && isset($_POST['Enviar1'])) {
                 mostrarMatriz($m);
                 sumaColumnasl($m);
                echo '<a href="index.php">Menu</a>';
            }
            if (isset($_GET['sumaAmbas']) && isset($_POST['Enviar1'])) {
                echo 'POPO3';
            }
            if (isset($_GET['sumaDiagonal']) && isset($_POST['Enviar1'])) {
                mostrarMatriz($m);
                sumaDiagonal($m);
                echo '<a href="index.php">Menu</a>';
            }
            if (isset($_GET['matriz'])) {
                echo 'POPO5';
            }
        }
        ?>

    </body>
</html>


