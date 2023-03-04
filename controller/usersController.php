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
           
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['prenom'] = $user['prenom'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['id_role'] = $user['id_role'];
            $_SESSION['id_user'] = $user['id_user'];

            header("Location: index.php");//redirection vers index.php
        }else{
            $this->connexion();
        }
    }
    public function monCompte()
    {
        $id_user = $_SESSION['id_user'];
        $this->model = new usersModel; // initialisation du modèle
        $user = $this->model->getUserById($id_user);
        include('view/monCompte.php');
    }
    
    public function modifierMonCompte()
    {
        $id_user = $_SESSION['id_user'];
        $this->model = new usersModel; // initialisation du modèle
        $user = $this->model->getUserById($id_user);
        include('view/modifierMonCompte.php');
    }
    
    public function modification()
    {
        $nom = trim($_POST['nom']);
        $prenom = trim($_POST['prenom']);
        $tel = trim($_POST['tel']);
        $email = trim($_POST['email']);
        $id_user = $_SESSION['id_user'];
        $this->model = new usersModel; // initialisation du modèle
    
        if ($nom != '' && $prenom != '' && $email != '') {
            // mise à jour des informations utilisateur
            $this->model->updateUser($nom, $prenom, $tel, $email, $id_user);
    
            // mise à jour des informations de session
            $_SESSION["nom"] =  $nom;
            $_SESSION["prenom"] = $prenom;
            $_SESSION["email"] = $email;
    
            echo "<h1>modification OK</h1>";
        } else {
            $user = $this->model->getUserByEmail($email);
            $erreur = "Merci d'entrer des informations correctes";
            include('view/modifierMonCompte.php');
        }
    }


}

// github
