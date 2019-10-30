<?php

namespace App\YandexSpeechKit\Resource;

use App\YandexSpeechKit\Config;
use App\YandexSpeechKit\Sound\SoundInterface;

interface ResourceInterface
{
    public function data(Config $config): array;

    public function buildSound(Config $config, $content): SoundInterface;
}
