<?php

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../traits/MessageContent.php';
require __DIR__ . '/../dao/ConnectionDAO.php';

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
    public static function verifyEvent($discord): void
    {
        static::verifyContentMessage($discord, Event::MESSAGE_CREATE);
        static::verifyContentMessage($discord, Event::MESSAGE_UPDATE);
    }

    /**
     * Alert the user if in your message has a url
     */
    protected static function verifyContentMessage($discord, $event)
    {
        $discord->on($event, function (Message $message, Discord $discord): void {
            if (!$message->author->bot) {
                static::exist($message, 'DISCORD', 'Você não pode enviar convites de outros servidores aqui :(');
                static::exist($message, 'OFFENSE', 'Você não pode falar esse tipo de coisa aqui no chat :O');
            }
        });
    }

    /**
     * Verify if exist content of .env in content
     */
    protected static function exist($message, $env, string $alert): void
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