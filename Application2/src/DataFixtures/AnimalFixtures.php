<?php

namespace App\DataFixtures;

use App\Entity\Animal;
use App\Entity\Continent;
use App\Entity\Dispose;
use App\Entity\Famille;
use App\Entity\Personne;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AnimalFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $personne1 = new Personne();
        $personne1->setNom("Milo");
        $manager->persist($personne1);

        $personne2 = new Personne();
        $personne2->setNom("Tya");
        $manager->persist($personne2);

        $personne3 = new Personne();
        $personne3->setNom("Lili");
        $manager->persist($personne3);

        $continent1 = new Continent();
        $continent1->setLibelle('Europe');
        $manager->persist($continent1);

        $continent2 = new Continent();
        $continent2->setLibelle('Amérique');
        $manager->persist($continent2);

        $continent3 = new Continent();
        $continent3->setLibelle('Asie');
        $manager->persist($continent3);

        $continent4 = new Continent();
        $continent4->setLibelle('Afrique');
        $manager->persist($continent4);

        $continent5 = new Continent();
        $continent5->setLibelle('Océanie');
        $manager->persist($continent5);

        $famille1 = new Famille();
        $famille1->setLibelle("mammifères")
                 ->setDescription("Animaux vertébrés nourissant leurs petits avec du lait");
        $manager->persist($famille1);

        $famille2 = new Famille();
        $famille2->setLibelle("reptiles")
                 ->setDescription("Animaux vertébrés qui rampent");
        $manager->persist($famille2);

        $famille3 = new Famille();
        $famille3->setLibelle("poissons")
                 ->setDescription("Animaux invertébrés du monde aquatique");
        $manager->persist($famille3);

        $animal1 = new Animal();
        $animal1->setNom("Chien")
                ->setDescription("Animal domestique")
                ->setImage("chien.png")
                ->setPoids(10)
                ->setDangereux(false)
                ->setFamille($famille1)
                ->addContinent($continent1)
                ->addContinent($continent2)
                ->addContinent($continent3)
                ->addContinent($continent4)
                ->addContinent($continent5);
        $manager->persist($animal1); 

        $animal2 = new Animal();
        $animal2->setNom("Cochon")
                ->setDescription("Animal d'élevage")
                ->setImage("cochon.png")
                ->setPoids(60)
                ->setDangereux(false)
                ->setFamille($famille1)
                ->addContinent($continent1)
                ->addContinent($continent5);
        $manager->persist($animal2); 

        $animal3 = new Animal();
        $animal3->setNom("Serpent")
                ->setDescription("Animal dangereux")
                ->setImage("serpent.png")
                ->setPoids(5)
                ->setDangereux(true)
                ->setFamille($famille2)
                ->addContinent($continent2)
                ->addContinent($continent3)
                ->addContinent($continent4);
        $manager->persist($animal3); 

        $animal4 = new Animal();
        $animal4->setNom("Crocodile")
                ->setDescription("Animal très dangereux")
                ->setImage("croco.png")
                ->setPoids(200)
                ->setDangereux(true)
                ->setFamille($famille2)
                ->addContinent($continent3)
                ->addContinent($continent4)
                ->addContinent($continent5);
        $manager->persist($animal4); 

        $animal5 = new Animal();
        $animal5->setNom("Requin")
                ->setDescription("Animal marin très dangereux")
                ->setImage("requin.png")
                ->setPoids(400)
                ->setDangereux(true)
                ->setFamille($famille3)
                ->addContinent($continent5);
        $manager->persist($animal5); 

        $dispose1 = new Dispose();
        $dispose1->setPersonne($personne1)
                 ->setAnimal($animal1)
                 ->setNb(30);
        $manager->persist($dispose1);
                 
        $dispose2 = new Dispose();
        $dispose2->setPersonne($personne1)
                 ->setAnimal($animal2)
                 ->setNb(10);
        $manager->persist($dispose2);

        $dispose3 = new Dispose();
        $dispose3->setPersonne($personne1)
                 ->setAnimal($animal3)
                 ->setNb(2);
        $manager->persist($dispose3);

        $dispose4 = new Dispose();
        $dispose4->setPersonne($personne2)
                 ->setAnimal($animal3)
                 ->setNb(5);
        $manager->persist($dispose4);

        $dispose5 = new Dispose();
        $dispose5->setPersonne($personne2)
                 ->setAnimal($animal4)
                 ->setNb(10);
        $manager->persist($dispose5);

        $dispose6 = new Dispose();
        $dispose6->setPersonne($personne3)
                 ->setAnimal($animal5)
                 ->setNb(20);
        $manager->persist($dispose6);

        $manager->flush();
    }
}
