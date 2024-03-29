<?php
include_once('bdd.php');

class UsersModel
{

    private $bdd;

    public function __construct()
    {
        $this->bdd = Bdd::connexion();
    }


    public function setUser()
    {
        $insert = $this->bdd->prepare("INSERT INTO utilisateurs(nom,prenom,tel,email,mdp) value(?,?,?,?,?)");
        return $insert->execute([$_POST['nom'], $_POST['prenom'], $_POST['tel'], $_POST['email'], $_POST['mdp']]);
    }
    public function getUserByEmail()
    {
        $email = $_POST['email'];
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->bdd->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getUserById($id)
    {
        return $this->bdd->query("SELECT * FROM utilisateurs WHERE id='$id'")->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUser()
    {
        #code
    }
    public function deleteUser($id)
    {
        # code...
    }
}
