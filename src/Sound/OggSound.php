<?php

namespace App\YandexSpeechKit\Sound;

class OggSound extends AbstractSound
{
    public function play(): void
    {
        system("opusdec --force-wav --quiet {$this->file} - | aplay"); //.ogg
    }
}
