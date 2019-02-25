<?php $title ="Mon Blog comments and post" ?>
<?php ob_start(); ?>

<h1>Bienvenue sur mon blog !</h1>
<h3>Découvrez les commentaires du billets selectionné : </h3>

    <div class="billet">
        <div class="titre">
            <?= $post['title'] . ' </br> Posté à : ' . $post['new_date_fr'] ?>
        </div>

        <p>
            <?= $post['content'] ?>
        </p>
    </div>

<h2>Commentaires :</h2>
<?php
    while($comment = $comments->fetch()){
        ?>
        <div id="comment"><?= $comment['author'] . ' <br> '. $comment['new_date_fr']?>
            <p>
                <?= $comment['comments'] ?>
            </p>
        </div>
<?php
    }
?>
<?php $content = ob_get_clean(); ?>
<?php require ('template.php') ?>
