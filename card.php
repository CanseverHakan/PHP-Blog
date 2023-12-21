<?php
require_once './db.php';  

    $query = "SELECT * FROM articles";
    $stmt = $db->prepare($query);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);


?>
<div class="container">
    <div class="card" style="width: 18rem;">
        <img src="<?= $user['photo'] ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?= $user['titre'] ?></h5>
            <p class="card-text"><?= $user['contenu'] ?></p>
            <p class="card-text"><?= $user['auteur'] ?></p>
            <p class="card-text"><?= $user['id_member'] ?></p>
            <p class="card-text"><?= $user['date_creation'] ?></p>
        </div>
    </div>
</div>