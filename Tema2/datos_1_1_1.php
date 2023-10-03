<?php ?>
<form action="" method="POST">
    Nombre: <input type="text" name="nombre"><br>
    Apellidos: <input type="text" name="apell"><br>
    Sexo: <input type="radio" name="sexo[]" value="hombre"> Hombre <input type="radio" name="sexo[]" value="mujer"> Mujer <input type="radio" name="sexo[]" value="otro"> Otro<br>
    Aficiones: <input type="checkbox" name="aficiones[]" value="cine"> Cine <input type="checkbox" name="aficiones[]" value="lectura"> Lectura <input type="checkbox" name="aficiones[]" value="televivion"> Televivion<br>
    <input type="checkbox" name="aficiones[]" value="deporte"> Deporte <input type="checkbox" name="aficiones[]" value="musica"> Musica <br>
    Estudios <br> <select multiple name="estudios[]">
        <option value="Eso">Eso</option>
        <option value="Bachillerato">Bachillerato</option>
        <option value="FPGM">FPGM</option>
        <option value="FPGS">FPGS</option>
        <option value="Universidad">Universidad</option>
    </select>
    Edad <br> <select multiple name="edad[]">
        <option value="Eso">Edad entre 1 y 14</option>
        <option value="Bachillerato">Edad entre 15 y 25</option>
        <option value="FPGM">Edad entre 26 y 35</option>
        <option value="FPGS">Mas de 36</option>
        <option value="Universidad">Universidad</option>
    </select>

    <input type="submit" name="enviar" value="Enviar">
</form>
<?php
?>
