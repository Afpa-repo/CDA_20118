<?php

// Pour définir ou se trouve mon controller.
namespace App\Controller;

// On precise ou se trouve les composants qu'on appelle.
use App\Entity\Utilisateur;
use App\Service\Cart\CartService;

// On precise l'import de chaque classe de symfony qu'on appelle.
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


// On défini la route principal du controleur et la method.
/**
 * @Route("/")
 * @method render(string $string, array $array)
 */
// On créer une classe qui utilise une classe natif de symfony avec un extends.
class HomeController extends AbstractController
{
    // On défini la route de notre function, avec un name pour l'appel, et la methods.
    /**
     * @Route("/", name="home")
     */
    // On precise quel service on as besoin lors de l'appel de la function et ce qu'on attend.
    public function index(CartService $cartService): Response
    {
        // on appelle le service du panier et on appelle la function getSize qui nous return une valeur a la variable $size.
        $size = $cartService->getSize();

        // affichage de la page d'accueil
        return $this->render('accueil/index.html.twig', [

            'size' => $size
        ]);
    }
}

