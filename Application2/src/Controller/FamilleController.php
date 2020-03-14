<?php

namespace App\Controller;

use App\Entity\Famille;
use App\Repository\FamilleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FamilleController extends AbstractController
{
    /**
     * @Route("/familles", name="familles")
     */
    public function index(FamilleRepository $repo)
    {
        $familles = $repo->findAll();
        return $this->render('famille/familles.html.twig', [
            'familles' => $familles
        ]);
    }

    /**
     * @Route("/famille/{id}", name="famille")
     */
    public function famille(Famille $famille)
    {
        return $this->render('famille/famille.html.twig', [
            'famille' => $famille
        ]);
    }
}
