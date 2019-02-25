<?php
function getPosts(){
    $db = dbConnect();
    $reply = $db -> query('SELECT id, title, content, DATE_FORMAT(creation_date, "%d%m%Y à %Hh:%imin:%ss")
    AS new_date_fr FROM tickets ORDER BY new_date_fr LIMIT 0,10');

    return $reply;
}

function getPost($postId){
    $db = dbConnect();
    $reply = $db ->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh:%imin:%ss")
    AS new_date_fr FROM tickets WHERE id = :id');
    $reply ->execute(array(
        ":id" => $postId
    ));

    $post = $reply ->fetch();
    return $post;
}

function getComments($postId){
    $db = dbConnect();
    $comments = $db ->prepare('SELECT post_id, author, comments, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh:%imin:%ss") 
    AS new_date_fr FROM comments WHERE post_id = :id_post ORDER BY comment_date DESC LIMIT 0,7');
    $comments ->execute(array(
        ":id_post" => $postId
    ));
    return $comments;
}


function dbConnect(){
    try{
        $db = new PDO('mysql:host=localhost;dbname=posts;charset=UTF8','root','',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }catch (Exception $e){
        die('Erreur : ' .$e ->getMessage());
    }
    return $db;
}

function postComment($postId, $author, $postComments){
    $db = dbConnect();
    $comments = $db -> prepare('INSERT INTO comments(post_id, author, comments) VALUE(:postId, :author, :postComments)');
    $affectLine = $comments ->execute(array(
        ":postId" => $postId,
        ":author" => $author,
        ":postComments" => $postComments
    ));
    return $affectLine;
}