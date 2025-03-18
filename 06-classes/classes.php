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

    public function description() {

        $powers = implode(", ", $this->powers);

        return "$this->name es un superhéroe que viene de
        $this->planet y tiene los siguientes poderes:
        $powers";
    }
}

$hero = new SuperHero("Superman", ["Volar", "Supervista", "Fuerza"], "Krypton");
echo $hero->description();