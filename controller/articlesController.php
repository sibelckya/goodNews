<?php

include_once('model/articlesModel.php');

class articlesController
{

    private $id;
    private $titre;
    private $contenu;
    private $image;
    private $dateCreation;
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
        $categories = new categoriesModel;
        $categories = $categories->getCategories();
        include('view/ajouterUnArticle.php');
    }
    public function setArticle()
    {

        $this->id_categorie = $_POST['id_categorie'];
        $this->titre = $_POST['titre'];
        $this->contenu = $_POST['contenu'];
        $this->image = $this->fileUpload();
        $this->dateCreation = date("Y-m-d");
        $this->id_user = $_SESSION['id_user'];

        if ($this->titre != '' && $this->contenu != '' && $this->id_categorie != '' && $this->dateCreation != '') {
            if ($this->setArticle()) {
                $_SESSION['article_message'] = "Article Ajoutée ";
                header('Location: index.php');
                exit;
            }
        } else {
            echo '<h2>Veuiller remplir tout les champs</h2>';;
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
