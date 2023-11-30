<?php
require_once "enlaces.php";



$m = new Mamifero("Mamifero", "bebes");
echo $m . "<br>";
$m->amamantar();

echo "<br>---------------------------------<br>";

$p = new Perro("Firulais", "70cm", "afilados");
echo $p . "<br>";
$p->ladrar();

echo "<br>---------------------------------<br>";

$g = new Gato("Farru", "20cm", "afiladas");
echo $g . "<br>";
$g->maullar();

echo "<br>---------------------------------<br>";
echo "<br>---------------------------------<br>";

$a = new Ave("Ave", "largas");
echo $a . "<br>";
$a->volar();

echo "<br>---------------------------------<br>";

$c = new Canario("Piolin", "bonitas", "violeta");
echo $c . "<br>";
$c->cantar();

echo "<br>---------------------------------<br>";

$p = new Pinguino("Tux", "bonitas", "curvo");
echo $p . "<br>";
$p->nadar();

echo "<br>---------------------------------<br>";
echo "<br>---------------------------------<br>";

$l = new Lagarto("Felix", "robustas");
echo $l . "<br>";
$l->reptar();

echo "<br>---------------------------------<br>";