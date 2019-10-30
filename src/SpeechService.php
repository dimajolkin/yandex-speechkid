<?php

namespace App\YandexSpeechKit;

use App\YandexSpeechKit\Resource\ResourceInterface;
use App\YandexSpeechKit\Sound\SoundInterface;
use GuzzleHttp\Client;

class SpeechService
{
    private const URL = 'https://tts.api.cloud.yandex.net/speech/v1/tts:synthesize';
    /** @var Config */
    private $config;

    /**
     * SpeechService constructor.
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function create(ResourceInterface $resource): SoundInterface
    {
        $client = new Client();
        $response = $client->request('POST', self::URL, [
            'headers' => [
                'Authorization' => $this->config->getToken(),
            ],
            'form_params' => $resource->data($this->config),
        ]);
        return $resource->buildSound($this->config, $response->getBody()->getContents());
    }
}
