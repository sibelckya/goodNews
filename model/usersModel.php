<?php
include_once('bdd.php');

class UsersModel
{

    private $bdd;

    public function __construct()
    {
        $this->bdd = Bdd::connexion();
    }


    public function setUser($nom,$prenom,$email,$tel,$mdp)
    {
        $insert = $this->bdd->prepare("INSERT INTO utilisateurs(nom,prenom,email,tel,mdp) value(?,?,?,?,?)");
        return $insert->execute([$nom,$prenom,$email,$tel,$mdp]);
    } 
    
    public function getUserByEmail($email){

        $sql = "SELECT utilisateurs.* , roles.* FROM utilisateurs
        LEFT JOIN affecter ON affecter.id_user = utilisateurs.id_user
        LEFT JOIN roles ON affecter.id_role = roles.id_role
        WHERE utilisateurs.email= '$email'";

        return $this->bdd->query($sql)->fetch();
    }

    public function getUserById($id){
        return $this->bdd->query("SELECT * FROM utilisateurs WHERE id_user=$id")->fetch();
    }






    // public function getUserByEmail()
    // {
    //     $email = $_POST['email'];
    //     $query = "SELECT * FROM users WHERE email = :email";
    //     $stmt = $this->bdd->prepare($query);
    //     $stmt->bindParam(':email', $email);
    //     $stmt->execute();
    //     $result = $stmt->fetch(PDO::FETCH_ASSOC);
    //     return $result;
    // }
    // public function getUserById($id)
    // {
    //     return $this->bdd->query("SELECT * FROM utilisateurs WHERE id='$id'")->fetch(PDO::FETCH_ASSOC);
    // }
    public function updateUser($nom, $prenom, $tel, $email, $id_user): void {
        $updateUserStmt = $this->bdd->prepare("
            UPDATE utilisateurs
            SET nom = :nom,
                prenom = :prenom,
                tel = :tel,
                email = :email
            WHERE id_user = :id_user
        ");
        $updateUserStmt->bindValue(':nom', $nom);
        $updateUserStmt->bindValue(':prenom', $prenom);
        $updateUserStmt->bindValue(':tel', $tel);
        $updateUserStmt->bindValue(':email', $email);
        $updateUserStmt->bindValue(':id_user', $id_user);
        $updateUserStmt->execute();
    }
    public function deleteUser($id)
    {
        # code...
    }
}
