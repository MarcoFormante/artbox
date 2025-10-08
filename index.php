<?php
    require 'bdd.php';
    require 'functions.php';

    $pdoConnection = connection();
    $stmt = $pdoConnection->prepare("SELECT id, titre, artiste, image FROM oeuvres");
    $stmt->execute();

    $oeuvres = $stmt->fetchAll();

    require 'header.php';

    if (!$oeuvres) {
        generateErrorMessage("Aucune œuvre d'art pour le moment");
    }
    
?>
<div id="liste-oeuvres">
    <?php foreach($oeuvres as $oeuvre): ?>
        <article class="oeuvre">
            <a href="oeuvre.php?id=<?= $oeuvre['id'] ?>">
                <img src="<?= $oeuvre['image'] ?>" alt="<?= htmlspecialchars($oeuvre['titre']) ?>">
                <h2><?= htmlspecialchars($oeuvre['titre']) ?></h2>
                <p class="description"><?= htmlspecialchars($oeuvre['artiste']) ?></p>
            </a>
        </article>
    <?php endforeach; ?>
</div>
<?php require 'footer.php'; ?>
