<?php

namespace App\Entity;

class Personnage {

    public $pseudo;
    public $age;
    public $sexe;
    public $carac = [];

    public static $personnages = [];

    public function __construct($pseudo, $age, $sexe, $carac) {
        $this->pseudo = $pseudo;
        $this->age = $age;
        $this->sexe = $sexe;
        $this->carac = $carac;
        self::$personnages[] = $this;
    }

    public static function creerPersonnages() {
        $p1 = new Personnage("Marc", 39, true, [
            "force" => 2,
            "agi"   => 2,
            "intel" => 3
        ]);
        $p2 = new Personnage("Milo", 28, true, [
            "force" => 3,
            "agi"   => 1,
            "intel" => 3
        ]);
        $p3 = new Personnage("Tya", 32, false, [
            "force" => 2,
            "agi"   => 1,
            "intel" => 4
        ]);
    }

    public static function getPersonnageParNom($pseudo) {
        foreach(self::$personnages as $perso) {
            if (strtolower($perso->pseudo) === $pseudo) {
                return $perso;
            }
        }
    }
}