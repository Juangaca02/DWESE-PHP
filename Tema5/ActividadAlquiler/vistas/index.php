<html>

<body>

</body>
<?php
require_once '../controladores/JuegoContrloler.php';
require_once '../clases/Cliente.php';

session_start();
?>
<nav>
    <div>
        <?php
        if (isset($_SESSION['cliente'])) {
            $botonesAdmin = false;
            if (($_SESSION['cliente']->tipo) == 'cliente') {
                echo "Hola " . $_SESSION['cliente']->tipo . " " . $_SESSION['cliente']->nombre;
            } else {
                echo "Hola " . $_SESSION['cliente']->tipo . " " . $_SESSION['cliente']->nombre;
                $botonesAdmin = true;
            }
        }

        if (isset($_POST['login'])) {
            header("Location:login.php");
        }
        if (isset($_POST['register'])) {
            header("Location:register.php");
        }
        ?>
    </div>
    <div>
        <form action="" method="post" style=" float: right">
            <input type="submit" value="Login" name="login">
            <input type="submit" value="Register" name="register">
        </form>
    </div>
</nav>
<div>
    <table border="1">
        <?php
        $juegos = JuegoControler::todosJuegos();
        if ($juegos != null) {
            echo "<tr>";
            foreach ($juegos as $juego) {
                echo "<td><img src='../$juego->images' width='200px' height='300px'></td>";
            }
            echo "</tr>";
            echo "<tr>";
            foreach ($juegos as $juego) {
                echo "<td>$juego->nombre_juego</td>";
            }
            echo "</tr>";
            if (isset($_SESSION['cliente'])) {
                if ($botonesAdmin) {
                    echo "<tr>";
                    foreach ($juegos as $juego) {
                        echo "<td><input type='submit' value='Modificar' name='Modificar'>
                    <input type='submit' value='Borrar' name='Borrar'></td>";
                    }
                    echo "</tr>";
                }
            }

        }
        ?>
    </table>
</div>
<div>
    <form action="" meto></form>
</div>


</html>