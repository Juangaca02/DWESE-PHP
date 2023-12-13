<html>

<body>

</body>
<?php
require_once '../controladores/JuegoContrloler.php';
require_once '../clases/Cliente.php';
?>
<nav>
    <div>
        <?php
        if (isset($_SESSION['cliente'])) {
            echo "Hola Buenas tardes " . $_SESSION['cliente'];
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
        }
        ?>
    </table>
</div>
<div>
    <form action="" meto></form>
</div>


</html>