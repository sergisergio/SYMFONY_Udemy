<?php

namespace App\Controller;

use App\Entity\Personne;
use App\Repository\PersonneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PersonneController extends AbstractController
{
    /**
     * @Route("/personnes", name="personnes")
     */
    public function index(PersonneRepository $repo)
    {
        $personnes = $repo->findAll();
        return $this->render('personne/index.html.twig', [
            'personnes' => $personnes,
        ]);
    }

    /**
     * @Route("/personne/{id}", name="personne")
     */
    public function personne(Personne $personne)
    {
        return $this->render('personne/personne.html.twig', [
            'personne' => $personne,
        ]);
    }
}
