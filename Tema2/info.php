<?php

//Array
$a = [1, "Pepe", 33.3, "Juan"];
print_r($a);
echo '<br>';
$a[] = "Lucena";
print_r($a);
echo '<br>';
$a[9] = "Cordoba";
$a["Ciudad"] = "Malaga";
print_r($a);

/* $a['nombre'] = "Pepe";
 * $a['salario'] = 2700;
 * $a['Apellido'] ="Martinez"
 * Foreach($a as $ind=>$valor){
 *  echo $ind.":".$valor."<br>";
 * }
 *
  echo '<br>';
  $b[][] = 0;
  $b[][] = 1;
  $b[3][] = 2;
  $b[2][] = 3;
  $b[1][] = 4;
  $b[2][] = 5;
  print_r($b); 
 * 
 * 
 * 
 *  */

$b = array(
    0 => array("codigo" => 11, "nombre" => "Pepe", "salario" => "2700"),
    1 => array("codigo" => 22, "nombre" => "Juan", "salario" => "7000"),
    2 => array("codigo" => 33, "nombre" => "Pino", "salario" => "9000"));

foreach ($b as $c => $fila) {
    echo "<br>" . $c . "<br>";
    foreach ($fila as $v => $valor) {
        echo("<br>" . $valor . "<br>");
    }
}
?>




