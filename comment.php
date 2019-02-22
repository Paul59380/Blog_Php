
<?php
if(isset($_GET['id'])){
    try{
        $db = new PDO('mysql:host=localhost;dbname=posts;charset=UTF8','root','',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }catch (Exception $e){
        die('Erreur : ' .$e ->getMessage());
    }
    $query = $db ->prepare('SELECT * FROM tickets WHERE id = :id');
    $query ->execute(array(
        ":id" => $_GET['id']
    ));
    while($data = $query ->fetch()){
        ?>
        <link href="design.css" rel="stylesheet">

        <div class="billet">
            <div class="titre">
                <span> <?php echo $data['title'] . ' <br> ' . $data['creation_date']; ?> </span>
            </div>
            <p> <?php echo $data['content'] ?><br>
            </p>
        </div>
<?php
    }
    $query ->closeCursor();
}
?>

<?php

    try{
        $db = new PDO('mysql:host=localhost;dbname=posts;charset=UTF8','root','',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }catch (Exception $e){
        die('Erreur : ' .$e ->getMessage());
    }

    $query = $db ->prepare('SELECT * FROM comments WHERE post_id = :postId  ORDER BY id DESC LIMIT 0,7' );
    $query ->execute(array(
        ":postId" => $_GET['id']
    ));
    while($data = $query ->fetch()){
        ?>
        <link href="design.css" rel="stylesheet">

        <div id="comment">
            <p><?php echo $data['author'] ?> <br>
                <span> <?= $data['comments'] ?></span>
            </p>
        </div>
<?php
    }
    $query -> closeCursor();
?>
<form method="POST" action="comment_post.php?id=<?php echo $_GET['id'] ?>" >
    <label>Pseudo : <br>
        <input type="text" name="pseudo">
    </label> <br>

    <label>Comment : <br>
        <input type="text" name="comment">
    </label> <br>
    <p>
        <input type="submit" name="Send">
    </p>
</form>


<a href="index.php">Retour au billet</a>
