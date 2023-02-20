
<h1>Tous les articles</h1>
<a href="?p=formAjoutArticle">Ajouter un article</a>
<?php
 
foreach($articles as $article)
{
    echo "
    <div>
    <a href='?p=articles&id={$article['id_article']}'><h2>{$article['titre']}</h2>
        <img src='{$article['image']}'>
        <p>{$article['contenu']}</p>
    </div>
    ";    

}

?>

<?php foreach($articles as $article){?>
    <div>
    <a href='?p=article&id=<?$article['id_article']?>'><h2><?=$article['titre']?></h2>
        <img src='<?=$article['image']?>'>
        <p><?=$article['contenu']?></p>
    </div>
    <?php }?>