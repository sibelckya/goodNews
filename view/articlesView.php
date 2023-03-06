<body class="flex flex-col min-h-screen md:flex">
   <div class="grid grid-cols-4 gap-4">  
<?php foreach($articles as $article){?>
   
        <div>
            <a href='?p=article&id=<?=$article['id_article']?>'>
            <h1 class="text-3xl font-bold dark:text-white text-center"><?=$article['titre']?></h1>
            <img class="object-cover h-48 w-96 ..."src='<?=$article['image']?>'>
            <p><?=$article['nom']?></p>
            <p><?=$article['dateCreation']?></p>
        </div>
    
    <?php }?>
</div>
</body>