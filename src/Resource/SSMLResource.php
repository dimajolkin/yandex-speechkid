<?php

namespace App\YandexSpeechKit\Resource;

use App\YandexSpeechKit\Config;
use App\YandexSpeechKit\Sound\OggSound;
use App\YandexSpeechKit\Sound\SoundInterface;

class SSMLResource implements ResourceInterface
{
    /** @var string */
    private $content;
    private $name;

    /**
     * SSMLResource constructor.
     * @param string $content
     */
    public function __construct(string $content)
    {
        $this->content = $content;
        $this->name = uniqid();
    }

    /**
     * SSMLResource constructor
     * @param string $fileName
     * @return SSMLResource
     */
    public static function createByFileName(string $fileName)
    {
        return new static(file_get_contents($fileName));
    }

    public function data(Config $config): array
    {
        return [
            'ssml' => $this->content,
        ];
    }

    public function buildSound(Config $config, $content): SoundInterface
    {
        $dir = $config->getDataDir();
        $file = "$dir/{$this->name}.ogg";
        file_put_contents($file, $content);
        return new OggSound($file);
    }
}
