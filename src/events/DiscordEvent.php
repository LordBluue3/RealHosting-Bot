<?php

include __DIR__ . '/../vendor/autoload.php';

use Discord\Builders\MessageBuilder;
use Discord\Discord;
use Discord\Parts\Channel\Message;
use Discord\WebSockets\Event;

class DiscordEvent
{
    /**
     * Verify all events 
     */
    public static function verifyEvent($discord)
    {
        static::urlAdsAlert($discord);
    }

    /**
     * Alert the user if in your message has a url
     */

    protected static function urlAdsAlert($discord)
    {
        $discord->on(Event::MESSAGE_CREATE, function (Message $message, Discord $discord) {
            if (!$message->author->bot) {
                $result = static::verifyUrl($message);

                if ($result == true) {
                    $channel = $message->channel;
                    $message->delete();
                    $channel->sendMessage(MessageBuilder::new()->setContent($message->author . 'Você não pode divulgar aqui! baka :3'));
                }
            }
        });
    }

    /**
     * Checks if there is a url within the message
     */

    protected static function verifyUrl($message)
    {
        $urls = [
            'https://',
            'http://'
        ];

        $response = array_filter($urls, function ($url) use (&$message) {
            $result = strpos($message->content, $url);
            if ($result !== false) {
                return true;
            }
        });

        return $response;
    }
}