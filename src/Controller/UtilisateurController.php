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
 * @Route("/")
 */
class UtilisateurController extends AbstractController
{
    /**
     * @Route("/utilisateur", name="utilisateur_index", methods={"GET"})
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
     * @Route("/inscription", name="utilisateur_inscription", methods={"GET", "POST"})
     * @return Response
     */
    public function registration(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder, CartService $cartService) {
        $utilisateur = new Utilisateur();
        $utilisateur->setUtiRole('ROLE_USER');
        $form = $this->createForm(UtilisateurType::class, $utilisateur);

        $form->handleRequest($request);

        $size = $cartService->getSize();

        if($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->encodePassword($utilisateur, $utilisateur->getUtiMdp());

            $utilisateur->setUtiMdp($hash);

            $manager->persist($utilisateur);
            $manager->flush();
            $this->addFlash('success', 'Nouvelle Utilisateur créer !');

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

        return $this->render('utilisateur/profil.html.twig', [
            'utilisateur' => $utilisateur,
            'size' => $size

        ]);
    }



    /**
     * @Route("/{utiId}/edit", name="utilisateur_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Utilisateur $utilisateur, CartService $cartService, UserPasswordEncoderInterface $encoder): Response
    {

        // Vérification que l'utilisateur n'a pas l'acces a l'url voulu
        $this->denyAccessUnlessGranted('utilisateur_edit', $utilisateur, 'non non non ...');

        $size = $cartService->getSize();
        $form = $this->createForm(UtilisateurType::class, $utilisateur);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->encodePassword($utilisateur, $utilisateur->getUtiMdp());

            $utilisateur->setUtiMdp($hash);
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Modification ok !');

            return $this->redirectToRoute('home');
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
        // Vérification que l'utilisateur n'a pas l'acces a l'url voulu
        $this->denyAccessUnlessGranted('utilisateur_edit', $utilisateur, 'non non non ...');

        if ($this->isCsrfTokenValid('delete'.$utilisateur->getUtiId(), $request->request->get('_token'))) {

            $entityManager = $this->getDoctrine()->getManager();

        //Je vide le token
            $this->container->get('security.token_storage')->setToken(null);

            $entityManager->remove($utilisateur);
            $entityManager->flush();
        }
        // j'envoi un msg pour confirmer la suppresion
        $this->addFlash('success', 'Utilisateur supprimer !');

        return $this->redirectToRoute('home');
    }
}
