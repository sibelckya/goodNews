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
        if(isset($_POST['nom'])){
            $user->setUser();
        }else{
            $user->inscription();
        }
        break;

    case 'connexion':
        $user = new usersController;
        if(isset($_POST['email'])){
            $user->authentification();
        }else{
            $user->connexion();
        }
        break;

    case 'deconnexion':
        $_SESSION = [];
        header("Location: index.php");
        break;
    // case 'setInscription':
    //     include('controller/usersController.php');
    //     $inscription = new usersController;
    //     $inscription->inscription();
    //     break;
    // case 'authentification':
    //     include('view/authentification.php');
    //     break;

    // case 'setAuth':
    //     include('controller/usersController.php');
    //     $authentification = new usersController;
    //     $authentification->authentification();
    //     break;
}
