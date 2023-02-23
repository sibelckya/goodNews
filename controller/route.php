<?php

switch (@$_GET['p']) {
        // index.php?p=articles
    case 'articles':

        $articles = new articlesController;
        $articles->getArticles();
        break;
        // index.php?p=article&id=1  
    case 'article':
        $articles = new articlesController;
        $articles->getArticleById($_GET['id']);
        break;
    case 'inscription':
        $user = new UsersController;
        if (isset($_POST['nom'])) {
            $user->setUser();
        } else {
            $user->inscription();
        }
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
    case 'setInscription':
        include_once('controller/usersController.php');
        $inscription = new usersController;
        $inscription->inscription();
        break;
    case 'authentification':
        include('view/connexion.php');
        break;

    case 'setAuth':
        include_once('controller/usersController.php');
        $authentification = new usersController;
        $authentification->authentification();
        break;
    case 'formAjoutArticle':
        $articles = new ArticlesController;

        if (isset($_POST['titre'])) {
            $articles->setArticle();
        } else {
            $articles->formAjoutArticle();
        }
        break;
    case 'deleteArticle':
        $articles = new articlesController;
        if (isset($_POST['id'])) {
            $user->deleteArticle();
        } else {
            $user->formDeleteArticle();
        }
        break;
}
