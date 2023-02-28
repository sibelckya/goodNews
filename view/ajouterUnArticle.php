<!-- <h1>Ajouter un article</h1>

<form action="" method="post" enctype="multipart/form-data">
    
    Titre : <input type="text" name="titre" id="titre"><br>
    Contenu : <textarea name="contenu" id="contenu" cols="30" rows="10"></textarea><br>
    Image : <input type="file" name="image" id="image"><br>

    Categorie :
    <select name="id_categorie">
      // 
              
            </option>
       
    </select>
    <br>
    <button>Ajouter</button>
</form> -->

<form class="w-96 mx-auto mt-4" action="" method="post" enctype="multipart/form-data">
    <div class="text-center">
        <h2 class="text-2xl">Ajouter un article</h2>
    </div>
    <div class="flex flex-col gap-1 mt-2">
        <label for="titre">Entrez le titre</label>
        <input type="text" placeholder="Entrez le titre de l'article" name="titre" class="input input-bordered input-primary w-full" />
    </div>

    <div class="flex flex-col gap-1 mt-2">
        <label for="contenu">Entrez le contenu</label>
        <textarea class="textarea textarea-primary" placeholder="Entrez le contenu de l'article" name="contenu"></textarea>
    </div>
    <div class="flex flex-col gap-1 mt-2">
        <label for="contenu">Selectionné la categorie</label>
        <select class="select select-primary w-full" name="id_categorie">
        <?php foreach ($categories as $categorie) { ?>
                <option value="<?= $categorie['idCategorie'] ?>"> <?= $categorie['nom'] ?>
            <?php } ?>
        </select>
    </div>
    <div class="flex flex-col gap-1 mt-2">
        <label for="fichier">Ajouter une image</label>
        <input type="file" class="file-input file-input-bordered file-input-primary w-full" name="image" id="image">
    </div>

    <label for="my-modal-3" class="btn btn-primary w-full mt-4">Ajouter</label>
    <input type="checkbox" id="my-modal-3" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box relative">
            <h3 class="text-lg font-bold"><i class="fa-solid fa-triangle-exclamation"></i> Attention !</h3>
            <p class="py-4">Est tu sur de vouloir ajouter l'article actuelle au site ?</p>
            <div class="flex flex-row justify-between ">
                <label for="my-modal-3" class="btn btn-error w-52 mt-4">Annulé</label>
                <button class="btn btn-primary w-52 mt-4">Ajouter</button>
            </div>

        </div>

    </div>

</form>