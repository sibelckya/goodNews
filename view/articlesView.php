<body class="flex flex-col min-h-screen">
   <div class="grid grid-cols-4 gap-4">  
<?php foreach($articles as $article){?>
   
        <div>
            <a href='?p=article&id=<?=$article['id_article']?>'><h2><?=$article['titre']?></h2>
            <img class="object-cover h-48 w-96 ..."src='<?=$article['image']?>'>
            <p><?=$article['contenu']?></p>
            <p><?=$article['nom']?></p>
            <p><?=$article['dateCreation']?></p>
        </div>
    
    <?php }?>
</div>
</body>