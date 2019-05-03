<?php

class Search
{
    public static function searchPosts($foundPosts)
    {
        $conn = Db::getInstance();
        // Prepare statement
        $statement = $conn->prepare("SELECT * FROM 'images' WHERE img_description LIKE %$foundPosts%");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
