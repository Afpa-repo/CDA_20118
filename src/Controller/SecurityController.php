<?php

namespace App\Controller;

use App\Service\Cart\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class SecurityController extends AbstractController
{
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
