<?php

namespace App\Controller;

use App\Entity\Utilisateur;

use App\Form\UtilisateurType;
use App\Service\Cart\CartService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/utilisateur")
 */
class UtilisateurController extends AbstractController
{
    /**
     * @Route("/", name="utilisateur_index", methods={"GET"})
     */
    public function index(CartService $cartService): Response
    {
        $size = $cartService->getSize();

        $utilisateurs = $this->getDoctrine()
            ->getRepository(Utilisateur::class)
            ->findAll();

        return $this->render('utilisateur/index.html.twig', [
            'utilisateurs' => $utilisateurs,
            'size' => $size
        ]);
    }


    /**
     * @Route("/inscription", name="utilisateur_registration", methods={"GET", "POST"})
     * @return Response
     */
    public function registration(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder, CartService $cartService) {
        $utilisateur = new Utilisateur();
        $utilisateur->setUtiRole('client');
        $form = $this->createForm(UtilisateurType::class, $utilisateur);

        $form->handleRequest($request);

        $size = $cartService->getSize();

        if($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->encodePassword($utilisateur, $utilisateur->getUtiMdp());

            $utilisateur->setUtiMdp($hash);

            $manager->persist($utilisateur);
            $manager->flush();
            return $this->redirectToRoute('security_login');

        }
        return $this->render('utilisateur/new.html.twig', [
            'form' => $form->createView(),
            'size' => $size
        ]);
    }

    /**
     * @Route("/{utiId}", name="utilisateur_show", methods={"GET"})
     */
    public function show(Utilisateur $utilisateur, CartService $cartService): Response
    {
        $size = $cartService->getSize();

        return $this->render('utilisateur/show.html.twig', [
            'utilisateur' => $utilisateur,
            'size' => $size

        ]);
    }

    /**
     * @Route("/{utiId}/edit", name="utilisateur_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Utilisateur $utilisateur, CartService $cartService, UserPasswordEncoderInterface $encoder): Response
    {
        $size = $cartService->getSize();

        $form = $this->createForm(UtilisateurType::class, $utilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->encodePassword($utilisateur, $utilisateur->getUtiMdp());

            $utilisateur->setUtiMdp($hash);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('utilisateur_index');
        }

        return $this->render('utilisateur/edit.html.twig', [
            'utilisateur' => $utilisateur,
            'form' => $form->createView(),
            'size' => $size

        ]);
    }

    /**
     * @Route("/{utiId}", name="utilisateur_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Utilisateur $utilisateur): Response
    {
        if ($this->isCsrfTokenValid('delete'.$utilisateur->getUtiId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($utilisateur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('utilisateur_index');
    }
}
