<?php

abstract class Search
{
    private static $conn;

    public static function searchPosts($foundPosts)
    {
        self::$conn = Db::getInstance();
        // Prepare statement
        $statement = self::$conn->prepare("SELECT * FROM 'images' WHERE img_description LIKE %$foundPosts%");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
