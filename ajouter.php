<?php require 'header.php'; ?>


<?php //On affiche les erreurs si y en a 
    if(!empty($errors)): ?>
    <div id="form-errors-container">
        <p>Le formulaire contient les erreurs suivantes :</h2>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach ;?>
        </ul>
    </div>
<?php endif ?>

<form action="traitement.php" method="POST">
    <div class="champ-formulaire">
        <label for="titre">Titre de l'œuvre</label>
        <input onchange='titre.classList.remove("input-error")'  class="<?=!empty($errors['titre']) ? 'input-error' : '' ?>"  required type="text" name="titre" id="titre" value=<?=$title ?? "" ?>>
    </div>
    <div class="champ-formulaire">
        <label for="artiste">Auteur de l'œuvre</label>
        <input onchange='artiste.classList.remove("input-error")'  class="<?=!empty($errors['artiste']) ? 'input-error' : ''?>" required type="text" name="artiste" id="artiste" value=<?=$artiste ?? ""  ?>>
    </div>
    <div class="champ-formulaire">
        <label for="image">URL de l'image</label>
        <input onchange='image.classList.remove("input-error")' class="<?=!empty($errors['image']) ? 'input-error' : ''?>" required type="url" name="image" id="image" value=<?= $image ?? ""?>>
    </div>
    <div class="champ-formulaire">
        <label for="description">Description</label>
        <textarea onchange='description.classList.remove("input-error")' class="<?=!empty($errors['description']) ? 'input-error' : ''?>"  required name="description" id="description"><?= $description ?? "" ?></textarea>
    </div>

    <input type="submit" value="Valider" name="submit">
</form>

<?php require 'footer.php'; ?>
