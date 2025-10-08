<?php
    require 'header.php';

    require 'functions.php';
    require 'bdd.php';

    // Si l'URL ne contient pas d'id, on redirige sur la page d'accueil
    if(empty($_GET['id'])) {
        redirectTo('index');
    }

    // On recuper l'oeuvre depuis le database
    $pdoConnection = connection();
    $stmt = $pdoConnection->prepare("SELECT titre, artiste, image, description FROM oeuvres WHERE id = :id");
    $stmt->execute(['id' => $_GET['id']]);
  
    $oeuvre = $stmt->fetch(PDO::FETCH_ASSOC);

    
    // Si aucune oeuvre trouvé, on redirige vers la page d'accueil
    if(!$oeuvre) {
        redirectTo('index');
    }
?>

<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <img src="<?= htmlspecialchars($oeuvre['image']) ?>" alt="<?= htmlspecialchars($oeuvre['titre']) ?>">
    </div>
    <div id="contenu-oeuvre">
        <h1><?= htmlspecialchars($oeuvre['titre']) ?></h1>
        <p class="description"><?= htmlspecialchars($oeuvre['artiste']) ?></p>
        <p class="description-complete">
             <?= nl2br(htmlspecialchars($oeuvre['description'])) ?>
        </p>
    </div>
</article>

<?php require 'footer.php'; ?>
