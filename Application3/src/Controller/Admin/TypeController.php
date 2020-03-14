<?php

namespace App\Controller\Admin;

use App\Entity\Type;
use App\Form\TypeType;
use App\Repository\TypeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class TypeController extends AbstractController
{
    /**
     * @Route("/admin/type", name="admin_type")
     */
    public function index(TypeRepository $repo)
    {
        $types = $repo->findAll();
        return $this->render('admin/admin_type/adminType.html.twig', [
            'types' => $types,
        ]);
    }  
    
    /**
     * @Route("/admin/type/ajout", name="admin_types_creation")
     * @Route("/admin/type/{id}", name="modif_type", methods="GET|POST")
     */
    public function ajoutEtModif(Type $type = null, EntityManagerInterface $em, Request $request)
    {
        if(!$type) {
            $type = new Type();
        }

        $form = $this->createForm(TypeType::class, $type);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $modif = $type->getId() !== null;
            $em->persist($type);
            $em->flush();
            $this->addFlash("success", ($modif) ? "La modification a été effectuée" : "L'ajout a été effectué");
            return $this->redirectToRoute("admin_type");
        }
        return $this->render('admin/admin_type/ajout_modif.html.twig', [
            'type' => $type,
            'form' => $form->createView(),
            'isModification' => $type->getId() !== null
        ]);
    }   

    /**
     * @Route("/admin/type/{id}", name="admin_types_suppression", methods="delete")
     */
    public function supprimer(Type $type, EntityManagerInterface $em) {
        //$submittedToken = $request->request->get('token');
        //if($this->isCsrfTokenValid("SUP". $aliment->getId(), $submittedToken)) {
            $em->remove($type);
            $em->flush();
            $this->addFlash("success", "La suppression a été effectuée");
            return $this->redirectToRoute("admin_type"); 
        //}
    }
}