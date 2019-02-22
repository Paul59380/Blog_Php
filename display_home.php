<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="design.css" rel="stylesheet">
    <title>Mon super site</title>
</head>
<body>
<h1>Bienvenue sur mon blog !</h1>
<h3>Découvrez nos différents billet : </h3>

<?php
while($data = $reply ->fetch()){
    ?>
    <div class="billet">
        <div class="titre">
            <span> <?php echo htmlspecialchars($data['title']) . ' <br> ' . htmlspecialchars($data['new_date']); ?> </span>
        </div>
        <p> <?php echo htmlspecialchars($data['content']) ?><br>
            <a href="comment.php?id=<?php echo $data['id'] ?>">Commentaires</a>
        </p>
    </div>
    <?php
}
?>
</body>
</html>