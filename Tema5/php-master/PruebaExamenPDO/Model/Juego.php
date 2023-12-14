<?php
class Juego
{
    protected $codigo;
    protected $nombreJuego;
    protected $nombreConsola;
    protected $anno;
    protected $precio;
    protected $alquilado;
    protected $imagen;
    protected $descripcion;

    public function __get($name)
    {
        return $this->$name;
    }
    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __construct($c, $nj, $nc, $a, $p, $alc, $img, $desc)
    {
        $this->codigo = $c;
        $this->nombreJuego = $nj;
        $this->nombreConsola = $nc;
        $this->anno = $a;
        $this->precio = $p;
        //Al principio no está alquilado
        $this->alquilado = $alc;
        $this->imagen = $img;
        $this->descripcion = $desc;
    }


}