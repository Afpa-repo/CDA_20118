<?php
namespace App\Controller;

use App\Service\Cart\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 * @method render(string $string, array $array)
 */
class HomeController extends AbstractController {

    /**
     * @Route("/", name="home")
     */
    public function index(CartService $cartService) :Response
    {
        $size = $cartService->getSize();
        
        // affichage de la page d'accueil
        return $this->render('accueil/index.html.twig',[
            'size' => $size
            ]);
    }


}
?>
