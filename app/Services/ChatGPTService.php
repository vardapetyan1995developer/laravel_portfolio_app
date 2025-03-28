<?php

namespace App\Services;

use App\Services\Contracts\IAIService;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ChatGPTService implements IAIService
{
    private Client $httpClient;
    private string $apiKey;

    public function __construct()
    {
        $this->httpClient = new Client();
        $this->apiKey = config('services.openai.api_key');
    }

    /**
     * @param string $message
     * @return string
     * @throws GuzzleException
     */
    public function ask(string $message): string
    {
        $url = 'https://api.openai.com/v1/chat/completions';

        $payload = [
            'model' => 'gpt-4o',
            'messages' => [
                ['role' => 'system', 'content' => 'You are a helpful assistant.'],
                ['role' => 'user', 'content' => $message]
            ],
            'temperature' => 0.7
        ];

        try
        {
            $response = $this->httpClient->post($url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type'  => 'application/json'
                ],
                'json' => $payload,
            ]);

            $body = json_decode($response->getBody()->getContents(), true);

            return $body['choices'][0]['message']['content'] ?? 'No response from AI.';
        }
        catch (Exception $e)
        {
            \Log::error($e->getMessage());
            return 'Something went wrong🙁🙁🙁';
        }
    }
}
