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
}
