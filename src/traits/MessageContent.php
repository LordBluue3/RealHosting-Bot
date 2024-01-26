<?php

trait MessageContent
{
    /**
     * Check content in message
     */
    public function verifyContent($message, $env)
    {
        Dotenv\Dotenv::createImmutable(__DIR__ . '/../..')->load();
        $itemsEnv = $_ENV[$env];

        $items = explode(',', $itemsEnv);

        $response = array_filter($items, function ($item) use (&$message) {
            $result = strpos($message->content, $item);
            if ($result !== false) {
                return true;
            }
        });

        return $response;
    }
}