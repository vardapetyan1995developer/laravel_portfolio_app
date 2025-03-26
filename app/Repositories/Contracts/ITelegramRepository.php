<?php

namespace App\Repositories\Contracts;

use DefStudio\Telegraph\Models\TelegraphChat;

interface ITelegramRepository
{
    /**
     * @param int $chatId
     * @return TelegraphChat|null
     */
    public function getChatById(int $chatId): ?TelegraphChat;
}
