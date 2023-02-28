<?php foreach($articles as $article){?>
    <div>
    <a href='?p=article&id=<?=$article['id_article']?>'><h2><?=$article['titre']?></h2>
        <img src='<?=$article['image']?>'>
        <p><?=$article['contenu']?></p>
        <p>Categorie : <b><?= $article['nom'] ?></b></p>
        <p><?=$article['dateCreation']?></p>
    </div>
    <?php }?>