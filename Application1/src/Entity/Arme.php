<?php
namespace App\Entity;

class Arme {
    private $nom;
    private $description;
    private $degat;

    public static $armes = [];

    public function __construct($nom, $description, $degats) {
        $this->nom = $nom;
        $this->description = $description;
        $this->degats = $degats;
        self::$armes[] = $this;
    }

    public function getNom()  {
        return $this->nom;
    }
    public function getDescription()  {
        return $this->description;
    }
    public function getDegats()  {
        return $this->degats;
    }
    public function setNom($nom)  {
        $this->nom = $nom;
        return $this;
    }
    public function setDescription($description)  {
        $this->description = $description;
        return $this;
    }
    public function setDegats($degats)  {
        $this->degats = $degats;
        return $this;
    }

    public function creerArme() {
        new Arme("epee", "Une superbe épée tranchante", 10);
        new Arme("hache", "Une arme ou un outil", 15);
        new Arme("arc", "Une arme à distance", 7);
    }

    public static function getArmeParNom($nom) {
        foreach(self::$armes as $arme) {
            if (strtolower(str_replace("é", "e", $arme->nom)) === $nom) {
                return $arme;
            }
        }
    }
}