<?php

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../traits/MessageContent.php';

use Discord\Builders\MessageBuilder;
use Discord\Discord;
use Discord\Parts\Channel\Message;
use Discord\WebSockets\Event;

class DiscordEvent
{
    use MessageContent;

    /**
     * Verify all events 
     */
    public static function verifyEvent($discord)
    {
        static::verifyContentMessage($discord);
    }

    /**
     * Alert the user if in your message has a url
     */
    protected static function verifyContentMessage($discord)
    {
        $discord->on(Event::MESSAGE_CREATE, function (Message $message, Discord $discord) {
            if (!$message->author->bot) {
                static::exist($message, 'URLS', 'Você não pode divulgar aqui! baka :3');
                static::exist($message, 'OFFENSE', 'Você não pode falar esse tipo de coisa aqui no chat :O');
            }
        });
    }

    /**
     * Verify if exist content of .env in content
     */
    protected static function exist($message, $env, $alert): void
    {
        $instance = new self();
        $result = $instance->verifyContent($message, $env);

        if ($result == true) {
            $channel = $message->channel;
            $message->delete();
            $channel->sendMessage(MessageBuilder::new()->setContent($message->author . $alert));
        }
    }

}