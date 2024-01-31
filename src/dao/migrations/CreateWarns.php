<?php

require __DIR__ . '/../ConnectionDAO.php';

return new class {

    private $sql = "CREATE TABLE IF NOT EXISTS warning_sheets (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        user_id INTEGER,
        warn INTEGER, 
        mute INTEGER,
        mute_status BOOLEAN,
        mute_date TEXT,
        ban BOOLEAN,
        FOREIGN KEY (user_id) REFERENCES users(id)
    );";
    
    public function up()
    {
        $connectionDao = new ConnectionDAO();
        $connection = $connectionDao->getConnection();

        $connection->exec($this->sql);
    }
};