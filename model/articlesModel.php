<?php
class articlesModel
{
 
  
    private $bdd;

    public function __construct()
    {
        $this->bdd = BDD::connexion();
    }
    public function getArticles()
    {
        return $this->bdd->query("SELECT * FROM articles")->fetchAll();  
    }

    public function getDernierArticles($limit)
    {
        return $this->bdd->query("SELECT * FROM articles ORDER BY id_article DESC LIMIT $limit ")->fetchAll();
    }
    public function getArticleById($id)
    {  
        return $this->bdd->query("SELECT * FROM articles WHERE id_article=$id")->fetch();
    }

    public function getArticleByCat($id_cat)
    {
        return $this->bdd->query("SELECT * FROM articles WHERE id_categorie=$id_cat")->fetchAll();

    }

    public function setArticle($titre,$contenu,$image,$id_user,$id_cat)
    {
        $date = date('Y-m-d');
        $ajout= $this->bdd->prepare("INSERT INTO articles(titre,contenu,image,dateCreation,id_user,id_categorie) VALUES(?,?,?,?,?,?)");      
        return $ajout->execute([$titre,$contenu,$image,$date,$id_user,$id_cat]); // true/false
        
    }
    public function deleteArticle($id){
        
        $delete = $this->bdd->prepare("DELETE FROM articles WHERE id_article=?");
        return $delete->execute([$id]);
    }
    

}


