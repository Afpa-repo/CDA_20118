<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Service\Cart\CartService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    /**
     * @Route("/panier", name="cart_index")
     */
    public function index(CartService $cartService)
    {
        $panierWithData = $cartService->getFullCart();

        $total = $cartService->getTotal();

        $size = $cartService->getSize();

        return $this->render('cart/index.html.twig', [
            'items' => $panierWithData,
            'total' => $total,
            'size' => $size
        ]);
    }

    /**
     * @Route("/panier/add/{id}", name="cart_add")
     */
    public function add($id, CartService $cartService)
    {
        $cartService->add($id);

        return $this->redirectToRoute("produit_index");
    }

    /**
     * @Route("/panier/remove/{id}", name="cart_remove")
     */
    public function remove($id, CartService $cartService) {

        $cartService->remove($id);

        return $this->redirectToRoute("cart_index");
    }

    /**
     * @Route("/panier/minus/{id}", name="cart_minus")
     */
    public function minus($id, CartService $cartService)
    {
        $cartService->minus($id);

        return $this->redirectToRoute("cart_index");
    }

    /**
     * @Route("/panier/add_cart/{id}", name="cart_add_cart")
     */
    public function add_cart($id, CartService $cartService)
    {
        $cartService->add($id);

        return $this->redirectToRoute("cart_index");
    }

    /**
     * @Route("/panier/removeAll", name="cart_removeAll")
     */
    public function removeAll(CartService $cartService) {

        $cartService->removeAll();

        return $this->redirectToRoute("produit_index");
    }
}