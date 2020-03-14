<?php

namespace App\Controller;

use App\Entity\Continent;
use App\Repository\ContinentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ContinentController extends AbstractController
{
    /**
     * @Route("/continent", name="continents")
     */
    public function index(ContinentRepository $repo)
    {
        $continents = $repo->findAll();
        return $this->render('continent/index.html.twig', [
            'continents' => $continents
        ]);
    }

    /**
     * @Route("/continent/{id}", name="continent")
     */
    public function continent(Continent $continent)
    {
        return $this->render('continent/continent.html.twig', [
            'continent' => $continent
        ]);
    }
}
