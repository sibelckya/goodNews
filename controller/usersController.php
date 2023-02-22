<?php
include_once('model/usersModel.php');

class UsersController
{

    protected $model;

    public function __construct()
    {
        $this->model = new UsersModel;
    }
    
    public function inscription(){
        include ('view/inscription.php');
    }

    public function setUser()
{
    $ajout = $this->model->setUser($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['tel'], password_hash($_POST['mdp'], PASSWORD_DEFAULT));
        echo "Inscription OK"; 
    if ($ajout) {
        
    } else {
        $this->inscription();
    }
}

    public function connexion(){
        include('view/connexion.php');
    }

    public function authentification(){
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];

        $user = $this->model->getUserByEmail($email);

        if (password_verify($mdp, $user['mdp'])){
            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['prenom'] = $user['prenom'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['id_role'] = $user['id_role'];

            header("Location: index.php");//redirection vers index.php
        }else{
            $this->connexion();
        }
    }


    // public function authentification()
    // {

    //     $this->email = trim($_POST['email']);
    //     $this->mdp = $_POST["mdp"];


    //     if ($this->email != '' && $this->mdp != '') {
    //         $user = $this->getUserByEmail();

    //         if (password_verify($this->mdp, $user["mdp"])) {

    //             $_SESSION["nom"] = $user['nom'];
    //             $_SESSION["prenom"] = $user['prenom'];
    //             $_SESSION["email"] = $user['email'];
    //             $_SESSION["id"] = $user['id'];

    //             header('Location: index.php');
    //             echo "<h1>Authentification OK</h1>";
    //         } else {
    //             $erreur = "Email ou mdp incorrecte";
    //             include('view/authentification.php');
    //         }
    //     } else {
    //         $erreur = "Merci d'entrer les informations correctement";
    //         include('view/authentification.php');
    //     }
    // }
}

// github
