<?php

namespace App\Services;

use App\Services\Contracts\IAIService;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class OllamaService implements IAIService
{
    private Client $httpClient;
    private string $ollamaUrl;
    private string $model;

    public function __construct()
    {
        $this->httpClient = new Client();
        $this->ollamaUrl = config('services.ollama.url', 'http://localhost:11434/api/generate');
        $this->model = config('services.ollama.model', 'mistral');
    }

    /**
     * @param string $message
     * @return string
     * @throws GuzzleException
     */
    public function ask(string $message): string
    {
        $payload = [
            'model' => $this->model,
            'prompt' => $message,
            'stream' => false,
        ];

        try
        {
            $response = $this->httpClient->post($this->ollamaUrl, [
                'headers' => ['Content-Type' => 'application/json'],
                'json' => $payload,
            ]);

            $body = json_decode($response->getBody()->getContents(), true);

            return $body['response'] ?? 'No response from Ollama.';
        }
        catch (Exception $e)
        {
            \Log::error($e->getMessage());
            return 'Something went wrong 🙁🙁🙁';
        }
    }
}
