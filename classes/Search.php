<?php

class Search
{
    public static function searchPosts($foundPosts)
    {
        $conn = Db::getInstance();
        // Prepare statement
        $statement = $conn->prepare("select * from images where img_description like '%$foundPosts%'");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function searchUsers($foundUsers)
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare("select * from users where firstName like '%$foundUsers%' or lastName like '%$foundUsers%' or userName like '%$foundUsers%'");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
