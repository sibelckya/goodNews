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

    case 'categorie':
        $articles = new articlesController;
        $articles->getArticleByCat($_GET['id']);
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
        $user = new UsersController;
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
    
                $article = new articlesController;
    
                if (isset($_POST['id'])) {
                    $article->deleteArticle();
                } else {
                    $article->formDeleteArticle();
                }
            } else {
                echo "acces interdit";
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
    
    
        default:
            $articles = new articlesController;
            $articles->getArticles();
            break;
}
