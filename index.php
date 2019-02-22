<?php
    try{
        $db = new PDO('mysql:host=localhost;dbname=posts;charset=UTF8','root','',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }catch (Exception $e){
        die('Erreur : ' .$e ->getMessage());
    }
    $reply = $db -> query('SELECT id, title, content, DATE_FORMAT(creation_date, "%d%m%Y à %Hh:%imin:%ss")
    AS new_date FROM tickets ORDER BY new_date LIMIT 0,10');

    require('display_home.php');
?>