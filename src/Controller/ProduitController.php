<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Cart\CartService;

class ProduitController extends AbstractController
{
    /**
     * @Route("/produit", name="produit_index", methods={"GET"})
     */
    public function index(CartService $cartService): Response
    {
        $size = $cartService->getSize();
        $articles = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findAll();

        return $this->render('produit/index.html.twig', [
            'articles' => $articles,
            'size' => $size
        ]);
    }
}