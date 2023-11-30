<?php
class Persona
{
    public $nombre;
    public $apellidos;
    public $edad;
    public static $numperson = 0;

    public function __construct($nom = "Antonio", $apel = "Garcia", $ed = 20)
    {
        $this->nombre = $nom;
        $this->apellidos = $apel;
        $this->edad = $ed;
        self::$numperson++;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __clone()
    {
        self::$numperson++;
        $this->edad = 0;
    }
    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public static function getNumPerson()
    {
        return self::$numperson;
    }

    public function __destruct()
    {
        self::$numperson--;
    }

    public function __toString()
    {
        return "Hola me llamo $this->nombre $this->apellidos y tengo $this->edad años";
    }

    public function __call($name, $argumento)
    {
        if ($metodo = "modificar") {
            if (count($argumento) == 1) {
                $this->nombre = $argumento[0];
            } elseif (count($argumento) == 2) {
                $this->nombre = $argumento[0];
                $this->apellidos = $argumento[1];
            } elseif (count($argumento) == 3) {
                $this->nombre = $argumento[0];
                $this->apellidos = $argumento[1];
                $this->edad = $argumento[2];
            }
        }

        if ($metodo == "calcular") {
            //Se pondria el metodo como en el anterior
        }
    }

    /*
        public function getNombre()
        {
            return $this->nombre;
        }

        public function getApellidos()
        {
            return $this->apellidos;
        }

        public function getEdad()
        {
            return $this->edad;
        }

        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }

        public function setApellidos($apellidos)
        {
            $this->apellidos = $apellidos;
        }

        public function setEdad($edad)
        {
            $this->edad = $edad;
        }
*/
}



?>