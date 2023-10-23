<?php

include __DIR__.'/../vendor/autoload.php';

use Discord\Discord;
use Discord\Parts\Channel\Message;
use Discord\WebSockets\Intents;
use Discord\WebSockets\Event;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();
$token = $_ENV['TOKEN'];

$discord = new Discord([
    'token' => $token,
    'intents' => Intents::getDefaultIntents()
]);

$discord->on('ready', function (Discord $discord) {
    echo "Bot is ready!", PHP_EOL;

   
    $discord->on(Event::MESSAGE_CREATE, function (Message $message, Discord $discord) {
        if(!$message->author->bot){
            $message->reply("Bot responded your message");
        }
      
    });
});

$discord->run();