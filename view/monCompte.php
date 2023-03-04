<h3 class="text-center">Mon compte</h3>
                    
<div class="grid place-items-center">
Nom: <?=@$user['nom']?>
<br>
Prénom: <?= @$user['prenom']?>
<br>
Email:<?= @$user['email']?>
<br>
Tel:<?= @$user['tel']?>
<br>
<br><br>
<a href="?p=modifierMonCompte" class="btn btn-error">Modifier</a><br><br>
</div>