<?php

use App\YandexSpeechKit\Config;
use App\YandexSpeechKit\Resource\SSMLResource;
use App\YandexSpeechKit\Resource\TextResource;
use App\YandexSpeechKit\SpeechService;

include __DIR__ . '/vendor/autoload.php';

$config = new Config(__DIR__ . '/data', __DIR__ . '/config.json');
$service = new SpeechService($config);
$sounds[] = $service->create(new TextResource('Привет мир'));
$sounds[] = $service->create(new TextResource('Привет странный мир'));

$sounds[] = $service->create(SSMLResource::createByFileName(__DIR__ . '/speech.xml'));
$sounds[] = $service->create(new SSMLResource("<speak>Немного XML</speak>>"));

/** @var \App\YandexSpeechKit\Sound\SoundInterface $sound */
foreach ($sounds as $sound) {
    $sound->play();
    $sound->delete();
}
