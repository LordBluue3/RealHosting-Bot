<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/events/DiscordEvent.php';

use Discord\Discord;
use Discord\WebSockets\Intents;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();
$token = $_ENV['TOKEN'];

$discord = new Discord([
    'token' => $token,
    'intents' => Intents::getDefaultIntents()
]);

$discord->on('ready', function (Discord $discord): void {
    echo "Bot is ready!", PHP_EOL;

    DiscordEvent::verifyEvent($discord);

});

$discord->run();
