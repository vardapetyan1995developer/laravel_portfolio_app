<?php

return [
    'default' => env('AI_SERVICE', 'openai'),

    'services' => [
        'ollama' => App\Services\OllamaService::class,
        'chatgpt' => App\Services\ChatGPTService::class,
    ],
];
