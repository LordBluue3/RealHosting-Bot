<?php

namespace database\migrations;

require_once __DIR__.'/../dao/ConnectionDAO.php';

use database\dao\ConnectionDAO;

return new class {

    private $sql = "CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nick TEXT NOT NULL,
        discord_id TEXT NOT NULL
    );";

    public function up()
    {
        $connectionDao = new ConnectionDAO();
        $connection = $connectionDao->getConnection();

        $connection->exec($this->sql);
        
    }
};