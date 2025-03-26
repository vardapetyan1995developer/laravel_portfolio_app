<?php

namespace App\Services;

use App\Services\Contracts\IOpenAIService;
use OpenAI;
use OpenAI\Client;

class OpenAIService implements IOpenAIService
{
    private Client $client;

    public function __construct()
    {
        $this->client = OpenAI::client(config('openai.openai_api_key'));
    }

    /**
     * @param string $message
     * @return string
     */
    public function ask(string $message): string
    {
        $response = $this->client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => 'You are a helpful assistant.'],
                ['role' => 'user', 'content' => $message]
            ]
        ]);

        return $response['choices'][0]['message']['content'] ?? 'I could not understand your request.';
    }
}
