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
        try{
            $db = new PDO('mysql:host=localhost;dbname=posts;charset=UTF8','root','',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }catch (Exception $e){
            die('Erreur : ' .$e ->getMessage());
        }
        $reply = $db -> query('SELECT id, title, content, DATE_FORMAT(creation_date, "%d%m%Y à %Hh:%imin:%ss")
        AS new_date FROM tickets ORDER BY new_date LIMIT 0,10');

        while($data = $reply ->fetch()){
            ?>
            <div class="billet">
                <div class="titre">
                    <span> <?php echo $data['title'] . ' <br> ' . $data['new_date']; ?> </span>
                </div>
                <p> <?php echo $data['content'] ?><br>
                    <a href="comment.php?id=<?php echo $data['id'] ?>">Commentaires</a>
                </p>
            </div>

    <?php
        }
    ?>
</body>
</html>
