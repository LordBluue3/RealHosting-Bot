<?php

trait MessageContent
{
    /**
     * Check content in message
     */
    public function verifyContent($message, $env): array
    {
        Dotenv\Dotenv::createImmutable(__DIR__ . '/../..')->load();
        $itemsEnv = $_ENV[$env];

        $items = explode(',', (string) $itemsEnv);

        return array_filter($items, function ($item) use (&$message) {
            $result = strpos((string) $message->content, $item);
            if ($result !== false) {
                return true;
            }
        });
    }
}