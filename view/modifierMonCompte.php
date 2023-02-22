<h1>Mon compte</h1>
<div><?= @$erreur ?></div>
<form action="index.php?p=modification" method="POST">
Nom: <input name="nom" type="text" value="<?= $user['nom']?>">
<br>
Prénom: <input name="prenom" type="text" value=" <?= $user['prenom']?>">
<br>
Email: <input name="email" type="email" value="<?= $user['email']?>">
<br>
Tel: <input name="tel" type="tel" value="<?= $user['tel']?>">
<button>Enregistrer</button>
</form>
