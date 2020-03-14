<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Repository\AnimalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AnimalController extends AbstractController
{
    /**
     * @Route("/", name="animaux")
     */
    public function index(AnimalRepository $repo)
    {
        $animaux = $repo->findAll();
        return $this->render('animal/index.html.twig', [
            'animaux' => $animaux
        ]);
    }

    /**
     * @Route("/animal/{id}", name="animal")
     */
    public function animal(Animal $animal)
    {
        return $this->render('animal/animal.html.twig', [
            'animal' => $animal
        ]);
    }
}
