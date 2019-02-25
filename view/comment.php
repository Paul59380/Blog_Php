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

<form action="index.php?id=<?= $_GET['id'] ?>&action=addComment" method="POST">
    <p>
        <label for="author">Auteur : </label> <br>
            <input type="text" name="author" id="author" />
    </p>

    <p>
        <label for="comments">Commentaire : </label> <br>
            <input type="text" name="comments" id="comments" />
    </p>

    <p>
        <input type="submit" value="Send" />
    </p>
</form>

<?php $content = ob_get_clean(); ?>
<?php require ('template.php') ?>
