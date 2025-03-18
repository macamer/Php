<?php

class SuperHero {
    /*public $name;
    public $powers;
    public $planet;

    public function __construct($name, $powers, $planet) {
        $this->name = $name;
        $this->powers = $powers;
        $this->planet = $planet;
    }*/

    //promoted properties PHP 8 - ya se definen propiedades en el constructor
    public function __construct(
        public string $name, 
        public array $powers, 
        public string $planet,
    ) {}
    //readonly public string $name --> para evitar que se modifique
    //private $name --> no se puede acceder al dato


    public function attack() {
        return "$this->name ataca con sus poderes!";
    }

    public function show_all() {
        return get_object_vars($this);
    }

    public function description() {

        $powers = implode(", ", $this->powers);

        return "$this->name es un superhéroe que viene de
        $this->planet y tiene los siguientes poderes:
        $powers";
    }

    public static function random () {
        $names = ["Thor", "Spiderman", "Wolverine", "Ironman", "Hulk"];
        $powers = [
            ["Superfuerza", "Volar", "Rayos láser"],
            ["Superfuerza", "Super agilidad", "Telarañas"],
            ["Regeneración", "Volar", "Garras de adamantium"],
            ["Superfuerza", "Supervelocidad", "Hablar con los peces"],
            ["Superfuerza", "Volar", "Cambio de tamaño"],
        ];
        $planets = ["Asgard", "Tierra","Moon","Krypton", "Marte"];

        $name = $names[array_rand($names)];
        $power = $powers[array_rand($powers)];
        $planet = $planets[array_rand($planets)];

        echo "El superhéroe elegido es $name, que viene de $planet y tiene los siguientes poderes: " . implode(", ", $power);
    }
}

$hero = new SuperHero("Superman", ["Volar", "Supervista", "Fuerza"], "Krypton");
//echo $hero->description();

SuperHero::random();