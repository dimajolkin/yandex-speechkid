<?php

namespace App\YandexSpeechKit\Sound;

abstract class AbstractSound implements SoundInterface
{
    /** @var string */
    protected $file;

    /**
     * OggSound constructor.
     * @param string $file
     */
    public function __construct(string $file)
    {
        $this->file = $file;
    }

    public function delete(): void
    {
        @unlink($this->file);
    }
}
