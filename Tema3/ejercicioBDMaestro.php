<form action="" method="POST">
    CÃ³digo: <input type="text" name="codigo"><br>
    Nombre: <input type="text" name="nombre"><br>
    Apellidos: <input type="text" name="apell"><br>
    Salario: <input type="text" name="sal"><br>
    Idiomas:<br>
    <input type="checkbox" name="idiomas[]" value="1">EspaÃ±ol<br>
    <input type="checkbox" name="idiomas[]" value="2">InglÃ©s<br>
    <input type="checkbox" name="idiomas[]" value="4">AlemÃ¡n<br>
    <input type="checkbox" name="idiomas[]" value="8">Chino<br>
    <input type="checkbox" name="idiomas[]" value="16">FrancÃ©s<br>
    Estudios:
    <select multiple="" name="estudios[]">
        <option value="ESO">ESO</option><br>
        <option value="Bachillerato">Bachillerato</option><br>
        <option value="CFGM">CFGM</option><br>
        <option value="CFGS">CFGS</option><br>
    </select><br>
    usuario: <input type="text" name="usu"><br>
    password: <input type="text" name="pass"><br>
    <input type="submit" name="guardar" value="Guardar">
    <input type="submit" name="recuperar" value="Recuperar">
</form>
<?php
if (isset($_POST['guardar'])) {
    try {
        $conex = new mysqli('localhost', 'dwes', 'abc123.', 'prueba');
        $conex->set_charset('utf8mb4');
        $idio = 0;
        foreach ($_POST['idiomas'] as $value)
            $idio = $idio + $value;
        $estud = implode("-", $_POST['estudios']);
        $conex->query("INSERT INTO empleados VALUES ($_POST[codigo],'$_POST[nombre]','$_POST[apell]',$_POST[sal],$idio,'$estud','$_POST[usu]','$_POST[pass]')");
    } catch (Exception $ex) {
        die($ex->getMessage());
    }
    echo "Registro insertado correctamente";
    $conex->close();
}
if (isset($_POST['recuperar'])) {
    try {
        $conex = new mysqli('localhost', 'dwes', 'abc123.', 'prueba');
        $conex->set_charset('utf8mb4');
        $result = $conex->query("SELECT * FROM empleados WHERE Codigo=2");
    } catch (Exception $ex) {
        die($ex->getMessage());
    }
    if ($result->num_rows > 0) {
        $reg = $result->fetch_object();
        echo "Nombre: " . $reg->Nombre . "<br>";
        echo "Apellidos: " . $reg->Apellidos . "<br>";
        echo "Idiomas: " . $reg->Idiomas . "<br>";
        echo "Estudios: " . $reg->Estudios . "<br>";
    } else {
        echo "No se ha recuperado nada";
    }
}