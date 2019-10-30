<?php

namespace App\YandexSpeechKit\Sound;

class WavSound extends AbstractSound
{
    public function play(): void
    {
        exec("play $this->file"); //.wav
    }
}
