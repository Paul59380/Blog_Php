<?php $title = "Bienvenue sur mon Blog ! "?>

<?php  ob_start(); ?>

<h1>Bienvenue sur mon Blog !</h1>
<h3>Découvrez nos derniers billets </h3>

<?php
    while($data = $posts ->fetch()){
        ?>
        <div class="billet">

            <div class="titre">
                <span> <?= htmlspecialchars($data['title']) . ' <br> ' . htmlspecialchars($data['new_date_fr']); ?> </span>
            </div>

            <p>
                <?= htmlspecialchars($data['content']) ?> <br>
                <a href="post.php?id=<?= $data['id'] ?>">Commentaires</a>
            </p>
        </div>
    <?php
    }
        $posts -> closeCursor();
    ?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php') ?>
