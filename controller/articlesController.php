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

    private $model; //déclaration propriéte "model"

    public function __construct()
    {
        $this->model = new articlesModel;
    }

    public function getArticles()
    {
        $articles = $this->model->getArticles();
        include('view/articlesView.php'); //ce code est fusionner
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
        include('view/ajouterUnArticle.php');
    }
    public function setArticle()
    {
        $ajout = $this->model->setArticle($_POST['titre'], $_POST['contenu'], $_POST['image'], $_POST['id_user'], $_POST['id_categorie']);
        if ($ajout) {
            echo "<h1>Article ajouté</h1>";
        } else {
            $this->formAjoutArticle();
        }
    }
    function formDeleteArticle()
    {
        include('view/formDeleteArticle');
    }
    function deleteArticle()
    {
        $deleteArticle = $this->model->deleteArticle($_POST['id']);
        if ($deleteArticle) {
            echo "article supprimé";
        } else {
            $this->formDeleteArticle();
        }
    }
    public function modArticle()
    {


        $image = $this->fileUpload();

        $ajout = $this->model->setArticle($_POST['titre'], $_POST['contenu'], $image, $_SESSION['id_user'], $_POST['id_categorie']);
        if ($ajout) {
            echo "Article ajouté";
        } else {
            $this->formAjoutArticle();
        }
    }

    public function fileUpload()
    {
        //  var_dump($_FILES['fichier']);
        
        $fichier = explode('.', $_FILES['image']['name']);
        $extension = end($fichier); // recuperer l'extention du fichier ex : jpj png pdf ...

        $typeFichierTmp = mime_content_type($_FILES['image']['tmp_name']); // type du fichier ex: 'image/jpeg', 'image/png'

        $chemin = 'fichiers/' . microtime(true) . '.' . $extension; // le chemin et le nouveau nom de fichier 


        $typeFichierAccepter = ['image/jpeg', 'image/png'];
        $typeExtAccepter = ['jpg', 'png', 'gif'];

        // in_array(test,tab)

        if (in_array($typeFichierTmp, $typeFichierAccepter) && in_array($extension, $typeExtAccepter)) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $chemin)) {
                return $chemin;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
