<?php
$nom = "";
$prenom = "";
$email = "";
$tel = "";
$mdp = "";

$errorNom = "";
$errorEmail = "";
$errorTel = "";
$errorMdp = "";
$errorPrenom = "";

if (isset($_POST['nom'])) {
    if (!empty($_POST["nom"])) {
        $nom = $_POST["nom"];
    } else {
        $errorNom = "le nom est obligatoire";
    }
}

if (isset($_POST["email"])) {
    if ($_POST["email"] != "") {
        $email = $_POST["email"];
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorEmail = "l'email est invalide";
    } else {
        $errorEmail = "l'email est obligatoire";
    }
}
if (isset($_POST["mdp"])) {

    if ($_POST["mdp"] != "") {
        $mdp = $_POST["mdp"];
    } else {
        $errorMdp = "le mot de passe est obligatoire";
    }
    if (isset($_POST["prenom"])) {

        if ($_POST["prenom"] != "") {
            $message = $_POST["prenom"];
        } else {
            $errorMessage = "le prénom est obligatoire";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.50.2/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Inscription</title>
</head>
<body>

<div><?= @$erreur ?></div>
<form action="index.php?page=setInscription" method="post">


    Nom : <input type="text" name="nom" class="input input-bordered input-xs w-full max-w-xs" ><br>
    Prénom : <input type="text" name="prenom" class="input input-bordered input-sm w-full max-w-xs"><br>
    Tél : <input type="tel" name="tel" class="input input-bordered input-md w-full max-w-xs"><br>
    Email : <input type="email" name="email" class="input input-bordered input-lg w-full max-w-xs"><br>
    Mdp : <input type="password" name="mdp" class="input input-bordered input-lg w-full max-w-xs"><br>
    <button type="" class="btn btn-xs sm:btn-sm md:btn-md lg:btn-lg">S'inscrire</button>

</form>
</body>
</html>