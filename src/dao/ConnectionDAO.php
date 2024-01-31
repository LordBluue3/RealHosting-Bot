<?php

require __DIR__ . '/../../vendor/autoload.php';

class ConnectionDAO
{
    private $database;

    private ?\PDO $connection = null;

    public function __construct()
    {
        $this->configDatabase();

        try{
            $dns = "sqlite:{$this->database}";
           $this->connection = new PDO($dns);
        }catch(\Exception $e){
            echo 'Erro ao se conectar com o banco de dados'. PHP_EOL;
            echo $e;
        }
    }

    private function configDatabase(): void
    {
        try{
            $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
            $dotenv->load();
            $this->database = $_ENV['DB_DATABASE'];
        }catch(\Exception $e){
            echo 'Erro você precisa configurar o banco na .env'. PHP_EOL;
            echo $e;
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }
}