<?php

trait MessageContent
{
    /**
     * Check content in message
     */
    public function verifyContent($message, $env)
    {
        Dotenv\Dotenv::createImmutable(__DIR__ . '/../..')->load();
        $itensEnv = $_ENV[$env];

        $itens = explode(',', $itensEnv);

        $response = array_filter($itens, function ($item) use (&$message) {
            $result = strpos($message->content, $item);
            if ($result !== false) {
                return true;
            }
        });

        return $response;
    }
}