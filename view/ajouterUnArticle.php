
<div class="flex justify-center ...">
    <form action="" method="POST">
        Catégorie :
        <select name="idCategorie" class="select select-accent w-full max-w-xs">


            <?php foreach ($cats as $categorie) { ?>

                <option value="<?= $categorie['idCategorie'] ?>"><?= $categorie['nom'] ?></option>

            <?php } ?>

        </select>
        <br>
        Titre : <br>
        <input type="text" name="titre" class="input input-bordered input-secondary w-full max-w-xs">
        <br>
        Contenu : <br>
        <textarea name="contenu" class="textarea textarea-secondary"></textarea>
        <br>
        Image : <br>
        <input type="file" name="image" class="file-input file-input-bordered file-input-primary w-full max-w-xs">

        <br>Id_user :<br>
        <input type="id" name="id_user" class="input input-bordered input-secondary w-full max-w-xs">

        <br>Id_categorie :<br>
        <input type="id" name="id_categorie" class="input input-bordered input-secondary w-full max-w-xs">
        <br> <br>
        <button class="btn btn-primary">Ajouter</button>
        <br> <br>

    </form>
</div>