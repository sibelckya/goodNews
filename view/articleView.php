<div class="md:flex">
    <h2 class="text-3xl font-bold dark:text-white text-center"><?=$article['titre']?></h2><br>
        <img class="h-auto max-w-lg mx-auto" src='<?=$article['image']?>'>
        <p class="text-center"><?=$article['contenu']?></p>
        <p class="text-center"><?=$article['dateCreation']?></p>
        <?php if (@$_SESSION['id_role'] == 1) { ?>
            <button class="btn btn-outline btn-error content-center"><a href="?p=deleteArticle&id=<?= $article['id_article'] ?>">Supprimer</a></button> 
        <?php } ?>
    </div>