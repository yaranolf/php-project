<?php

abstract class Search
{
    private static $conn;

    public static function searchItem($foundItem)
    {
        self::$conn = Db::getInstance();
        // Prepare statement
        $statement = self::$conn->prepare("SELECT * FROM 'images' WHERE img_description LIKE %$foundItem%");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
