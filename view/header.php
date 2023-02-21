<!DOCTYPE html>
<html data-theme="dracula" lang="en">
<!-- route: http://localhost/goodNews/index.php?p=articles -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.50.2/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="navbar">
        <div class="flex-1">
            <a class="btn btn-ghost normal-case text-xl">GoodNews</a>
        </div>
        <div class="flex-none">
            <ul class="menu menu-horizontal px-1">

                <?php foreach ($menu as $categories) { ?>
                    <li>
                        <a href="?p=categorie&id=<?= $categories['idCategorie'] ?>"> <?= $categories['nom'] ?></a>

                    </li>
                <?php } ?>
                <li>
                    <a href="index.php?p=inscription">Inscription</a>
                </li>
                <li>
                    <a href="index.php?p=connexion">Connexion</a>
                </li>
            </ul>
        </div>
    </div>