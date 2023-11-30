<?php
require_once 'Persona.php';
require_once 'Empleado.php';

$p = new Persona();
echo "Numero de personas: " . Persona::getNumPerson() . "<br>";
$p1 = new Persona("Pepe", "Lopez", 10);
echo "Numero de personas: " . Persona::getNumPerson() . "<br>";
unset($p);
echo "Numero de personas: " . Persona::getNumPerson() . "<br>";
echo $p1->nombre . "<br>";
$p1->nombre = "Juan";
echo $p1->nombre . "<br>";
echo $p1 . "<br>";
echo "------------------------------------------<br>";
echo "Numero de personas: " . Persona::getNumPerson() . "<br>";
$p2 = clone ($p1);
echo "$p1->nombre $p1->apellidos $p1->edad<br>";
$p2->nombre = "Javier";
echo "$p2->nombre $p2->apellidos $p2->edad<br>";
echo "Numero de personas: " . Persona::getNumPerson() . "<br>";
echo "<br>------------------------------------------<br>";
echo $p1 . "<br>";
$p1->modificar("David");
echo $p1 . "<br>";
$p1->modificar("Pedro", "Fernandez");
echo $p1 . "<br>";
$p1->modificar("Juanito", "Sanches", 23);
echo $p1 . "<br>";
echo "<br>------------------------------------------<br>";
$emp = new Empleado("Juan", "Pino", 24, 2500);
$emp1 = new Empleado();
echo $emp . "<br>";
echo $emp1 . "<br>";

$emp_json = json_encode($emp);
var_dump($emp_json) . "<br>";
$emp2 = json_encode($emp_json);
var_dump($emp2) . "<br>";
echo $emp2 . "<br>";
?>