<?php

namespace App\Controller;

use App\Service\Cart\CartService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Utilisateur;
use App\Form\RegistrationType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="security_registration")
     * @return Response
     */
    public function registration(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder, CartService $cartService) {
        $utilisateur = new Utilisateur();

        $form = $this->createForm(RegistrationType::class, $utilisateur);

        $form->handleRequest($request);

        $size = $cartService->getSize();

        if($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->encodePassword($utilisateur, $utilisateur->getUtiMdp());

            $utilisateur->setUtiMdp($hash);

            $manager->persist($utilisateur);
            $manager->flush();
            return $this->redirectToRoute('security_login');

        }
        return $this->render('security/registration.html.twig', [
            'form' => $form->createView(),
            'size' => $size
        ]);
    }

    /**
     * @Route("/connexion", name="security_login")
     */
    public function login(CartService $cartService){
        $size = $cartService->getSize();

        return $this->render('security/login.html.twig', [
            'size' => $size
        ]);
    }

    /**
     * @Route("/deconnexion", name="security_logout")
     */
    public function logout() {}
}
