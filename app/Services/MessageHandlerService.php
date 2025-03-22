<?php

namespace App\Services;

use App\Services\Contracts\IMessageHandlerService;
use App\Services\Contracts\ITelegramService;

class MessageHandlerService implements IMessageHandlerService
{
    private ITelegramService $telegramService;

    public function __construct(ITelegramService $telegramService)
    {
        $this->telegramService = $telegramService;
    }

    /**
     * @param array $data
     * @return void
     */
    public function handle(array $data): void
    {
        if (!isset($data['message']))
            return;

        $chatId = $data['message']['chat']['id'];
        $text = $data['message']['text'];

        if ($text === '/start')
        {
            $this->telegramService->sendMessage($chatId, 'Բարև, բարի գալուստ!');
        }
        elseif ($text === '/help')
        {
            $this->telegramService->sendMessage($chatId, 'Օգտագործեք /start կամ ուղարկեք հաղորդագրություն։');
        }
        else
        {
            $this->telegramService->sendMessage($chatId, 'Դուք գրեցիք՝ ' . $text);
        }
    }
}
