<form action="action" method="post">
    Nombre: <input type="text" name="nombre"><br>
    Apellidos: <input type="text" name="apellidos"><br>
    Salario: <input type="text" name="salario"><br>
    Idiomas: <br>
    <input type="checkbox" name="idiomas[]" value="1">Español<br>
    <input type="checkbox" name="idiomas[]" value="2">Ingles<br>
    <input type="checkbox" name="idiomas[]" value="4">Aleman<br>
    <input type="checkbox" name="idiomas[]" value="8">Japones<br>
    <input type="checkbox" name="idiomas[]" value="16">Frances<br>
    Estudios: <select multiple="" name="estudios[]">
        <option value="ESO">ESO</option><br>
        <option value="Bachillerato">Bachillerato</option><br>
        <option value="CFGM">CFGM</option><br>
        <option value="CFGS">CFGS</option><br>
    </select><br>
    Usuario:<input type="text" name="usuario"><br>
    Password: <input type="text" name="pass"><br>
    <input type="submit" value="guardar" name="Guardar">
    <input type="submit" value="recuperar" name="Recuperar">
</form>
<?php
if (isset($_POST['guardar'])) {
    try {
        $conex = new mysqli('localhost', 'dwes', 'abc123.', 'prueba');
        $conex->set_charset('utf8mb4');
        $idio = 0;
        foreach ($_POST['idiomas'] as $value) {
           $idio = $idio + $value;
        }
        $estud = implode("-", $_POST['estudios']);
        $conex->query("Insert into empleados values ( $_POST[nombre],$_POST[apellidos],$_POST[salario],$idio,'$estud', $_POST[usuario],$_POST[pass]);");
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
    echo "Registrado insertado Correctamente";
}

if (isset($_POST['recuperar'])) {
    try {
        $conex = new mysqli('localhost', 'dwes', 'abc123.', 'prueba');
        $conex->set_charset('utf8mb4');
        $result = $conex->query("Select * from empleados where nombre=juan ;");
    } catch (Exception $exc) {
        die ($exc->getTraceAsString());
    }
    if ($result->num_rows > 0) {
        $reg = $result->fetch_object();
        echo "Nombre: $reg->Nombre <br>";
        echo "Apellidos: $reg->Apellidos <br>";
        echo "Idiomas: $reg->Idiomas <br>";
        echo "Estudios: $reg->Estudios <br>";
    } else {
        echo "No se ha recuperado nada ";
    }
}
?>