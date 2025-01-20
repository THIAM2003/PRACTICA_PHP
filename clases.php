<?php

//Para que PHP sea mas estricto con los tipos de datos a nivel de archivo
declare(strict_types=1);

class SuperHero{

    //Cuando no se usa Properties promotion:
    // public $name;
    // public $powers;
    // public $planet;

    //Con Properties promotion
    public function __construct(
        //Es una opción para que despues no se pueda modificar el valor
        //readonly public String $name,
        //Con private no se puede acceder a la propiedad desde afuera de la clase
        private String $name,
        public array $powers,
        public String $planet
    ){
    }

    public function show_all(){
        //Muestra el objeto como un JsonArray
        return get_object_vars($this);
    }

    public function attack(){
        return "¡$this->name ataca con sus poderes";
    }

    public function description(){
        //Un array a string implode, explode hace lo contrario
        $powers = implode(", ", $this->powers);
        return "$this->name es un superheroe que viene de $this->planet y tiene los siguientes poderes: $powers";
    }

    public static function random(){
        $names = ["Superman", "Batman", "Wolverine", "Spiderman"];
        $powers = [
            ["Volar", "Super fuerza"],
            ["Dinero", "Tecnología"],
            ["Garras", "Regeneración"],
            ["Telarañas", "Sentido arácnido"]
        ];

        $planets = ["Kripton", "Tierra", "Marte", "HulkWorld"];

        //devuelve una llave aleatoria del array $names permitiendo acceder a un valor aleatorio
        $name = $names[array_rand($names)];
        $power = $powers[array_rand($powers)];
        $planet = $planets[array_rand($planets)];

        //echo "El superheroe aleatorio es: $name, que viene de $planet y tiene los poderes: ".implode(", ", $power);

        //La otra opcion es crear la instancia desde aqui:
        //El self se refiere a la propia clase, en este caso SuperHero
        return new self($name, $power, $planet);
    }

}

//Cuando no se usa Properties promotion:
//Estaria creando toda la "Plantilla" sin valores y luego le asigno los valores así:
// $hero = new SuperHero();
// $hero->name = "Superman";
// $hero->powers = ["Volar", "Super fuerza"];
// $hero->planet = "Kripton";

//Con Properties promotion: Ya se le asignan los valores en el constructor

//Con instancia
// $hero = new SuperHero("Superman", ["Volar", "Super fuerza"], "Kripton");
// echo $hero->description(); //metodo publico
// Con private no puedo hacer una lectura como echo $hero->name, ya que solo se accede desde dentro de      la clase
// Si no uso readonly podrian hacer esto y cambiar el nombre $hero->name = "Batman";

// var_dump($hero->show_all());

//Con el static function no debo escribir $hero = new SuperHero(); ya que se crea solo,
//Así solo debo llamar la función
SuperHero::random(); //metodo estatico

//Con self:
$hero = SuperHero::random();
echo $hero->description();


?>