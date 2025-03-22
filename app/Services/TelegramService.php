<?php

namespace App\Services;

namespace App\Services;

use App\Services\Contracts\ITelegramService;
use Illuminate\Http\Client\ConnectionException as ConnectionExceptionAlias;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TelegramService implements ITelegramService
{
    private string $token;
    private string $apiUrl;

    public function __construct()
    {
        $this->token = config('telegrambot.telegram_bot_token');
        $this->apiUrl = "https://api.telegram.org/bot{$this->token}";
    }

    /**
     * Send a message to a Telegram chat.
     *
     * @param int $chatId
     * @param string $text
     * @return void
     * @throws ConnectionExceptionAlias
     */
    public function sendMessage(int $chatId, string $text): void
    {
        try
        {
            $response = Http::post("{$this->apiUrl}/sendMessage", [
                'chat_id' => $chatId,
                'text'    => $text
            ]);

            if ($response->successful())
            {
                Log::info("Message sent successfully to chat ID {$chatId}");
            }
            else
            {
                Log::error("Failed to send message: {$response->body()}");
                throw new \Exception('Failed to send message.');
            }
        }
        catch (ConnectionExceptionAlias $e)
        {
            Log::error("Connection error while sending message: {$e->getMessage()}");
            throw new ConnectionExceptionAlias("Could not connect to Telegram API.");
        } catch (\Exception $e) {
            Log::error("An error occurred while sending message: {$e->getMessage()}");
            throw $e;
        }
    }
}
