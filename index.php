<?php

require_once __DIR__.'/vendor/autoload.php';

use App\Console\Command\AddFozzyPetCommand;
use App\Console\Command\VoiceFozzyPetCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

$addCommand = new AddFozzyPetCommand();
$voiceCommand = new VoiceFozzyPetCommand();

$application = new Application();
$application->add($addCommand);
$application->add($voiceCommand);
$application->run();