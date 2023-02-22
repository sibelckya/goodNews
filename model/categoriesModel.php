<?php

class categoriesModel
{
   
    private $db;

    public function __construct()
    {
        $this->db = BDD::connexion();
    }

    public function getCategories()
    {
        return $this->db->query("SELECT * FROM categories")->fetchAll();
    }
    public function getCategorieById($id)
    {
        return $this->bdd->query("SELECT * FROM categories WHERE id_categorie=$id")->fetch(PDO::FETCH_ASSOC);
    }

    public function getSousCategories($id)
    {
        return $this->bdd->query("SELECT * FROM categories WHERE id_parent=$id")->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllCategories()
    {
        return $this->bdd->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC);
    }
}
 
