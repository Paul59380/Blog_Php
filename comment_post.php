<?php
if(!empty($_POST['pseudo']) && !empty($_POST['comment'])){
    try{
        $db = new PDO('mysql:host=localhost;dbname=posts;charset=UTF8','root','',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }catch (Exception $e){
        die('Erreur : ' .$e ->getMessage());
    }
    $query = $db ->prepare('INSERT INTO comments(post_id, author, comments) VALUE (:id_billet, :pseudo, :comments)');
    $query ->execute(array(
        ":id_billet" => $_GET['id'],
        ":pseudo" => $_POST['pseudo'],
        ":comments" => $_POST['comment']
    ));
    $getBillet = $_GET['id'];
    header("Location:comment.php?id=$getBillet");

}else{
    ?>
    <h1>Error</h1>
<?php
}
?>