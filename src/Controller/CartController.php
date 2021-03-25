<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\UtilisateurType;
use App\Form\PanierCommandeType;
use App\Service\Cart\CartService;
use Symfony\Component\Mime\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
        $this->addFlash('success', 'Ajout au panier reussi !');
        return $this->redirectToRoute("produits_index");
    }

    /**
     * @Route("/panier/remove/{id}", name="cart_remove")
     */
    public function remove($id, CartService $cartService) {

        $cartService->remove($id);
        $this->addFlash('success', 'Ligne supprimer !');
        return $this->redirectToRoute("cart_index");
    }

    /**
     * @Route("/panier/minus/{id}", name="cart_minus")
     */
    public function minus($id, CartService $cartService)
    {
        $cartService->minus($id);
        $this->addFlash('success', 'Article enlever !');
        return $this->redirectToRoute("cart_index");
    }

    /**
     * @Route("/panier/add_cart/{id}", name="cart_add_cart")
     */
    public function add_cart($id, CartService $cartService)
    {
        $cartService->add($id);
        $this->addFlash('success', 'Article ajouter !');
        return $this->redirectToRoute("cart_index");
    }

    /**
     * @Route("/panier/removeAll", name="cart_removeAll")
     */
    public function removeAll(CartService $cartService) {

        $cartService->removeAll();
        $this->addFlash('success', 'Suppression du panier !');
        return $this->redirectToRoute("produits_index");
    }


/**
 * @Route("/panier/commande", name="panier_commande")
 */
    public function commande(CartService $cartService, Request $request, MailerInterface $mailer) {
        $form = $this->createForm(PanierCommandeType::class);
        $form->handleRequest($request);
        
        $size = $cartService->getSize();

        $total = $cartService->getTotal();

        $panierWithData = $cartService->getFullCart();

        if ($form->isSubmitted() && $form->isValid()) {
            // On récupère les infos du formulaire
            $contact = $form->getData();

            // Ici nous enverrons l'e-mail
            $message = (new TemplatedEmail())

            // On attribue l'expéditeur
            ->From('villagegreen@gmail.com')

            // On attribue le destinataire
            ->To($contact['email'])

            // On crée le texte avec la vue

            ->subject('Commande passée avec succées !')
            ->context([
                'size' => $size,
                'panier' => $panierWithData,
                'prenom' => $contact['prenom'],
                'livraison' => $contact['livraison'],
                'facturation' => $contact['facturation'],
                'total' => $total,
                'items' => $panierWithData,
            ])
            ->htmlTemplate("emails/commande.html.twig");
            ;

            // On envoie le message
            $mailer->send($message);

            $this->addFlash('success', 'Votre commande a bien été pris en compte, vous aller recevoir dans votre boite mail le récapitulatif de votre commande.'); // Permet un message flash de renvoi
        }

        return $this->render("cart/commande.html.twig", [
            'form_util' => $form->createView(),
            'size' => $size
        ]);
    }
}