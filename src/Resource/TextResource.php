<?php

namespace App\YandexSpeechKit\Resource;

use App\YandexSpeechKit\Config;
use App\YandexSpeechKit\Sound\SoundInterface;
use App\YandexSpeechKit\Sound\WavSound;

class TextResource implements ResourceInterface
{
    const FORMAT_PCM = "lpcm";
    private $text;
    private $name;

    /**
     * TextResource constructor.
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function data(Config $config): array
    {
        return [
            'text' => $this->text,
            'lang' => 'ru-RU',
            'folderId' => $config->getFolderId(),
            'sampleRateHertz' => 48000,
            'format' => self::FORMAT_PCM,
        ];
    }

    public function buildSound(Config $config, $content): SoundInterface
    {
        $dir = $config->getDataDir();
        $md5FileName = md5($this->text);
        $rawFile = $dir . '/' . $md5FileName . '.raw';
        file_put_contents($rawFile, $content);

        $file = $dir . '/' . $md5FileName . '.wav';
        exec("sox -r 48000 -b 16 -e signed-integer -c 1 $rawFile $file");
        unlink($rawFile);

        return new WavSound($file);
    }
}
