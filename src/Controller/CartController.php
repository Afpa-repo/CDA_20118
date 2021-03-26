<?php

// Pour définir ou se trouve mon controller.
namespace App\Controller;

// On precise ou se trouve les composants qu'on appelle.
use App\Entity\Utilisateur;
use App\Form\UtilisateurType;
use App\Form\PanierCommandeType;
use App\Service\Cart\CartService;

// On precise l'import de chaque classe de symfony qu'on appelle.
use Symfony\Component\Mime\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// On créer une classe qui utilise une classe natif de symfony avec un extends.
class CartController extends AbstractController
{
    // On défini la route de notre function, avec un name pour l'appel, et la methods si besoin.
    /**
     * @Route("/panier", name="cart_index")
     */
    // On precise quel service ou quel variable on as besoin lors de l'appel de la function.
    public function index(CartService $cartService)
    {
        // On défini une variable et on appelle le cartservice et une function avec un return de données.
        $panierWithData = $cartService->getFullCart();

        // On défini une variable et on appelle le cartservice et une function avec un return de données.
        $total = $cartService->getTotal();

        // On défini une variable et on appelle le cartservice et une function avec un return de données.
        $size = $cartService->getSize();

        // Lors de l'appelle de la function, on nous renvoi sur la vue défini, avec les variables et le name pour les appeler.
        return $this->render('cart/index.html.twig', [
            'items' => $panierWithData,
            'total' => $total,
            'size' => $size
        ]);
    }


    // On défini la route de notre function, avec un name pour l'appel, et la methods si besoin.
    /**
     * @Route("/panier/add/{id}", name="cart_add")
     */
    // On precise quel service ou quel variable on as besoin lors de l'appel de la function.
    public function add($id, CartService $cartService)
    {
        // On fait appelle au service pour rajouter la valeur de la variable.
        $cartService->add($id);

        // On utilise addFlash pour afficher un pop msg pour valider le rajout sur la vue.
        $this->addFlash('success', 'Ajout au panier reussi !');

        // On fait une redirection vers une vue.
        return $this->redirectToRoute("produits_index");
    }

    // On défini la route de notre function, avec un name pour l'appel, et la methods si besoin.
    /**
     * @Route("/panier/remove/{id}", name="cart_remove")
     */
    // On precise quel service ou quel variable on as besoin lors de l'appel de la function.
    public function remove($id, CartService $cartService)
    {

        // On défini une variable et on appelle le cartservice et on retire l'id.
        $cartService->remove($id);

        // On utilise addFlash pour afficher un pop msg pour valider le remove sur la vue.
        $this->addFlash('success', 'Ligne supprimer !');

        // On fait une redirection vers une vue.
        return $this->redirectToRoute("cart_index");
    }

    // On défini la route de notre function, avec un name pour l'appel, et la methods si besoin.
    /**
     * @Route("/panier/minus/{id}", name="cart_minus")
     */
    // On precise quel service ou quel variable on as besoin lors de l'appel de la function.
    public function minus($id, CartService $cartService)
    {
        // On défini une variable et on appelle le cartservice et on retire 1 id sur l'objet.
        $cartService->minus($id);

        // On utilise addFlash pour afficher un pop msg pour valider le minus sur la vue.
        $this->addFlash('success', 'Article enlever !');

        // On fait une redirection vers une vue.
        return $this->redirectToRoute("cart_index");
    }

    // On défini la route de notre function, avec un name pour l'appel, et la methods si besoin.
    /**
     * @Route("/panier/add_cart/{id}", name="cart_add_cart")
     */
    // On precise quel service ou quel variable on as besoin lors de l'appel de la function.
    public function add_cart($id, CartService $cartService)
    {
        // On fait appelle au service pour rajouter la valeur de la variable.
        $cartService->add($id);

        // On utilise addFlash pour afficher un pop msg pour valider le rajout sur la vue.
        $this->addFlash('success', 'Article ajouter !');

        // On fait une redirection vers une vue.
        return $this->redirectToRoute("cart_index");
    }

    // On défini la route de notre function, avec un name pour l'appel, et la methods si besoin.
    /**
     * @Route("/panier/removeAll", name="cart_removeAll")
     */
    // On precise quel service ou quel variable on as besoin lors de l'appel de la function.
    public function removeAll(CartService $cartService)
    {

        // On fait appelle au service pour supprimer toutes les valeurs de la variable.
        $cartService->removeAll();

        // On utilise addFlash pour afficher un pop msg pour valider la suppression du contenu de la variable.
        $this->addFlash('success', 'Suppression du panier !');

        // On fait une redirection vers une vue.
        return $this->redirectToRoute("produits_index");
    }

    // On défini la route de notre function, avec un name pour l'appel, et la methods si besoin.
    /**
     * @Route("/panier/commande", name="panier_commande")
     */
    // On precise quel service ou quel variable on as besoin lors de l'appel de la function.
    public function commande(CartService $cartService, Request $request, MailerInterface $mailer)
    {

        // On créer une variable qui à l'intérieur sera un formulaire creer sur la base du PanierCommande grace a une function natif de symfony.
        $form = $this->createForm(PanierCommandeType::class);

        // Pour traiter les données du formulaire, on appelle la méthode.
        $form->handleRequest($request);

        // on appelle le service du panier et on appelle la function getSize qui nous return une valeur a la variable $size.
        $size = $cartService->getSize();

        // On défini une variable et on appelle le cartservice et une function avec un return de données.
        $total = $cartService->getTotal();

        // On défini une variable et on appelle le cartservice et une function avec un return de données.
        $panierWithData = $cartService->getFullCart();

        // Si le formulaire est soumis et qu'il est validé alors :
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
                ->htmlTemplate("emails/commande.html.twig");;

            // On envoie le message
            $mailer->send($message);

            // On utilise addFlash pour afficher un pop msg pour valider l'envoi de l'email.
            $this->addFlash('success', 'Votre commande a bien été pris en compte, vous aller recevoir dans votre boite mail le récapitulatif de votre commande.'); // Permet un message flash de renvoi
        }

        // Sinon redirection sur la vue avec le form.
        return $this->render("cart/commande.html.twig", [
            'form_util' => $form->createView(),
            'size' => $size
        ]);
    }
}