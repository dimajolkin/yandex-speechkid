<?php

namespace App\YandexSpeechKit;

class Config
{
    private $config = [];
    /**
     * @var string
     */
    private $dataDir;

    public function __construct(string $dataDir, string $fileName)
    {
        $this->config = json_decode(file_get_contents($fileName), true);
        $this->dataDir = $dataDir;
    }

    public function getToken()
    {
        return $this->config['token'] ?? null;
    }

    public function getFolderId(): string
    {
        return $this->config['folderId'];
    }

    public function getDataDir(): string
    {
        return $this->dataDir;
    }
}
