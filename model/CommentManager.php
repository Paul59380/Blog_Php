<?php

class CommentManager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT post_id, author, comments, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh:%imin:%ss") 
    AS new_date_fr FROM comments WHERE post_id = :id_post ORDER BY comment_date DESC LIMIT 0,7');
        $comments->execute(array(
            ":id_post" => $postId
        ));
        return $comments;
    }

    public function postComment($postId, $author, $postComments)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comments) VALUE(:postId, :author, :postComments)');
        $affectLine = $comments->execute(array(
            ":postId" => $postId,
            ":author" => $author,
            ":postComments" => $postComments
        ));
        return $affectLine;
    }

    private function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=posts;charset=UTF8', 'root', '',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $db;
    }

}