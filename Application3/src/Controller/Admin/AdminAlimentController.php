<?php

namespace App\Controller\Admin;

use App\Entity\Aliment;
use App\Form\AlimentType;
use App\Repository\AlimentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class AdminAlimentController extends AbstractController
{
    /**
     * @Route("/admin/aliment", name="admin_aliment")
     */
    public function index(AlimentRepository $repo)
    {
        $aliments = $repo->findAll();
        return $this->render('admin/admin_aliment/adminAliment.html.twig', [
            'aliments' => $aliments,
        ]);
    }

    /**
     * @Route("/admin/aliment/ajout", name="admin_aliments_creation")
     * @Route("/admin/aliment/{id}", name="admin_aliments_modification", methods="GET|POST")
     */
    public function ajoutETModif(Aliment $aliment = null, EntityManagerInterface $em, Request $request)
    {
        if(!$aliment) {
            $aliment = new Aliment();
        }
        $form = $this->createForm(AlimentType::class,$aliment);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $modif = $aliment->getId() !== null;
            $em->persist($aliment);
            $em->flush();
            $this->addFlash("success", ($modif) ? "La modification a été effectuée" : "L'ajout a été effectué");
            return $this->redirectToRoute("admin_aliment");
        }
        return $this->render('admin/admin_aliment/modificationAliment.html.twig', [
            'aliment' => $aliment,
            'form'    => $form->createView(),
            'isModification' => $aliment->getId() !== null
        ]);
    }

    /**
     * @Route("/admin/aliment/{id}", name="admin_aliments_suppression", methods="delete")
     */
    public function supprimer(Aliment $aliment, EntityManagerInterface $em) {
        //$submittedToken = $request->request->get('token');
        //if($this->isCsrfTokenValid("SUP". $aliment->getId(), $submittedToken)) {
            $em->remove($aliment);
            $em->flush();
            $this->addFlash("success", "La suppression a été effectuée");
            return $this->redirectToRoute("admin_aliment"); 
        //}
    }
}
