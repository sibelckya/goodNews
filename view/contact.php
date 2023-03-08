<?php
$nom = "";
$email = "";
$tel = "";
$message = "";

$errorNom = "";
$errorEmail = "";
$errorTel = "";
$errorMessage = "";

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
if (isset($_POST["message"])) {

    if ($_POST["message"] != "") {
        $message = $_POST["message"];
    } else {
        $errorMessage = "message obligatoire";
    }
}
?>

<body>
    <form action="" method="POST">
        <span>CONTACTEZ</span>
        <span>NOUS</span>
        <div>TEL: +33 76 45 45 45 45</div>
        <input class="input input-bordered input-error w-full max-w-xs" placeholder="NOM" name="nom" value="<?php echo $nom; ?>" required>
        <span class="error"> <?php echo $errorNom; ?></span>
        <input class="input input-bordered input-error w-full max-w-xs" type="email" placeholder="EMAIL" name="email" value="<?php echo $email; ?>" required>
        <span class="error"><?php echo  $errorEmail; ?></span>
        <input class="input input-bordered input-error w-full max-w-xs" placeholder="TELEPHONE" name="telephone" value="<?php echo $tel; ?>" required>
        <span class="error"><?php echo $errorTel; ?></span> <br>
        <input class="input input-bordered input-error w-full max-w-xs" placeholder="MESSAGE" name="sujet" required><?php echo $message; ?>
        <span class="error"><?php echo $errorMessage; ?></span> <br>
        <button class="btn btn-error">ANNULER</button>
        <button class="btn btn-error">ENVOYER</button>
        </ul>
    </form>

</body>

</html>