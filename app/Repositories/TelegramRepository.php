<?php

namespace App\Repositories;

use App\Repositories\Contracts\ITelegramRepository;
use DefStudio\Telegraph\Models\TelegraphChat;

class TelegramRepository implements ITelegramRepository
{
    /**
     * @param int $chatId
     * @return TelegraphChat|null
     */
    public function getChatById(int $chatId): ?TelegraphChat
    {
        return TelegraphChat::query()->where('id', $chatId)->first();
    }
}
