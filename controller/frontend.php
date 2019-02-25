<?php

require_once ('model/CommentManager.php');
require_once('model/PostManager.php');

function listPosts()
{
    $postManager = new PostManager();
    $posts = $postManager -> getPosts(); // Must have the same name than the variable in display_home
    require('view/display_home.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager -> getPost($_GET['id']);
    $comments = $commentManager -> getComments($_GET['id']);

    require('view/comment.php');
}

function addComment($postId, $author, $postComments)
{
    $commentManager = new CommentManager();

    $affectLine = $commentManager -> postComment($postId, $author, $postComments);
    if ($affectLine === false) {
        die("Impossible d'ajouter ce commentaire !");
    } else {
        header('Location:index.php?action=post&id=' . $postId);
    }
}