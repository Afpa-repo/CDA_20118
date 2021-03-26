<?php

// Pour définir ou se trouve mon controller.
namespace App\Controller;

// On precise ou se trouve les composants qu'on appelle.
use App\Service\Cart\CartService;

// On precise l'import de chaque classe de symfony qu'on appelle.
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

// On créer une classe qui utilise une classe natif de symfony avec un extends.
class SecurityController extends AbstractController
{
    // On défini la route de notre function, avec un name pour l'appel, et la methods.
    /**
     * @Route("/connexion", name="security_login")
     */
    // On precise quel service on as besoin lors de l'appel de la function et ce qu'on attend.
    public function login(CartService $cartService)
    {
        // Ici Symfony sait que c'est la function pour la connection.(Voir l'appel dans le security.yaml)

        // on appelle le service du panier et on appelle la function getSize qui nous return une valeur a la variable $size.
        $size = $cartService->getSize();

        // Redirection vers une vue, avec variables et leurs name.
        return $this->render('security/login.html.twig', [
            'size' => $size
        ]);
    }

    // On défini la route de notre function, avec un name pour l'appel, et la methods.
    /**
     * @Route("/deconnexion", name="security_logout")
     */
    // On precise quel service on as besoin lors de l'appel de la function et ce qu'on attend.
    public function logout()
    {
    }
    // On ne fait aucune action car symfony comprend que c'est la deconnexion de l'utilisateur.(Voir l'appel dans le security.yaml)
}
