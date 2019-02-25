<?php

class PostManager
{
    public function getPosts()
    {
        $db = $this -> dbConnect();
        $reply = $db -> query('SELECT id, title, content, DATE_FORMAT(creation_date, "%d%m%Y à %Hh:%imin:%ss")
    AS new_date_fr FROM tickets ORDER BY new_date_fr LIMIT 0,10');

        return $reply;
    }

    public function getPost($postId)
    {
        $db = $this -> dbConnect();
        $reply = $db ->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh:%imin:%ss")
    AS new_date_fr FROM tickets WHERE id = :id');
        $reply ->execute(array(
            ":id" => $postId
        ));

        $post = $reply ->fetch();
        return $post;
    }

    private function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=posts;charset=UTF8','root','',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $db;
    }
}