<?php
class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=posts;charset=UTF8', 'root', '',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $db;
    }
}