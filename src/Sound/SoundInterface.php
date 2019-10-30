<?php

namespace App\YandexSpeechKit\Sound;

interface SoundInterface
{
    public function play(): void;

    public function delete(): void;
}
