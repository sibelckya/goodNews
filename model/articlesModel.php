<?php
class articlesModel
{
 
  
    private $db;

    public function __construct()
    {
        $this->db = BDD::connexion();
    }
    public function getArticles()
    {
        return $this->db->query("SELECT * FROM articles")->fetchAll();  
    }

    public function getDernierArticles($limit)
    {
        return $this->db->query("SELECT * FROM articles ORDER BY id_article DESC LIMIT $limit ")->fetchAll();
    }
    public function getArticleById($id)
    {  
        return $this->db->query("SELECT * FROM articles WHERE id_article=$id")->fetch();
    }

    public function getArticleByCat($id_cat)
    {
        return $this->db->query("SELECT * FROM articles WHERE id_categorie=$id_cat")->fetchAll();

    }

    public function deleteArticle($id){
        
        $delete = $this->db->prepare("DELETE FROM articles WHERE id_article=?");
        return $delete->execute([$id]);
    }
    

}

$test = new articlesModel;
