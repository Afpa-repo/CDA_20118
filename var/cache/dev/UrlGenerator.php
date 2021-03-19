<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format'], ['variable', '/', '\\d+', 'code'], ['text', '/_error']], [], []],
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token'], ['text', '/_wdt']], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::body'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::stylesheet'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    'article_index' => [[], ['_controller' => 'App\\Controller\\ArticleController::index'], [], [['text', '/article/']], [], []],
    'article_new' => [[], ['_controller' => 'App\\Controller\\ArticleController::new'], [], [['text', '/article/new']], [], []],
    'article_show' => [['id'], ['_controller' => 'App\\Controller\\ArticleController::show'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/article']], [], []],
    'article_edit' => [['id'], ['_controller' => 'App\\Controller\\ArticleController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id'], ['text', '/article']], [], []],
    'article_delete' => [['id'], ['_controller' => 'App\\Controller\\ArticleController::delete'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/article']], [], []],
    'cart_index' => [[], ['_controller' => 'App\\Controller\\CartController::index'], [], [['text', '/panier']], [], []],
    'cart_add' => [['id'], ['_controller' => 'App\\Controller\\CartController::add'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/panier/add']], [], []],
    'cart_remove' => [['id'], ['_controller' => 'App\\Controller\\CartController::remove'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/panier/remove']], [], []],
    'cart_minus' => [['id'], ['_controller' => 'App\\Controller\\CartController::minus'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/panier/minus']], [], []],
    'cart_add_cart' => [['id'], ['_controller' => 'App\\Controller\\CartController::add_cart'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/panier/add_cart']], [], []],
    'cart_removeAll' => [[], ['_controller' => 'App\\Controller\\CartController::removeAll'], [], [['text', '/panier/removeAll']], [], []],
    'categorie_index' => [[], ['_controller' => 'App\\Controller\\CategorieController::index'], [], [['text', '/categorie/']], [], []],
    'categorie_new' => [[], ['_controller' => 'App\\Controller\\CategorieController::new'], [], [['text', '/categorie/new']], [], []],
    'categorie_show' => [['id'], ['_controller' => 'App\\Controller\\CategorieController::show'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/categorie']], [], []],
    'categorie_edit' => [['id'], ['_controller' => 'App\\Controller\\CategorieController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id'], ['text', '/categorie']], [], []],
    'categorie_delete' => [['id'], ['_controller' => 'App\\Controller\\CategorieController::delete'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/categorie']], [], []],
    'commande_index' => [[], ['_controller' => 'App\\Controller\\CommandeController::index'], [], [['text', '/commande/']], [], []],
    'commande_new' => [[], ['_controller' => 'App\\Controller\\CommandeController::new'], [], [['text', '/commande/new']], [], []],
    'commande_show' => [['id'], ['_controller' => 'App\\Controller\\CommandeController::show'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/commande']], [], []],
    'commande_edit' => [['id'], ['_controller' => 'App\\Controller\\CommandeController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id'], ['text', '/commande']], [], []],
    'commande_delete' => [['id'], ['_controller' => 'App\\Controller\\CommandeController::delete'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/commande']], [], []],
    'facture_index' => [[], ['_controller' => 'App\\Controller\\FactureController::index'], [], [['text', '/facture/']], [], []],
    'facture_new' => [[], ['_controller' => 'App\\Controller\\FactureController::new'], [], [['text', '/facture/new']], [], []],
    'facture_show' => [['id'], ['_controller' => 'App\\Controller\\FactureController::show'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/facture']], [], []],
    'facture_edit' => [['id'], ['_controller' => 'App\\Controller\\FactureController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id'], ['text', '/facture']], [], []],
    'facture_delete' => [['id'], ['_controller' => 'App\\Controller\\FactureController::delete'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/facture']], [], []],
    'fournisseur_index' => [[], ['_controller' => 'App\\Controller\\FournisseurController::index'], [], [['text', '/fournisseur/']], [], []],
    'fournisseur_new' => [[], ['_controller' => 'App\\Controller\\FournisseurController::new'], [], [['text', '/fournisseur/new']], [], []],
    'fournisseur_show' => [['id'], ['_controller' => 'App\\Controller\\FournisseurController::show'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/fournisseur']], [], []],
    'fournisseur_edit' => [['id'], ['_controller' => 'App\\Controller\\FournisseurController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id'], ['text', '/fournisseur']], [], []],
    'fournisseur_delete' => [['id'], ['_controller' => 'App\\Controller\\FournisseurController::delete'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/fournisseur']], [], []],
    'home' => [[], ['_controller' => 'App\\Controller\\HomeController::index'], [], [['text', '/']], [], []],
    'ligne_de_commande_index' => [[], ['_controller' => 'App\\Controller\\LigneDeCommandeController::index'], [], [['text', '/ligne-de-commande/']], [], []],
    'ligne_de_commande_new' => [[], ['_controller' => 'App\\Controller\\LigneDeCommandeController::new'], [], [['text', '/ligne-de-commande/new']], [], []],
    'ligne_de_commande_show' => [['id'], ['_controller' => 'App\\Controller\\LigneDeCommandeController::show'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/ligne-de-commande']], [], []],
    'ligne_de_commande_edit' => [['id'], ['_controller' => 'App\\Controller\\LigneDeCommandeController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id'], ['text', '/ligne-de-commande']], [], []],
    'ligne_de_commande_delete' => [['id'], ['_controller' => 'App\\Controller\\LigneDeCommandeController::delete'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/ligne-de-commande']], [], []],
    'produit_index' => [[], ['_controller' => 'App\\Controller\\ProduitController::index'], [], [['text', '/produit']], [], []],
    'promotion_index' => [[], ['_controller' => 'App\\Controller\\PromotionController::index'], [], [['text', '/promotion/']], [], []],
    'promotion_new' => [[], ['_controller' => 'App\\Controller\\PromotionController::new'], [], [['text', '/promotion/new']], [], []],
    'promotion_show' => [['id'], ['_controller' => 'App\\Controller\\PromotionController::show'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/promotion']], [], []],
    'promotion_edit' => [['id'], ['_controller' => 'App\\Controller\\PromotionController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id'], ['text', '/promotion']], [], []],
    'promotion_delete' => [['id'], ['_controller' => 'App\\Controller\\PromotionController::delete'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/promotion']], [], []],
    'security_login' => [[], ['_controller' => 'App\\Controller\\SecurityController::login'], [], [['text', '/connexion']], [], []],
    'security_logout' => [[], ['_controller' => 'App\\Controller\\SecurityController::logout'], [], [['text', '/deconnexion']], [], []],
    'utilisateur_index' => [[], ['_controller' => 'App\\Controller\\UtilisateurController::index'], [], [['text', '/utilisateur/']], [], []],
    'utilisateur_registration' => [[], ['_controller' => 'App\\Controller\\UtilisateurController::registration'], [], [['text', '/utilisateur/inscription']], [], []],
    'utilisateur_show' => [['utiId'], ['_controller' => 'App\\Controller\\UtilisateurController::show'], [], [['variable', '/', '[^/]++', 'utiId'], ['text', '/utilisateur']], [], []],
    'utilisateur_edit' => [['utiId'], ['_controller' => 'App\\Controller\\UtilisateurController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'utiId'], ['text', '/utilisateur']], [], []],
    'utilisateur_delete' => [['utiId'], ['_controller' => 'App\\Controller\\UtilisateurController::delete'], [], [['variable', '/', '[^/]++', 'utiId'], ['text', '/utilisateur']], [], []],
];
