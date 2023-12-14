<<<<<<< HEAD <form action="" method="post">
    Codigo: <input type="text" name='codigo'><br>
    Nombre: <input type="text" name='nombre'><br>
    Apellidos: <input type="text" name='apell'><br>
    Usuario: <input type="text" name='usu'><br>
    Contraseña: <input type="text" name='pass'><br>
    Salario: <input type="number" name='sal'><br>
    Idiomas<br>
    Español: <input type="checkbox" name="idiomas[]" value="1"><br>
    Ingles: <input type="checkbox" name="idiomas[]" value="2"><br>
    Aleman: <input type="checkbox" name="idiomas[]" value="4"><br>
    Frances: <input type="checkbox" name="idiomas[]" value="8"><br>
    Chino: <input type="checkbox" name="idiomas[]" value="16"><br>
    <select multiple="" name="estudios[]">
        <option value="ESO">ESO</option><br>
        <option value="Bachillerato">Bachillerato</option><br>
        <option value="CFGM">CFGM</option><br>
        <option value="CFGS">CFGS</option><br>
    </select><br>
    <input type="submit" name="guardar" value="Guardar">
    <input type="submit" name="recuperar" value="Recuperar">
    </form>
    <?php
    if (isset($_POST['guardar'])) {
        try {
            $conex = new mysqli('localhost', 'dwes', 'abc123.', 'prueba');
            $conex->set_charset('utf8mb4');
            $idio = 0;
            foreach ($_POST['idiomas'] as $value) {
                $idio += $value;
            }
            $estudios = implode("-", $_POST['estudios']);
            $conex->query("insert into empleados values ($_POST[codigo], '$_POST[nombre]', '$_POST[apell]', $_POST[sal], '$_POST[usu]', '$_POST[pass]', $idio, '$estudios')");
            echo "insercion correcta";
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        $conex->close();
    }
    if (isset($_POST['recuperar'])) {
        try {
            $conex = new mysqli('localhost', 'dwes', 'abc123.', 'prueba');
            $conex->set_charset('utf8mb4');
            $result = $conex->query("select * from empleados where Id=$_POST[codigo]");
            if ($result->num_rows > 0) {
                $reg = $result->fetch_object();
                echo "Nombre $reg->Nombre<br> Apellidos $reg->Apellidos<br>";
                echo "Idiomas $reg->idiomas <br>";
                echo "Estudios $reg->estudios <br>";
            } else
                echo "no existe ningun usuario con ese codigo";
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
