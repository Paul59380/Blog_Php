<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="design.css" rel="stylesheet">
    <title>Mon super site</title>
</head>
<body>
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


</body>
</html>