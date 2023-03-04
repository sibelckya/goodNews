<?php foreach($articles as $article){?>
    <div>
    <a href='?p=article&id=<?=$article['id_article']?>'><h2><?=$article['titre']?></h2>
        <img src='<?=$article['image']?>'>
        <p><?=$article['contenu']?></p>
        <p><?=$article['nom']?></p>
        <p><?=$article['dateCreation']?></p>
    </div>
    <?php }?>