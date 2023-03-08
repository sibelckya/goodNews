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

<body class="flex flex-col min-h-screen">
    <nav class="bg-dark shadow-lg">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between">
                <div class="flex space-x-7">
                    <div>
                    <a href="?p=articles" class="btn btn-ghost normal-case text-xl" >GoodNews</a>
                    </div>
                    <div class="hidden md:flex items-center space-x-1">
                        <?php foreach ($menu as $categories) { ?>
                            <a href="?p=categorie&id=<?= $categories['id_categorie'] ?>"> <?= $categories['nom'] ?></a>
                        <?php } ?>
                        
                        <?php if (isset($_SESSION['nom'])){?>
                            <a href="?p=monCompte">
                                <?=$_SESSION['nom']?>
                                <?=$_SESSION['prenom']?><br>
                                (<?=$_SESSION['role']?>)
                            </a>

                        <?php if ($_SESSION['id_role']== 1){?> 
                            <a href="?p=formAjoutArticle">Ajouter un article</a>
                        <?php } ?>
                            <a href="?p=deconnexion">Deconnexion</a>
                        <?php }else{?>
                            <a href="?p=inscription">Inscription</a>
                            <a href="?p=connexion">Connexion</a>
                        <?php } ?>
                    </div>

                    <div class="md:hidden flex items-right">
						<button class="outline-none mobile-menu-button">
						<svg class=" w-6 h-6 text-gray-500 hover:text-red-500 "
							x-show="!showMenu"
							fill="none"
							stroke-linecap="round"
							stroke-linejoin="round"
							stroke-width="2"
							viewBox="0 0 24 24"
							stroke="currentColor"
						>
							<path d="M4 6h16M4 12h16M4 18h16"></path>
						</svg>
					</button>
					</div>

                </div>

            </div>

        </div>

        <div class="hidden mobile-menu">
        <ul class="menu menu-vertical px-1">

            <?php foreach ($menu as $categories) { ?>
                <li>
                    <a href="?p=categorie&id=<?= $categories['id_categorie'] ?>"> <?= $categories['nom'] ?></a>

                </li>
            <?php } ?>
            <?php if (isset($_SESSION['nom'])){?>
                <li>
                    <a href="?p=monCompte">
                        <?=$_SESSION['nom']?>
                        <?=$_SESSION['prenom']?><br>
                        (<?=$_SESSION['role']?>)
                    </a>
                </li>
                 
<!-- Dans ce bloc, il permet d'afficher "ajouter une article" lorsque l'utilisateur est un administrateur-->
            <?php if ($_SESSION['id_role']== 1){?>
                <li> 
                    <a href="?p=formAjoutArticle">Ajouter un article</a> 
                </li>
            <?php } ?>
                <li>
                    <a href="?p=deconnexion">Deconnexion</a>
                </li>   

            <?php }else{?>

            <li>
                <a href="?p=inscription">Inscription</a>
            </li>
            <li>
                <a href="?p=connexion">Connexion</a>
            </li>
            <?php } ?>

        </ul>
        </div>
        <script>
				const btn = document.querySelector("button.mobile-menu-button");
				const menu = document.querySelector(".mobile-menu");

				btn.addEventListener("click", () => {
					menu.classList.toggle("hidden");
				});
			</script>


    </nav>
























