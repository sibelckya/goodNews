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
        $requeteCategorie ="SELECT articles.*,categories.* FROM articles
        INNER JOIN categories ON categories.id_categorie=articles.id_categorie
        ";
        return $this->bdd->query($requeteCategorie)->fetchAll();  
    }

    public function getDernierArticles($limit)
    {
        return $this->bdd->query("SELECT * FROM articles ORDER BY id_article DESC LIMIT $limit ")->fetchAll();
    }
    public function getArticleById($id)
    {  
        $requeteById="SELECT articles.*,categories.* FROM articles
        LEFT JOIN categories ON categories.id_categorie=articles.id_categorie WHERE id_article=$id";
        return $this->bdd->query($requeteById)->fetch();
    }

    public function getArticleByCat($id_cat)
    {
        $requete = "SELECT articles.*,categories.* FROM articles
        LEFT JOIN categories ON categories.id_categorie=articles.id_categorie WHERE categories.id_categorie=$id_cat";
        return $this->bdd->query($requete)->fetchAll();

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


