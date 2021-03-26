<?php

// Pour définir ou se trouve mon controller.
namespace App\Controller;

// On precise ou se trouve les composants qu'on appelle.
use App\Entity\Article;
use App\Form\ArticleType;
use App\Service\Cart\CartService;

// On precise l'import de chaque classe de symfony qu'on appelle.
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


// On défini la route principal du controleur.
/**
 * @Route("/article")
 */
// On créer une classe qui utilise une classe natif de symfony avec un extends.
class ArticleController extends AbstractController
{
    // On défini la route de notre function, avec un name pour l'appel, et la methods.
    /**
     * @Route("/", name="article_index", methods={"GET"})
     */
    // On precise quel service on as besoin lors de l'appel de la function et ce qu'on attend.
    public function index(CartService $cartService): Response
    {
        // on appelle le service du panier et on appelle la function getSize qui nous return une valeur a la variable $size.
        $size = $cartService->getSize();

        // On défini une variable et on utilise la doctrine.
        $articles = $this->getDoctrine()
            // On récupere tous les objets de l'entité Article dans notre variable.
            ->getRepository(Article::class)
            ->findAll();

        // Lors de l'appelle de la function, on nous renvoi sur la vue défini, avec les deux variables et le name pour les appeler.
        return $this->render('article/index.html.twig', [
            'articles' => $articles,
            'size' => $size
        ]);
    }


    // On défini la route de notre function, avec un name pour l'appel, et la methods.
    /**
     * @Route("/produits", name="produits_index", methods={"GET"})
     */
    // On precise quel service on as besoin lors de l'appel de la function et ce qu'on attend.
    public function product(CartService $cartService): Response
    {
        // on appelle le service du panier et on appelle la function getSize qui nous return une valeur a la variable $size.
        $size = $cartService->getSize();

        // On défini une variable et on utilise la doctrine.
        $article = $this->getDoctrine()
            // On récupere tous les objets de l'entité Article dans notre variable.
            ->getRepository(Article::class)
            ->findAll();

        // Lors de l'appelle de la function, on nous renvoi sur la vue défini, avec les deux variables et le name pour les appeler.
        return $this->render('produit/produit.html.twig', [
            'article' => $article,
            'size' => $size

        ]);
    }

//    public function product(PaginatorInterface $paginator, Request $request): Response
//    {
//        $article = $paginator->paginate($this->repository->findAllVisibleQuery(),
//            $request->query->getInt('page', 1),
//            9
//        );
//        return $this->render('article/produit.html.twig', [
//            'article' => $article,
//        ]);
//    }


    // On défini la route de notre function, avec un name pour l'appel, et la methods.
    /**
     * @Route("/details{id}", name="produits_details", methods={"GET"})
     */
    // On precise quel service on as besoin lors de l'appel de la function et ce qu'on attend.
    public function productShow(Article $article, CartService $cartService): Response
    {
        // on appelle le service du panier et on appelle la function getSize qui nous return une valeur a la variable $size.
        $size = $cartService->getSize();

        // Lors de l'appelle de la function, on nous renvoi sur la vue défini, avec les variables et le name pour les appeler.
        return $this->render('produit/produitShow.html.twig', [
            'article' => $article,
            'size' => $size
        ]);
    }

    // On défini la route de notre function, avec un name pour l'appel, et la methods.
    /**
     * @Route("/new", name="article_new", methods={"GET","POST"})
     */
    // On precise quel service on as besoin lors de l'appel de la function et ce qu'on attend.
    public function new(Request $request, CartService $cartService): Response
    {
        // on appelle le service du panier et on appelle la function getSize qui nous return une valeur a la variable $size.
        $size = $cartService->getSize();

        // On défini que la variable est égale a un new article.
        $article = new Article();
        // On créer une variable qui à l'intérieur sera un formulaire creer sur la base de l'entité article grace a une function natif de symfony.
        $form = $this->createForm(ArticleType::class, $article);
        // Pour traiter les données du formulaire, on appelle la méthode.
        $form->handleRequest($request);

        // Si le formulaire est soumis et qu'il est validé alors :
        if ($form->isSubmitted() && $form->isValid()) {
            // On défini une variable et on utilise la doctrine et on appelle l'EntityManager pour preparer l'ajout dans la DB.
            $entityManager = $this->getDoctrine()->getManager();
            // On prepare les données à insérer dans la DB et on appelle la methode flush pour valider l'insert sinon rien n'est fait.
            $entityManager->persist($article);
            $entityManager->flush();

            // Redirection vers une vue.
            return $this->redirectToRoute('article_index');
        }

        // Sinon retour a une vue form pour inserer un article si les conditions n'etaient pas rempli, on récupere les données, avec les name.
        return $this->render('article/new.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
            'size' => $size
        ]);
    }

    // On défini la route de notre function, avec un name pour l'appel, et la methods.
    /**
     * @Route("/show{id}", name="article_show", methods={"GET"})
     */
    // On precise quel service on as besoin lors de l'appel de la function et ce qu'on attend.
    public function show(Article $article, CartService $cartService): Response
    {
        // on appelle le service du panier et on appelle la function getSize qui nous return une valeur a la variable $size.
        $size = $cartService->getSize();

        // Lors de l'appelle de la function, on nous renvoi sur la vue défini, avec les variables et le name pour les appeler.
        return $this->render('article/show.html.twig', [
            'article' => $article,
            'size' => $size
        ]);
    }


    // On défini la route de notre function, avec un name pour l'appel, et la methods.
    /**
     * @Route("/edit{id}", name="article_edit", methods={"GET","POST"})
     */
    // On precise quel service on as besoin lors de l'appel de la function et ce qu'on attend.
    public function edit(Request $request, Article $article, CartService $cartService): Response
    {
        // On créer une variable qui à l'intérieur sera un formulaire creer sur la base de l'entité article grace a une function natif de symfony.
        $form = $this->createForm(ArticleType::class, $article);
        // Pour traiter les données du formulaire, on appelle la méthode.
        $form->handleRequest($request);

        // on appelle le service du panier et on appelle la function getSize qui nous return une valeur a la variable $size.
        $size = $cartService->getSize();

        // Si le formulaire est soumis et qu'il est validé alors :
        if ($form->isSubmitted() && $form->isValid()) {
            // On utilise la doctrine et on appelle l'EntityManager pour preparer l'ajout dans la DB et on demande la modification.
            $this->getDoctrine()->getManager()->flush();
            // Redirection vers une vue.
            return $this->redirectToRoute('article_index');
        }

        // Sinon retour a une vue form pour inserer un article si les conditions n'etaient pas rempli, on récupere les données, avec les name.
        return $this->render('article/edit.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
            'size' => $size
        ]);
    }


    // On défini la route de notre function, avec un name pour l'appel, et la methods.
    /**
     * @Route("/{id}", name="article_delete", methods={"DELETE"})
     */
    // On precise quel service on as besoin lors de l'appel de la function et ce qu'on attend.
    public function delete(Request $request, Article $article): Response
    {

        // Si le Token avec le form est valide et l'article correspond bien a un artcile dans la DB.
        if ($this->isCsrfTokenValid('delete' . $article->getArtId(), $request->request->get('_token'))) {
            // On défini une variable et on utilise la doctrine et on appelle l'EntityManager pour preparer la suppression dans la DB.
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($article);
            // on valide la demande.
            $entityManager->flush();
        }

        // Sinon retour a la vue des articles.
        return $this->redirectToRoute('article_index');
    }

}
