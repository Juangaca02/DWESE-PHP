<?php
require_once "Empleado.php";
$emp = new Empleado("Rafael", "Munoz", 77, 0);
$emp->nombre = "juan";
echo "$emp <br>";

$emp_json = json_encode($emp);
var_dump($emp_json);
$emp2 = json_decode($emp_json);
var_dump($emp2);
?>