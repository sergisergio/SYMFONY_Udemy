<?php

namespace App\Controller;

use App\Entity\Arme;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArmesController extends AbstractController
{
    /**
     * @Route("/armes", name="armes")
     */
    public function armes()
    {
        Arme::creerArme();
        return $this->render('armes/armes.html.twig', [
            'armes' => Arme::$armes
        ]);
    }

    /**
     * @Route("/armes/{nom}", name="arme")
     */
    public function arme($nom)
    {
        Arme::creerArme();
        $arme = Arme::getArmeParNom($nom);
        return $this->render('armes/arme.html.twig', [
            'arme' => $arme
        ]);
    }
}
