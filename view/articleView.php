<div>
    <h2><?=$article['titre']?></h2>
        <img src='<?=$article['image']?>'>
        <p><?=$article['contenu']?></p>
        <p><?=$article['dateCreation']?></p>
        <?php if (@$_SESSION['id_role'] == 1) { ?>
        <a href="?p=deleteArticle&id=<?= $article['id_article'] ?>">Supprimer</a>
        <?php } ?>
    </div>