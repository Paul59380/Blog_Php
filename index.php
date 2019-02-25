<?php
require('controller/frontend.php');

try{
    if(isset($_GET['action'])){
        if($_GET['action'] == "listPosts"){
            listPosts();
        }
        elseif ($_GET['action'] == "post"){
            if(isset($_GET['id']) && $_GET['id'] > 0){
                post();
            }
            else{
                throw new Exception('Ce billet n\'existe pas');
            }
        }
        elseif ($_GET['action'] == "addComment"){
            if(isset($_GET['id']) && $_GET['id'] > 0){
                if(!empty($_POST['author']) && !empty($_POST['comments'])){
                    $id = $_GET['id'];
                    $author = $_POST['author'];
                    $comments = $_POST['comments'];
                    addComment($id, $author, $comments);
                }
                else{
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else{
                throw new Exception('Aucun identifiant de billet renvoyé');
            }
        }
    }else{
        listPosts();
    }
}catch(Exception $e){
    echo "Erreur : " . $e ->getMessage();
}



