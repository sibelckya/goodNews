<?php $articles = new articlesController; 
$accueil = $articles->getArticles();?>
<main class="flex flex-row mr-6">
    <div class="carousel w-4/6 h-1/2 mx-auto">
        <?php
        $count = 1;
        foreach ($articles as $article) {
        ?>
            <div id="slide<?= $count ?>" class="carousel-item relative w-full">
                <img src="<?= $article['image'] ?>" class="w-full" />
                <h3 class="absolute text-3xl top-3/4 left-1/2 transform -translate-x-1/2 -translate-y-2/2 text-center text-red-600"><?= $article['titre']; ?></h3>
                <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                    <a href="#slide<?= $count - 1 ?>" class="btn btn-circle">❮</a>
                    <a href="#slide<?= $count + 1 ?>" class="btn btn-circle">❯</a>
                </div>
            </div>
        <?php
            $count++;
        }
        ?>
    </div>