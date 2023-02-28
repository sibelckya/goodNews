<h1>Mon compte</h1>
<div><?= @$erreur ?></div>
<form action="?p=modification" method="POST">
Nom: <input name="nom" type="text" value="<?= $user['nom']?>" class="input input-bordered input-primary w-full max-w-xs">>
<br>
Prénom: <input name="prenom" type="text" value=" <?= $user['prenom']?>" class="input input-bordered input-primary w-full max-w-xs">>
<br>
Email: <input name="email" type="email" value="<?= $user['email']?>" class="input input-bordered input-primary w-full max-w-xs">>
<br>
Tel: <input name="tel" type="tel" value="<?= $user['tel']?>" class="input input-bordered input-primary w-full max-w-xs">><br><br>
<button class="btn btn-primary">Enregistrer</button>
</form>
