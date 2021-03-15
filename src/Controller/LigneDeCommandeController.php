<?php

namespace App\Controller;

use App\Entity\LigneDeCommande;
use App\Form\LigneDeCommandeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ligne-de-commande")
 */
class LigneDeCommandeController extends AbstractController
{
    /**
     * @Route("/", name="ligne_de_commande_index", methods={"GET"})
     */
    public function index(): Response
    {
        $ligneDeCommandes = $this->getDoctrine()
            ->getRepository(LigneDeCommande::class)
            ->findAll();

        return $this->render('ligne_de_commande/index.html.twig', [
            'ligne_de_commandes' => $ligneDeCommandes,
        ]);
    }

    /**
     * @Route("/new", name="ligne_de_commande_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ligneDeCommande = new LigneDeCommande();
        $form = $this->createForm(LigneDeCommandeType::class, $ligneDeCommande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ligneDeCommande);
            $entityManager->flush();

            return $this->redirectToRoute('ligne_de_commande_index');
        }

        return $this->render('ligne_de_commande/new.html.twig', [
            'ligne_de_commande' => $ligneDeCommande,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ligne_de_commande_show", methods={"GET"})
     */
    public function show(LigneDeCommande $ligneDeCommande): Response
    {
        return $this->render('ligne_de_commande/show.html.twig', [
            'ligne_de_commande' => $ligneDeCommande,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ligne_de_commande_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, LigneDeCommande $ligneDeCommande): Response
    {
        $form = $this->createForm(LigneDeCommandeType::class, $ligneDeCommande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ligne_de_commande_index');
        }

        return $this->render('ligne_de_commande/edit.html.twig', [
            'ligne_de_commande' => $ligneDeCommande,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ligne_de_commande_delete", methods={"DELETE"})
     */
    public function delete(Request $request, LigneDeCommande $ligneDeCommande): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ligneDeCommande->getLigneId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ligneDeCommande);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ligne_de_commande_index');
    }
}
