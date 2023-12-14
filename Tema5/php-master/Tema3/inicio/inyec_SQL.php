<<<<<<< HEAD <form action="" method="post">
    Usuario: <input type="text" name="usu"><br>
    Password: <input type="text" name="password"><br>
    <input type="submit" name="enviar" value="SQL"><br>
    <input type="submit" name="enviar2" value="preparada"><br>
    </form>

    <?php
    if (isset($_POST["enviar"])) {
        try {
            $conex = new mysqli('localhost', 'dwes', 'abc123.', 'prueba');
            $result = $conex->query("select * from empleados where usuario='$_POST[usu]' and pass='$_POST[password]'");
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        if ($result->num_rows > 0) {
            echo "has entrado";
        } else {
            echo "no has entrado";
        }
    }
    if (isset($_POST["enviar2"])) {
        try {
            $conex = new mysqli('localhost', 'dwes', 'abc123.', 'prueba');
            $stmt = $conex->prepare("select * from empleados where usuario=? and pass=?");
            $stmt->bind_param("ss", $_POST['usu'], $_POST['password']);
            $stmt->execute();
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            echo "has entrado";
        } else {
            echo "no has entrado";
        }
    }