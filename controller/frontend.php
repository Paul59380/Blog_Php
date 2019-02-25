<?php
require('model/frontend.php');

function listPosts(){
    $posts = getPosts(); // Must have the same name than the variable in display_home
    require('view/display_home.php');
}

function post(){
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);

    require('view/comment.php');
}

function addComment($postId, $author, $postComments){
    $affectLine = postComment($postId, $author, $postComments);
    if($affectLine === false){
        die("Impossible d'ajouter ce commentaire !");
    }else{
        header('Location:index.php?action=post&id='. $postId);
    }
}