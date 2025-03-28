<?php

namespace App\Services;

use App\Repositories\Contracts\ITelegramRepository;
use App\Services\Contracts\ITelegramService;
use DefStudio\Telegraph\Exceptions\TelegraphException;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;

class TelegramService implements ITelegramService
{
    private ITelegramRepository $telegramRepository;

    /**
     * @param ITelegramRepository $telegramRepository
     */
    public function __construct(ITelegramRepository $telegramRepository)
    {
        $this->telegramRepository = $telegramRepository;
    }

    /**
     * @param int $chatId
     * @param string $message
     * @return void
     * @throws TelegraphException
     */
    public function sendMessage(int $chatId, string $message): void
    {
        $chat = $this->telegramRepository->getChatById($chatId);
        if (!$chat) throw new TelegraphException("Chat ID {$chatId} not found.");

        $chat->message($message)->send();
    }

    /**
     * @param int $chatId
     * @return void
     * @throws TelegraphException
     */
    public function sendHelpMessage(int $chatId): void
    {
        $chat = $this->telegramRepository->getChatById($chatId);
        if (!$chat) throw new TelegraphException("Chat ID {$chatId} not found.");

        $chat->message("*Hello!* For now I can only speak.😊")->send();
    }

    /**
     * @param int $chatId
     * @return void
     * @throws TelegraphException
     */
    public function sendActionsKeyboard(int $chatId): void
    {
        $chat = $this->telegramRepository->getChatById($chatId);
        if (!$chat) throw new TelegraphException("Chat ID {$chatId} not found.");

        $chat->message('Choose some action')
            ->keyboard(Keyboard::make()->buttons([
                Button::make('Quiz')->action('quiz'),
                Button::make('Go to website')->url('https://it.zeepup.com'),
                Button::make('Like')->action('like'),
                Button::make('Subscribe')->action('subscribe')->param('channel_name', '@armdevstack'),
            ]))
            ->send();
    }
}
