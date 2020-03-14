<?php

namespace App\Controller;

use App\Entity\RechercheVoiture;
use App\Entity\Voiture;
use App\Form\RechercheVoitureType;
use App\Form\VoitureType;
use App\Repository\VoitureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(VoitureRepository $repo, PaginatorInterface $paginator, Request $request)
    {
        $rechercheVoiture = new RechercheVoiture();

        $form = $this->createForm(RechercheVoitureType::class, $rechercheVoiture);
        $form->handleRequest($request);
        //if ($form->isSubmitted() && $form->isValid()) {

        //}
        $voitures = $paginator->paginate(
            $repo->findAllWithPagination($rechercheVoiture),
            $request->query->getInt('page', 1), /* page number */ 
            6 /* limit per page */
        );

        return $this->render('voiture/voitures.html.twig', [
            'voitures' => $voitures,
            'form'     => $form->createView(),
            'admin'    => true 
        ]);
    }
    /**
     * @Route("/admin/creation", name="admin_ajout")
     * @Route("/admin/{id}", name="admin_modif")
     */
    public function modification(Voiture $voiture = null, Request $request, EntityManagerInterface $em) {

        if (!$voiture) {
            $voiture = new Voiture();
        }
        $form = $this->createForm(VoitureType::class, $voiture);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $em->persist($voiture);
            $em->flush();
            $this->addFlash('success', "L'action a été effectuée");
            return $this->redirectToRoute('admin');
        }
        return $this->render('admin/modification.html.twig', [
            'voiture' => $voiture,
            'form'     => $form->createView()
        ]);

    }
    /**
     * @Route("/admin/suppression/{id}", name="supVoiture", method="SUP")
     */
    public function suppression(voiture $voiture, EntityManagerInterface $em) {
        // vérif csrf token à faire
        $em->remove($voiture);
        $em->flush();
        $this->addFlash('success', "La suppression a été effectuée");
        return $this->redirectToRoute('admin');
    }
}
