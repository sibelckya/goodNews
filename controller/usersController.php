<?php
include_once('model/usersModel.php');

class UsersController extends UsersModel
{

    protected $id_user;
    protected $nom;
    protected $prenom;
    protected $tel;
    protected $email;
    protected $mdp;


    public function __construct()
    {
    }
    public function inscription()
    {
        $this->nom = trim($_POST['nom']);
        $this->prenom = trim($_POST['prenom']);
        $this->tel = trim($_POST['tel']);
        $this->email = trim($_POST['email']);
        //    $this->mdp = trim($_POST['mdp']);
        $this->mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);
        if ($this->nom != '' && $this->prenom != '' && $this->email != '' && $this->mdp != '') {
            $user = $this->getUserByEmail();
            if ($user == false) {
                $this->setUser();
                echo "<h1>Inscription OK</h1>";
            } else {
                echo "<h1>Utilisateur existant";
            }
        } else {
            $erreur = "Merci d'entrer les informations correctement";
            include('view/inscription.php');
        }
    }
    public function authentification()
    {

        $this->email = trim($_POST['email']);
        $this->mdp = $_POST["mdp"];


        if ($this->email != '' && $this->mdp != '') {
            $user = $this->getUserByEmail();

            if (password_verify($this->mdp, $user["mdp"])) {

                $_SESSION["nom"] = $user['nom'];
                $_SESSION["prenom"] = $user['prenom'];
                $_SESSION["email"] = $user['email'];
                $_SESSION["id"] = $user['id'];

                header('Location: index.php');
                echo "<h1>Authentification OK</h1>";
            } else {
                $erreur = "Email ou mdp incorrecte";
                include('view/authentification.php');
            }
        } else {
            $erreur = "Merci d'entrer les informations correctement";
            include('view/authentification.php');
        }
    }
}

// github
