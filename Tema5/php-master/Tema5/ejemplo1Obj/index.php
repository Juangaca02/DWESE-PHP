<?php
require_once "Persona.php";
$persona = new Persona();
$persona2 = new Persona();
//Si tenemos todos los getters y los setters
//echo $persona->getNombre();
echo $persona->nombre;
echo "<br>";
$persona->nombre = "Antonio";
echo $persona->nombre;
echo "<br>";
echo $persona::OJOS;
echo "<br>";
unset($persona2);
echo Persona::getNumPerson();
echo "<br>";
echo $persona;

//Si usas p = p2 se copia la direccion de memoria

//Para clonar
$persona2 = clone ($persona);

//Metodo magico para el clone, para cuando no queramos clonar exacto __clone()
echo "<br>======================================================================<br>";
$persona->modificar("Aguayo");
echo "<br>";
echo $persona;
echo "<br>";
$persona->modificar("Aguayo", "Guerrero");
echo "<br>";
echo $persona;
echo "<br>";
$persona->modificar("Aguayo", "Guerrero", "MALITO");
echo "<br>";
echo $persona;
echo "<br>";


?>