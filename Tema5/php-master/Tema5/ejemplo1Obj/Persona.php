<?php
class Persona
{
    protected $nombre;
    protected $apellidos;
    protected $edad;
    protected static $numPerson = 0;
    const OJOS = 2;

    public function __construct($nombre = "Juan", $apellidos = "García", $edad = 20)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->edad = $edad;
        self::$numPerson++;
    }

    public function __destruct()
    {
        self::$numPerson--;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __toString()
    {
        return "Nombre:  $this->nombre , Apellidos:  $this->apellidos  Edad:  $this->edad";
    }

    public function __clone()
    {
        self::$numPerson++;
        $this->edad = 0;
    }

    public function __call($method, $args)
    {
        if ($method == "modificar") {
            if (count($args) == 1) {
                $this->nombre = $args[0];
            }
            if (count($args) == 2) {
                $this->nombre = $args[0];
                $this->apellidos = $args[1];
            }
            if (count($args) == 3) {
                $this->nombre = $args[0];
                $this->apellidos = $args[1];
                $this->edad = $args[2];
            }
        }
    }

    public static function getNumPerson()
    {
        return self::$numPerson;
    }

}
?>