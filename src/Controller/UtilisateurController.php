<?php

// Pour définir ou se trouve mon controller.
namespace App\Controller;

// On precise ou se trouve les composants qu'on appelle.
use App\Entity\Utilisateur;
use App\Form\UtilisateurType;
use App\Service\Cart\CartService;

// On precise l'import de chaque classe de symfony qu'on appelle.
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

// On défini la route principal du controleur.
/**
 * @Route("/")
 */
// On créer une classe qui utilise une classe natif de symfony avec un extends.
class UtilisateurController extends AbstractController
{
    // On défini la route de notre function, avec un name pour l'appel, et la methods.
    /**
     * @Route("/utilisateur", name="utilisateur_index", methods={"GET"})
     */
    // On precise quel service on as besoin lors de l'appel de la function et ce qu'on attend.
    public function index(CartService $cartService): Response
    {
        // on appelle le service du panier et on appelle la function getSize qui nous return une valeur a la variable $size.
        $size = $cartService->getSize();

        // On défini une variable et on utilise la doctrine.
        $utilisateurs = $this->getDoctrine()
            // On récupere tous les objets de l'entité Utilisateur dans notre variable.
            ->getRepository(Utilisateur::class)
            ->findAll();

        // Lors de l'appelle de la function, on nous renvoi sur la vue défini, avec les variables et le name pour les appeler.
        return $this->render('utilisateur/index.html.twig', [
            'utilisateurs' => $utilisateurs,
            'size' => $size
        ]);
    }

    // On défini la route de notre function, avec un name pour l'appel, et la methods.
    /**
     * @Route("/inscription", name="utilisateur_inscription", methods={"GET", "POST"})
     * @return Response
     */
    // On precise quel service on as besoin lors de l'appel de la function et ce qu'on attend.
    public function registration(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder, CartService $cartService)
    {

        // On défini que la variable est égale a un new article.
        $utilisateur = new Utilisateur();

        // On défini le role a ajouter lors d'une inscription.
        $utilisateur->setUtiRole('ROLE_USER');

        // On créer une variable qui à l'intérieur sera un formulaire creer sur la base de l'entité article grace a une function natif de symfony.
        $form = $this->createForm(UtilisateurType::class, $utilisateur);

        // Pour traiter les données du formulaire, on appelle la méthode.
        $form->handleRequest($request);

        // on appelle le service du panier et on appelle la function getSize qui nous return une valeur a la variable $size.
        $size = $cartService->getSize();

        // Si le formulaire est soumis et qu'il est validé alors :
        if ($form->isSubmitted() && $form->isValid()) {
            // On creer une variable hash pour encoder le password lors de l'inscription avant l'ajout dans la db.
            $hash = $encoder->encodePassword($utilisateur, $utilisateur->getUtiMdp());
            $utilisateur->setUtiMdp($hash);

            // On prepare les données à insérer dans la DB et on appelle la methode flush pour valider l'insert sinon rien n'est fait.
            $manager->persist($utilisateur);
            $manager->flush();

            // On utilise addFlash pour afficher un pop msg pour valider l'inscription.
            $this->addFlash('success', 'Nouvelle Utilisateur créer !');

            // Redirection vers une vue.
            return $this->redirectToRoute('security_login');
        }

        // Sinon retour a une vue form pour l'inscription.
        return $this->render('utilisateur/new.html.twig', [
            'form' => $form->createView(),
            'size' => $size
        ]);
    }

    // On défini la route de notre function, avec un name pour l'appel, et la methods.
    /**
     * @Route("/{utiId}", name="utilisateur_show", methods={"GET"})
     */
    // On precise quel service on as besoin lors de l'appel de la function et ce qu'on attend.
    public function show(Utilisateur $utilisateur, CartService $cartService): Response
    {
        // on appelle le service du panier et on appelle la function getSize qui nous return une valeur a la variable $size.
        $size = $cartService->getSize();

        // Lors de l'appelle de la function, on nous renvoi sur la vue défini, avec les variables et le name pour les appeler.
        return $this->render('utilisateur/profil.html.twig', [
            'utilisateur' => $utilisateur,
            'size' => $size
        ]);
    }


    // On défini la route de notre function, avec un name pour l'appel, et la methods.
    /**
     * @Route("/{utiId}/edit", name="utilisateur_edit", methods={"GET","POST"})
     */
    // On precise quel service on as besoin lors de l'appel de la function et ce qu'on attend.
    public function edit(Request $request, Utilisateur $utilisateur, CartService $cartService, UserPasswordEncoderInterface $encoder): Response
    {

        // Vérification que l'utilisateur n'a pas l'acces a l'url voulu
        $this->denyAccessUnlessGranted('utilisateur_edit', $utilisateur, 'non non non ...');

        // on appelle le service du panier et on appelle la function getSize qui nous return une valeur a la variable $size.
        $size = $cartService->getSize();

        // On créer une variable qui à l'intérieur sera un formulaire creer sur la base de l'entité grace a une function natif de symfony.
        $form = $this->createForm(UtilisateurType::class, $utilisateur);
        // Pour traiter les données du formulaire, on appelle la méthode.
        $form->handleRequest($request);

        // Si le formulaire est soumis et qu'il est validé alors :
        if ($form->isSubmitted() && $form->isValid()) {

            // On creer une variable hash pour encoder le password lors de l'inscription avant la modification dans la db.
            $hash = $encoder->encodePassword($utilisateur, $utilisateur->getUtiMdp());
            $utilisateur->setUtiMdp($hash);

            // On utilise la doctrine et on appelle l'EntityManager pour preparer l'ajout dans la DB et on demande la modification.
            $this->getDoctrine()->getManager()->flush();

            // On utilise addFlash pour afficher un pop msg pour valider la modification.
            $this->addFlash('success', 'Modification ok !');

            // Redirection vers une vue.
            return $this->redirectToRoute('home');
        }

        // Sinon retour a une vue form pour modifier un article si les conditions n'etaient pas rempli, on récupere les données, avec les name.
        return $this->render('utilisateur/edit.html.twig', [
            'utilisateur' => $utilisateur,
            'form' => $form->createView(),
            'size' => $size
        ]);
    }

    // On défini la route de notre function, avec un name pour l'appel, et la methods.
    /**
     * @Route("/{utiId}", name="utilisateur_delete", methods={"DELETE"})
     */
    // On precise quel service on as besoin lors de l'appel de la function et ce qu'on attend.
    public function delete(Request $request, Utilisateur $utilisateur): Response
    {
        // Vérification que l'utilisateur n'a pas l'acces a l'url voulu
        $this->denyAccessUnlessGranted('utilisateur_edit', $utilisateur, 'non non non ...');

        // Si le Token avec le form est valide et l'article correspond bien a un artcile dans la DB.
        if ($this->isCsrfTokenValid('delete' . $utilisateur->getUtiId(), $request->request->get('_token'))) {

            // On défini une variable et on utilise la doctrine et on appelle l'EntityManager pour preparer la suppression dans la DB.
            $entityManager = $this->getDoctrine()->getManager();

            //Je vide le token
            $this->container->get('security.token_storage')->setToken(null);

            $entityManager->remove($utilisateur);
            // on valide la demande.
            $entityManager->flush();
        }
        // j'envoi un msg pour confirmer la suppresion
        $this->addFlash('success', 'Utilisateur supprimer !');

        // Redirection vers une vue.
        return $this->redirectToRoute('home');
    }
}
