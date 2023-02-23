<h1>Ajouter un article</h1>

<form action="" method="post" enctype="multipart/form-data">
    
    Titre : <input type="text" name="titre" id="titre"><br>
    Contenu : <textarea name="contenu" id="contenu" cols="30" rows="10"></textarea><br>
    Image : <input type="file" name="image" id="image"><br>

    Categorie :
    <select name="id_categorie">
        <?php foreach ($categories as $categorie) { ?>
            <option value="<?= $categorie['idCategorie'] ?>">
                <?= $categorie['nom'] ?>
            </option>
        <?php } ?>
    </select>
    <br>
    <button>Ajouter</button>
</form>