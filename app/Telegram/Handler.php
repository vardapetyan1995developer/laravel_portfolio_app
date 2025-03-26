<?php

namespace App\Telegram;

use App\Services\Contracts\IOpenAIService;
use Exception;
use App\Services\Contracts\ITelegramService;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Stringable;

class Handler extends WebhookHandler
{
    private ITelegramService $telegramService;
    private IOpenAIService $openAIService;

    /**
     * @param ITelegramService $telegramService
     * @param IOpenAIService $openAIService
     */
    public function __construct(ITelegramService $telegramService, IOpenAIService $openAIService)
    {
        $this->telegramService = $telegramService;
        $this->openAIService = $openAIService;
    }

    /**
     * @param string $name
     * @return void
     */
    public function hello(string $name): void
    {
        $this->telegramService->sendMessage($this->chat->id, "Hello $name");
    }

    /**
     * @return void
     */
    public function help(): void
    {
        $this->telegramService->sendHelpMessage($this->chat->id);
    }

    /**
     * @return void
     */
    public function like(): void
    {
        try
        {
            $this->telegramService->sendMessage($this->chat->id, 'Thank you for like😊');
        }
        catch (Exception $e)
        {
            Log::error('Error sending Telegram message: ' . $e->getMessage());
        }
    }

    /**
     * @return void
     */
    public function subscribe(): void
    {
        $channelName = $this->data->get('channel_name') ?? 'unknown channel';
        $this->telegramService->sendMessage($this->chat->id, "Thank you for subscribing to $channelName");
    }

    /**
     * @return void
     */
    public function actions(): void
    {
        try
        {
            $this->telegramService->sendActionsKeyboard($this->chat->id);
        }
        catch (Exception $e)
        {
            Log::error('Telegram API Error: ' . $e->getMessage());
        }
    }

    /**
     * @param Stringable $text
     * @return void
     */
    protected function handleUnknownCommand(Stringable $text): void
    {
        $response = ($text->value() === '/start')
            ? "Welcome back😊😊😊"
            : "Unknown command🙁🙁🙁";

        $this->telegramService->sendMessage($this->chat->id, $response);
    }

    /**
     * @param Stringable $text
     * @return void
     */
    protected function handleChatMessage(Stringable $text): void
    {
        $response = $this->openAIService->ask($text->value());
        $this->reply($response);
    }
}
