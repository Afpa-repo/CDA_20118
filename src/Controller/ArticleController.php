<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Entity\Article;
use App\Entity\ArticleSearch;
use App\Entity\Categorie;
use App\Form\ArticleSearchType;
use App\Form\ArticleType;
use App\Form\SearchType;
use App\Service\Cart\CartService;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;

/**
 * @Route("/article")
 */
class ArticleController extends AbstractController
{
    // FUNCTION POUR ACCEDER FACILEMENT AUX FONCTIONS DANS ArticleRepository par exemple : $this->repository->fonctionSouhaitée
    /**
     * @var ArticleRepository
     */
//    private $repository;
//    public function __construct(ArticleRepository $repository)
//    {
//        $this->repository=$repository;
//    }



    /**
     * @Route("/", name="article_index", methods={"GET"})
     */
    public function index(CartService $cartService): Response
    {
        $size = $cartService->getSize();

        $articles = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findAll();



        return $this->render('article/index.html.twig', [
            'articles' => $articles,
            'size' => $size
        ]);
    }

    /**
     * @Route("/produits", name="produits_index", methods={"GET"})
     */
    public function product(ArticleRepository $repository,CartService $cartService, Request $request): Response
    {
        //formulaire de filtres
//        $search = new ArticleSearch();
//        $form = $this->createForm(ArticleSearchType::class, $search);
//        $form->handleRequest($request);

        $size = $cartService->getSize();

        // Affiche le noms des catégories
        $categories = $this->getDoctrine()
            ->getRepository(Categorie::class)
            ->findAll();
        //Fonction pour paginer la page page produit: on appelle la fonction paginate() avec en param la fonction findAllQueries() dans ArticleRepository
//        $article = $paginator->paginate(
//            $this->repository->findAllQueries($search),
//            $request->query->getInt('page',1),
//            6
//        );
        $data = new SearchData();
        $form=$this->createForm(SearchType::class,$data);
        $article= $repository->findSearch();
        return $this->render('produit/produit.html.twig', [
            'categories'=>$categories,
            'article' => $article,
            'size' => $size,
            'form' => $form->createView()

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

    /**
     * @Route("/{id}", name="produits_details", methods={"GET"})
     */
    public function productShow(Article $article, CartService $cartService): Response
    {
        $size = $cartService->getSize();

        return $this->render('produit/produitShow.html.twig', [
            'article' => $article,
            'size' => $size
        ]);
    }

    /**
     * @Route("/new", name="article_new", methods={"GET","POST"})
     */
    public function new(Request $request, CartService $cartService): Response
    {
        $size = $cartService->getSize();

        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($article);
            $entityManager->flush();

            return $this->redirectToRoute('article_index');
        }

        return $this->render('article/new.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
            'size' => $size
        ]);
    }

    /**
     * @Route("/{id}", name="article_show", methods={"GET"})
     */
    public function show(Article $article, CartService $cartService): Response
    {
        $size = $cartService->getSize();

        return $this->render('article/show.html.twig', [
            'article' => $article,
            'size' => $size
        ]);
    }

    /**
     * @Route("/{id}/edit", name="article_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Article $article, CartService $cartService): Response
    {
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);
        $size = $cartService->getSize();


        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('article_index');
        }

        return $this->render('article/edit.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
            'size' => $size
        ]);
    }

    /**
     * @Route("/{id}", name="article_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Article $article): Response
    {


        if ($this->isCsrfTokenValid('delete'.$article->getArtId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($article);
            $entityManager->flush();
        }

        return $this->redirectToRoute('article_index');
    }

}
