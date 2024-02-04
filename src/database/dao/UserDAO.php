<?php

class UserDAO
{
    /**
     * insert the user
     */
    public static function store($id, $author):void
    {
        $sql = "INSERT OR REPLACE INTO users (id, nick, discord_id) VALUES 
        (COALESCE((SELECT id FROM users WHERE discord_id = :discord_id), NULL), :nick, :discord_id)
        ";

        $connectionDao = new ConnectionDAO();
        $connection = $connectionDao->getConnection();

        $statement = $connection->prepare($sql);
        $statement->bindParam(':nick', $author);
        $statement->bindParam(':discord_id', $id);
    
        $statement->execute();
    }
    /**
     * update the user
     */
    public function update():void
    {

    }
    /**
     * delete the user
     */
    public function delete():void
    {

    }

    /**
     * show the specific user
     */
    public function show():void
    {

    }
}