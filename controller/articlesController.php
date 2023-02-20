<?php

include('model/articlesModel.php');

class articlesController
{

    private $id;
    private $titre;
    private $contenu;
    private $image;
    private $vue;
    private $id_user;
    private $id_categorie;

    private $model;//déclaration propriéte "model"

    public function __construct()
    {
        $this->model = new articlesModel;
    }

    public function getArticles()
    {
        $articles = $this->model->getArticles(); 
        include('view/articlesView.php');//ce code est fusionner
    }
    public function getArticleById($id)
    {
        $articles = $this->model->getArticleById($id); // tableaux
        
        include('view/articlesView.php');
        
    }

    public function getArticleByCat($id)
    {
        $articles = $this->model->getArticleByCat($id); // tableaux
        
        include('view/articlesView.php');
        
    }
    public function formAjoutArticle()
    {
        include('view/formAjoutArticle.php');
    }
    // public function setArticle()
    // {
    //     $ajout= $this->model->setArticle($_POST['titre'], $_POST['contenu'], $_POST['image'], $_POST['id_user'], $_POST['id_categorie']);
    //     if ($ajout) {
    //         echo "<h1>Article ajouté</h1>";
    //     } else {
    //         $this->formAjoutArticle();
    //     }
    // }
    

}
