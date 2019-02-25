<?php
require('model/model.php');

function listPosts(){
    $posts = getPosts(); // Must have the same name than the variable in display_home
    require('view/display_home.php');
}

function post(){
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);

    require('view/comment.php');
}