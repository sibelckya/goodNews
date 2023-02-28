<?php

// inclusion des contrôleurs
require_once('controller/articlesController.php');
require_once('controller/usersController.php');

// récupération de la page demandée
$page = $_GET['p'] ?? 'articles';

switch ($page) {
    case 'articles':
        // affichage des articles
        $articlesController = new ArticlesController();
        $articlesController->getArticles();
        break;
    case 'article':
        // affichage d'un article
        $id_article = $_GET['id'] ?? null;
        if ($id_article !== null) {
            $articlesController = new ArticlesController();
            $articlesController->getArticleById($id_article);
        } else {
            // id_article non fourni
            echo "Erreur : aucun article sélectionné";
        }
        break;
    case 'categorie':
        $articles = new articlesController;
        $articles->getArticleByCat($_GET['id']);
        break;
    case 'inscription':
        // inscription utilisateur
        $usersController = new UsersController();
        $usersController->inscription();
        break;
    case 'setInscription':
        // traitement formulaire d'inscription
        $usersController = new UsersController();
        $usersController->setUser();
        break;
    case 'contact':
        // affichage de la page de contact
        include('view/contact.php');
        break;

    case 'connexion':
        $user = new usersController;
        if (isset($_POST['email'])) {
            $user->authentification();
        } else {
            $user->connexion();
        }
        break;

    case 'deconnexion':
        $_SESSION = [];
        header("Location: index.php");
        break;
    case 'authentification':
        include_once('view/connexion.php');
        break;

    case 'setAuth':
        include_once('controller/usersController.php');
        $authentification = new usersController;
        $authentification->authentification();
        break;
    case 'formAjoutArticle':
        include_once('controller/articlesController.php');
        $articles = new ArticlesController;

        if (isset($_POST['titre'])) {
            $articles->setArticle();
        } else {
            $articles->formAjoutArticle();
        }
        break;
    case 'deleteArticle':
        if (@$_SESSION['id_role'] == 1) {
            $articles = new articlesController;

            if (isset($_POST['id'])) {
                $user->deleteArticle();
            } else {
                $user->formDeleteArticle();
            }
        } else {
            echo "accès interdit";
        }
        break;
    case 'monCompte':
        $userController = new UsersController();
        $userController->monCompte();
        break;

    case 'modifierMonCompte':
        $userController = new UsersController();
        $userController->modifierMonCompte();
        break;

    case 'modification':
        $userController = new UsersController();
        $userController->modification();
        break;
}
