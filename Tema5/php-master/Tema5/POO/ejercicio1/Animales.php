<?php
class Animal
{
    public $nombre;
    public $tipo;

    public function __construct($nombre, $tipo)
    {
        $this->nombre = $nombre;
        $this->tipo = $tipo;
    }

    public function comer()
    {
        return "$this->nombre está comiendo.";
    }

    public function dormir()
    {
        return "$this->nombre está durmiendo.";
    }

    public function emitirSonido()
    {
        return "$this->nombre emite un sonido genérico.";
    }
}

class Mamifero extends Animal
{
    public function amamantar()
    {
        return "$this->nombre está amamantando a sus crías.";
    }

    public function dormir()
    {
        return "$this->nombre está durmiendo profundamente como un mamífero.";
    }
}

class Ave extends Animal
{
    public function volar()
    {
        return "$this->nombre está volando en el cielo.";
    }
}

class Gato extends Mamifero
{
    public function __construct($nombre)
    {
        parent::__construct($nombre, 'Felino');
    }

    public function emitirSonido()
    {
        return "$this->nombre hace un sonido de maullido: ¡Miau!";
    }
}

class Perro extends Mamifero
{
    public function __construct($nombre)
    {
        parent::__construct($nombre, 'Canino');
    }

    public function emitirSonido()
    {
        return "$this->nombre hace un sonido de ladrido: ¡Guau!";
    }
}

class Canario extends Ave
{
    public function __construct($nombre)
    {
        parent::__construct($nombre, 'Pájaro');
    }

    public function emitirSonido()
    {
        return "$this->nombre canta melodiosamente: ¡Trino, trino!";
    }
}

class Pinguino extends Ave
{
    public function __construct($nombre)
    {
        parent::__construct($nombre, 'Pringao');
    }

    public function volar()
    {
        return "$this->nombre no puede volar, te jodes";
    }
}

$animal = new Animal('Animal Genérico', 'Genérico');
echo $animal->comer() . "<br>";
echo $animal->dormir() . "<br>";
echo $animal->emitirSonido() . "<br>";

$mamifero = new Mamifero('Mamífero Genérico', 'Genérico');
echo $mamifero->comer() . "<br>";
echo $mamifero->dormir() . "<br>";
echo $mamifero->emitirSonido() . "<br>";
echo $mamifero->amamantar() . "<br>";

$ave = new Ave('Ave Genérica', 'Genérico');
echo $ave->comer() . "<br>";
echo $ave->dormir() . "<br>";
echo $ave->emitirSonido() . "<br>";
echo $ave->volar() . "<br>";

$gato = new Gato('El de Antonio');
echo $gato->comer() . "<br>";
echo $gato->dormir() . "<br>";
echo $gato->emitirSonido() . "<br>";
echo $gato->amamantar() . "<br>";

$perro = new Perro('Snoopy');
echo $perro->comer() . "<br>";
echo $perro->dormir() . "<br>";
echo $perro->emitirSonido() . "<br>";
echo $perro->amamantar() . "<br>";

$canario = new Canario('Piolín');
echo $canario->comer() . "<br>";
echo $canario->dormir() . "<br>";
echo $canario->emitirSonido() . "<br>";
echo $canario->volar() . "<br>";

$pinguino = new Pinguino('Tux');
echo $pinguino->comer() . "<br>";
echo $pinguino->dormir() . "<br>";
echo $pinguino->emitirSonido() . "<br>";
echo $pinguino->volar() . "<br>";
?>